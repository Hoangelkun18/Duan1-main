<?php
class Discount 
{
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAll() {
        $conn = connectDB();
        $sql = "SELECT 
                    km.id, 
                    km.ten_km, 
                    km.ma_km, 
                    km.ngay_bat_dau, 
                    km.ngay_ket_thuc, 
                    km.loai_km, 
                    km.trang_thai
                FROM 
                    khuyen_mai km
                ORDER BY 
                    km.ngay_bat_dau DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll();

    }
    
    public function getById($id) {
        $conn = connectDB();
        $sql = "SELECT 
                    km.id, 
                    km.ten_km, 
                    km.ma_km, 
                    km.ngay_bat_dau, 
                    km.ngay_ket_thuc, 
                    km.loai_km, 
                    km.trang_thai
                FROM 
                    khuyen_mai km
                WHERE 
                    km.id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    
    public function create($ten_km, $ma_km, $ngay_bat_dau, $ngay_ket_thuc, $loai_km, $trang_thai) {
        $conn = connectDB();
        $sql = "INSERT INTO khuyen_mai (ten_km, ma_km, ngay_bat_dau, ngay_ket_thuc, loai_km, trang_thai) 
                VALUES (:ten_km, :ma_km, :ngay_bat_dau, :ngay_ket_thuc, :loai_km, :trang_thai)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ten_km', $ten_km);
        $stmt->bindParam(':ma_km', $ma_km);
        $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
        $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
        $stmt->bindParam(':loai_km', $loai_km);
        $stmt->bindParam(':trang_thai', $trang_thai);
        return $stmt->execute();
    }
    
    public function update($id, $ten_km, $ma_km, $ngay_bat_dau, $ngay_ket_thuc, $loai_km, $trang_thai) {
        $conn = connectDB();
        $sql = "UPDATE khuyen_mai 
                SET ten_km = :ten_km, ma_km = :ma_km, ngay_bat_dau = :ngay_bat_dau, ngay_ket_thuc = :ngay_ket_thuc, 
                    loai_km = :loai_km, trang_thai = :trang_thai 
                WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten_km', $ten_km);
        $stmt->bindParam(':ma_km', $ma_km);
        $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
        $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
        $stmt->bindParam(':loai_km', $loai_km);
        $stmt->bindParam(':trang_thai', $trang_thai);
        return $stmt->execute();
    }
    
    public function delete($id) {
        try {
            $conn = connectDB();
            $sql = "DELETE FROM khuyen_mai WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error deleting discount: " . $e->getMessage());
            return false;
        }
    }
}
?>