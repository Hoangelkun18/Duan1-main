<?php
class Customer{
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy tất cả danh mục
    public function getAll() {
        $query = "SELECT * FROM tai_khoan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $query = "DELETE FROM tai_khoan WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}



?>