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
    'home' => (new HomeClient($db))->index(),
    
    'admin' => (new HomeAdmin($db))->index(),

    'product' => (new HomeAdmin($db))->product(),

    'product_edit' => (new HomeAdmin($db))->productEdit(),

    'product_create' => (new HomeAdmin($db))->productCreate(),
    
    'product_delete' => (new HomeAdmin($db))->productDelete(),

    'category' => (new HomeAdmin($db))->category(),

    'category_edit' => (new HomeAdmin($db))->categoryEdit(),
    
    'category_create' => (new HomeAdmin($db))->categoryCreate(),

    'category_delete' => (new HomeAdmin($db))->categoryDelete(),
    'discount' => (new HomeAdmin($db))->discount(),
    'discount_create' => (new HomeAdmin($db))->discountCreate(),
    'create_discount' => (new HomeAdmin($db))->create_discount(),

    // 'discount_edit' => (new HomeAdmin($db))->discountEdit($id),
    'edit_discount' => (new HomeAdmin($db))->edit_discount(),
    'discount_delete' => (new HomeAdmin($db))->discountDelete(),

    'customer' => (new HomeAdmin($db))->customer(),
    'customer_delete' => (new HomeAdmin($db))->customerDelete(),
    'customer_create' => (new HomeAdmin($db))->customerCreate(),
    // 'customer_edit' (new HomeAdmin($db))->customerEdit(),




    //---------------------------------------------------------------------------

    'shop' => (new HomeClient($db))->shop(),
    'detail' => (new HomeClient($db))->detail(),
    'cart' => (new HomeClient($db))->cart(),
    'form_Address' => (new HomeClient($db))->form_Address(),
    'order_success' => (new HomeClient($db))->order_success(),
    'user' => (new HomeClient($db))->user(),
    'login' => (new HomeClient($db))->login(),
    'sign_up' => (new HomeClient($db))->sign_up(),



};