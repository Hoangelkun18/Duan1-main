<?php
class Shop 
{
    // Lấy danh sách tất cả sản phẩm
    public function getAll() {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectDB();
        // Câu truy vấn SQL để lấy thông tin sản phẩm, danh mục, giá thấp nhất và cao nhất, số lượng đã bán
        $sql = "select sp.id, 
                sp.ten_sp, sp.hinh_anh, 
                sp.trang_thai, ctsp.don_gia, 
                ctsp.gia_km 
                from san_pham sp 
                join chi_tiet_sp ctsp 
                on sp.id = ctsp.id_sp 
                order by sp.id ASC";
        // Chuẩn bị và thực thi câu truy vấn
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        // Trả về danh sách sản phẩm dưới dạng mảng
        return $stmt->fetchAll();
    }
}