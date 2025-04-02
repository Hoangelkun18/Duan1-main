<?php
class Shop 
{
    // Lấy danh sách tất cả sản phẩm
    public function getAll() {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy thông tin sản phẩm, danh mục, giá thấp nhất và cao nhất, số lượng đã bán
        $sql = "SELECT sp.ten_sp, MIN(sp.id) AS id, 
                    sp.hinh_anh, sp.trang_thai, 
                    MIN(ctsp.don_gia) AS don_gia, 
                    MIN(ctsp.gia_km) AS gia_km
                FROM san_pham sp
                    JOIN chi_tiet_sp ctsp ON sp.id = ctsp.id_sp
                GROUP BY sp.ten_sp, sp.hinh_anh, sp.trang_thai
                ORDER BY id ASC";
        // Chuẩn bị và thực thi câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        // Trả về danh sách sản phẩm dưới dạng mảng
        return $stmt->fetchAll();
    }
}