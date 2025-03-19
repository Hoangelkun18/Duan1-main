// File: models/Category.php
<?php

class Category
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function insert($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO danh_muc (ten_dm, mo_ta) VALUES (?, ?)");
        $stmt->execute([$data['ten_dm'], $data['mo_ta']]);
        return $this->conn->lastInsertId();
    }

    public function update($data)
    {
        $stmt = $this->conn->prepare("UPDATE danh_muc SET ten_dm = ?, mo_ta = ? WHERE id = ?");
        return $stmt->execute([$data['ten_dm'], $data['mo_ta'], $data['id']]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM danh_muc WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function getTotalCategory($id){
        $query = "SELECT COUNT(*) as total FROM san_pham WHERE id_dm = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $rel= $stmt->fetch(PDO::FETCH_ASSOC);
        return $rel;

    }
}