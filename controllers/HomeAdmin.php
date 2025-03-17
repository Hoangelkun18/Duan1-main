<?php 

class HomeAdmin
{
    public function index() {
        $view = 'dashboard';
        $title = 'dashboard';
        require_once './views/admin/main.php';
    }
    public function product() {
        $view = 'product/list';
        $title = 'product list';
        require_once './views/admin/main.php';
    }

    public function productEdit() {
        $view = 'product/edit';
        $title = 'product edit';
        require_once './views/admin/main.php';
    }
    public function productCreate() {
        $view = 'product/create';
        $title = 'product create';
        require_once './views/admin/main.php';
    }
    public function category() {
        $title = 'category';
        $view = 'category/list';
        require_once './views/admin/main.php';
    }
    public function categoryEdit() {
        $title = 'category edit';
        $view = 'category/edit';
        require_once './views/admin/main.php';
    }
    public function categoryCreate() {
        $title = 'category create';
        $view = 'category/create';
        require_once './views/admin/main.php';
    }
}