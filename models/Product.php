<?php
class Product 
{
    // Lấy danh sách sản phẩm
    public function getAll() {
        $conn = connectDB();
        $sql = "SELECT 
                    sp.id, 
                    sp.ten_sp, 
                    sp.hinh_anh, 
                    sp.trang_thai,
                    sp.so_luong, 
                    dm.ten_dm,
                    MIN(ct.don_gia) as gia_thap,
                    MAX(ct.don_gia) as gia_cao,
                    (SELECT COUNT(*) FROM chi_tiet_don_hang ctdh JOIN chi_tiet_sp ctsp ON ctdh.id_ct_sp = ctsp.id WHERE ctsp.id_sp = sp.id) as so_luong_ban
                FROM 
                    san_pham sp
                LEFT JOIN 
                    danh_muc dm ON sp.id_dm = dm.id
                LEFT JOIN 
                    chi_tiet_sp ct ON sp.id = ct.id_sp
                GROUP BY 
                    sp.id, sp.ten_sp, sp.hinh_anh, sp.trang_thai, sp.so_luong, dm.ten_dm
                ORDER BY 
                    sp.id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    // Lấy chi tiết một sản phẩm
    public function getById($id) {
        $conn = connectDB();
        $sql = "SELECT 
                    sp.*, 
                    dm.ten_dm 
                FROM 
                    san_pham sp
                LEFT JOIN 
                    danh_muc dm ON sp.id_dm = dm.id
                WHERE 
                    sp.id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    // Lấy kích thước của sản phẩm
    public function getSizes($productId) {
        $conn = connectDB();
        $sql = "SELECT 
                    kc.id, 
                    kc.ten_kich_co 
                FROM 
                    kich_co kc
                JOIN 
                    chi_tiet_sp ct ON kc.id = ct.id_kich_co
                WHERE 
                    ct.id_sp = :id
                GROUP BY 
                    kc.id, kc.ten_kich_co";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    // Lấy màu sắc của sản phẩm
    public function getColors($productId) {
        $conn = connectDB();
        $sql = "SELECT 
                    ms.id, 
                    ms.ten_mau 
                FROM 
                    mau_sac ms
                JOIN 
                    chi_tiet_sp ct ON ms.id = ct.id_mau
                WHERE 
                    ct.id_sp = :id
                GROUP BY 
                    ms.id, ms.ten_mau";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    public function getRatingInfo($productId) {
        //T làm trả về dữ liệu mẫu nhé, sau có đánh giá thì làm sau
        return [
            'rating' => 4.5,
            'count' => 55
        ];
    }
    public function delete($id) {
        try {
            $conn = connectDB();
            // Bắt đầu transaction
            $conn->beginTransaction();
            
            // Xóa các chi tiết sản phẩm trước
            $sql_ct = "DELETE FROM chi_tiet_sp WHERE id_sp = :id";
            $stmt_ct = $conn->prepare($sql_ct);
            $stmt_ct->bindParam(':id', $id);
            $stmt_ct->execute();
            
            // Xóa các ảnh sản phẩm (nếu có bảng riêng, không phải là id_anh trong san_pham)
            $sql_anh = "DELETE FROM anh_sp WHERE id = :id";
            $stmt_anh = $conn->prepare($sql_anh);
            $stmt_anh->bindParam(':id', $id);
            $stmt_anh->execute();
            
            // Xóa sản phẩm
            $sql = "DELETE FROM san_pham WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            // Commit transaction
            $conn->commit();
            return true;
        } catch (PDOException $e) {
            // Nếu có lỗi thì rollback
            $conn->rollBack();
            error_log("Error deleting product: " . $e->getMessage());
            return false;
        }
    }
    
}