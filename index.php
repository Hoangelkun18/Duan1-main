<?php
// Bắt đầu session
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Kết nối database
$db = connectDB();

// Require toàn bộ file Controllers
require_once './controllers/HomeAdmin.php';
require_once './controllers/HomeClient.php';

// Require toàn bộ file Models

// Route
$act = $_GET['act'] ?? '/';

match ($act) {
    // Trang chủ
    '/' => (new HomeClient($db))->index(),

    //------------------------------------------------------------------------
    'admin' => (new HomeAdmin($db))->index(),

    'product' => (new HomeAdmin($db))->product(),

    'product_edit' => (new HomeAdmin($db))->productEdit(),

    'product_create' => (new HomeAdmin($db))->productCreate(),
    'product_delete' => (new HomeAdmin($db))->productDelete(),

    'category' => (new HomeAdmin($db))->category(),

    'category_edit' => (new HomeAdmin($db))->categoryEdit(),
    
    'category_create' => (new HomeAdmin($db))->categoryCreate(),
    'category_delete' => (new HomeAdmin($db))->categoryDelete(),

    //----------------------------------------------------------------------- 
};