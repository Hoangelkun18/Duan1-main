<?php
class Product 
{
    // Lấy danh sách tất cả sản phẩm
    public function getAll() {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy thông tin sản phẩm, danh mục, giá thấp nhất và cao nhất, số lượng đã bán
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
        // Chuẩn bị và thực thi câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        // Trả về danh sách sản phẩm dưới dạng mảng
        return $stmt->fetchAll();
    }

    // Lấy danh sách tất cả danh mục
    public function getAllCategories() {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy tất cả danh mục, sắp xếp theo tên danh mục
        $sql = "SELECT id, ten_dm FROM danh_muc ORDER BY ten_dm";
        // Chuẩn bị và thực thi câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // Trả về danh sách danh mục dưới dạng mảng
        return $stmt->fetchAll();
    }
    
    // Lấy thông tin chi tiết của một sản phẩm theo ID
    public function getById($id) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy thông tin sản phẩm và tên danh mục tương ứng
        $sql = "SELECT 
                    sp.*, 
                    dm.ten_dm 
                FROM 
                    san_pham sp
                LEFT JOIN 
                    danh_muc dm ON sp.id_dm = dm.id
                WHERE 
                    sp.id = :id";
        // Chuẩn bị và gán giá trị cho tham số
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        // Trả về thông tin sản phẩm dưới dạng một bản ghi
        return $stmt->fetch();
    }
    
    // Lấy danh sách kích thước của một sản phẩm theo ID sản phẩm
    public function getSizes($productId) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy danh sách kích thước của sản phẩm từ bảng chi_tiet_sp
        $sql = "SELECT kc.id, kc.ten_kich_co 
                FROM kich_co kc
                JOIN chi_tiet_sp ct ON kc.id = ct.id_kich_co
                WHERE ct.id_sp = :id_sp";
        // Chuẩn bị và gán giá trị cho tham số
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_sp', $productId);
        $stmt->execute();
        
        // Trả về danh sách kích thước dưới dạng mảng
        return $stmt->fetchAll();
    }

    // Lấy danh sách tất cả màu sắc
    public function getAllColors() {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy tất cả màu sắc, sắp xếp theo tên màu
        $sql = "SELECT id, ten_mau FROM mau_sac ORDER BY ten_mau";
        // Chuẩn bị và thực thi câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // Trả về danh sách màu sắc dưới dạng mảng
        return $stmt->fetchAll();
    }

    // Lấy danh sách tất cả kích thước
    public function getAllSizes() {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy tất cả kích thước, sắp xếp theo tên kích thước
        $sql = "SELECT id, ten_kich_co FROM kich_co ORDER BY ten_kich_co";
        // Chuẩn bị và thực thi câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // Trả về danh sách kích thước dưới dạng mảng
        return $stmt->fetchAll();
    }

    // Lấy thông tin đánh giá của sản phẩm (dữ liệu mẫu)
    public function getRatingInfo($productId) {
        // Trả về dữ liệu mẫu, sau này có thể thay bằng truy vấn thực tế
        return [
            'rating' => 4.5, // Điểm đánh giá trung bình
            'count' => 55    // Số lượng đánh giá
        ];
    }

    // Xóa một sản phẩm theo ID
    public function delete($id) {
        try {
            // Kết nối đến cơ sở dữ liệu
            $conn = connectDB();
            // Bắt đầu giao dịch (transaction) để đảm bảo tính toàn vẹn dữ liệu
            $conn->beginTransaction();
            
            // Xóa các chi tiết sản phẩm (biến thể) trước
            $sql_ct = "DELETE FROM chi_tiet_sp WHERE id_sp = :id";
            $stmt_ct = $conn->prepare($sql_ct);
            $stmt_ct->bindParam(':id', $id);
            $stmt_ct->execute();
            
            // Xóa các ảnh phụ của sản phẩm
            $sql_anh = "DELETE FROM anh_sp WHERE id_sp = :id";
            $stmt_anh = $conn->prepare($sql_anh);
            $stmt_anh->bindParam(':id', $id);
            $stmt_anh->execute();
            
            // Xóa sản phẩm chính
            $sql = "DELETE FROM san_pham WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            // Xác nhận giao dịch thành công
            $conn->commit();
            return true; // Trả về true nếu xóa thành công
        } catch (PDOException $e) {
            // Nếu có lỗi, hủy giao dịch
            $conn->rollBack();
            // Ghi log lỗi để kiểm tra
            error_log("Error deleting product: " . $e->getMessage());
            return false; // Trả về false nếu xóa thất bại
        }
    }

    // Tạo một sản phẩm mới
    public function create($data, $image) {
        try {
            // Kết nối đến cơ sở dữ liệu
            $conn = connectDB();
            // Bắt đầu giao dịch
            $conn->beginTransaction();
            
            // Thêm sản phẩm vào bảng san_pham
            $sql = "INSERT INTO san_pham (ten_sp, id_dm, so_luong, mo_ta, hinh_anh, trang_thai) 
                    VALUES (:ten_sp, :id_dm, :so_luong, :mo_ta, :hinh_anh, :trang_thai)";
            
            // Chuẩn bị và gán giá trị cho các tham số
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ten_sp', $data['ten_sp']);
            $stmt->bindParam(':id_dm', $data['id_dm']);
            $stmt->bindParam(':so_luong', $data['so_luong']);
            $stmt->bindParam(':mo_ta', $data['mo_ta']);
            $stmt->bindParam(':hinh_anh', $image);
            $stmt->bindParam(':trang_thai', $data['trang_thai']);
            $stmt->execute();
            
            // Lấy ID của sản phẩm vừa thêm
            $productId = $conn->lastInsertId();
            
            // Thêm các ảnh phụ nếu có
            if (!empty($data['additional_images'])) {
                foreach ($data['additional_images'] as $img) {
                    $sql_img = "INSERT INTO anh_sp (id_sp, hinh_anh) VALUES (:id_sp, :hinh_anh)";
                    $stmt_img = $conn->prepare($sql_img);
                    $stmt_img->bindParam(':id_sp', $productId);
                    $stmt_img->bindParam(':hinh_anh', $img);
                    $stmt_img->execute();
                }
            }
            
            // Thêm các biến thể nếu có
            if (!empty($data['variations'])) {
                foreach ($data['variations'] as $variation) {
                    $sql_var = "INSERT INTO chi_tiet_sp (id_sp, id_mau, id_kich_co, so_luong, don_gia, gia_km) 
                                VALUES (:id_sp, :id_mau, :id_kich_co, :so_luong, :don_gia, :gia_km)";
                    $stmt_var = $conn->prepare($sql_var);
                    $stmt_var->bindParam(':id_sp', $productId);
                    $stmt_var->bindParam(':id_mau', $variation['id_mau']);
                    $stmt_var->bindParam(':id_kich_co', $variation['id_kich_co']);
                    $stmt_var->bindParam(':so_luong', $variation['so_luong']);
                    $stmt_var->bindParam(':don_gia', $variation['don_gia']);
                    $stmt_var->bindParam(':gia_km', $variation['gia_km']);
                    $stmt_var->execute();
                }
            }
            
            // Xác nhận giao dịch thành công
            $conn->commit();
            return $productId; // Trả về ID của sản phẩm vừa tạo
        } catch (PDOException $e) {
            // Nếu có lỗi, hủy giao dịch
            $conn->rollBack();
            // Ghi log lỗi để kiểm tra
            error_log("Error creating product: " . $e->getMessage());
            return false; // Trả về false nếu tạo thất bại
        }
    }

    // Lấy danh sách biến thể của một sản phẩm theo ID
    public function getVariations($productId) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy thông tin biến thể, bao gồm tên màu và tên kích thước
        $sql = "SELECT ct.*, m.ten_mau, kc.ten_kich_co 
                FROM chi_tiet_sp ct 
                JOIN mau_sac m ON ct.id_mau = m.id 
                JOIN kich_co kc ON ct.id_kich_co = kc.id 
                WHERE ct.id_sp = :id_sp";
        // Chuẩn bị và gán giá trị cho tham số
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_sp', $productId);
        $stmt->execute();
        // Trả về danh sách biến thể dưới dạng mảng
        return $stmt->fetchAll();
    }

    // Cập nhật thông tin một sản phẩm theo ID
    public function update($id, $data, $image) {
        try {
            // Kết nối đến cơ sở dữ liệu
            $conn = connectDB();
            // Bắt đầu giao dịch
            $conn->beginTransaction();

            // Cập nhật thông tin sản phẩm trong bảng san_pham
            $sql = "UPDATE san_pham 
                    SET ten_sp = :ten_sp, 
                        id_dm = :id_dm, 
                        so_luong = :so_luong, 
                        mo_ta = :mo_ta, 
                        hinh_anh = :hinh_anh, 
                        trang_thai = :trang_thai 
                    WHERE id = :id";
            // Chuẩn bị và gán giá trị cho các tham số
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ten_sp', $data['ten_sp']);
            $stmt->bindParam(':id_dm', $data['id_dm']);
            $stmt->bindParam(':so_luong', $data['so_luong']);
            $stmt->bindParam(':mo_ta', $data['mo_ta']);
            $stmt->bindParam(':hinh_anh', $image);
            $stmt->bindParam(':trang_thai', $data['trang_thai']);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Xóa các biến thể cũ
            $sql = "DELETE FROM chi_tiet_sp WHERE id_sp = :id_sp";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_sp', $id);
            $stmt->execute();

            // Thêm các biến thể mới
            if (!empty($data['variations'])) {
                foreach ($data['variations'] as $variation) {
                    $sql_var = "INSERT INTO chi_tiet_sp (id_sp, id_mau, id_kich_co, so_luong, don_gia, gia_km) 
                                VALUES (:id_sp, :id_mau, :id_kich_co, :so_luong, :don_gia, :gia_km)";
                    $stmt_var = $conn->prepare($sql_var);
                    $stmt_var->bindParam(':id_sp', $id);
                    $stmt_var->bindParam(':id_mau', $variation['id_mau']);
                    $stmt_var->bindParam(':id_kich_co', $variation['id_kich_co']);
                    $stmt_var->bindParam(':so_luong', $variation['so_luong']);
                    $stmt_var->bindParam(':don_gia', $variation['don_gia']);
                    $stmt_var->bindParam(':gia_km', $variation['gia_km']);
                    $stmt_var->execute();
                }
            }

            // Xóa các ảnh phụ cũ
            $sql = "DELETE FROM anh_sp WHERE id_sp = :id_sp";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_sp', $id);
            $stmt->execute();

            // Thêm các ảnh phụ mới
            if (!empty($data['additional_images'])) {
                foreach ($data['additional_images'] as $img) {
                    $sql_img = "INSERT INTO anh_sp (id_sp, hinh_anh) VALUES (:id_sp, :hinh_anh)";
                    $stmt_img = $conn->prepare($sql_img);
                    $stmt_img->bindParam(':id_sp', $id);
                    $stmt_img->bindParam(':hinh_anh', $img);
                    $stmt_img->execute();
                }
            }

            // Xác nhận giao dịch thành công
            $conn->commit();
            return true; // Trả về true nếu cập nhật thành công
        } catch (PDOException $e) {
            // Nếu có lỗi, hủy giao dịch
            $conn->rollBack();
            // Ghi log lỗi để kiểm tra
            error_log("Error updating product: " . $e->getMessage());
            return false; // Trả về false nếu cập nhật thất bại
        }
    }
}