<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeAdmin.php';
require_once './controllers/HomeClient.php';

// Require toàn bộ file Models

// Route
$act = $_GET['act'] ?? '/';


match ($act) {
    // Trang chủ
    '/'      => (new HomeClient())->index(),


    //------------------------------------------------------------------------
    'admin'  => (new HomeAdmin())->index(),

    'product'  => (new HomeAdmin())->product(),

    'product_edit'  => (new HomeAdmin())->productEdit(),

    'product_create'  => (new HomeAdmin())->productCreate(),

    'category'  => (new HomeAdmin())->category(),

    'category_edit'  => (new HomeAdmin())->categoryEdit(),
    
    'category_create'  => (new HomeAdmin())->categoryCreate(),
    // Thêm vào danh sách route trong index.php
'category_delete'  => (new HomeAdmin())->categoryDelete(),

    //----------------------------------------------------------------------- 
};