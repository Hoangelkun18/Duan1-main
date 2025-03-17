<?php 

class HomeAdmin
{
    public function index() {
        $view = 'dashboard';
        $title = 'dashboard';
        require_once './views/admin/main.php';
    }
    
    public function product() {
        // Gọi model để lấy dữ liệu
        require_once './models/Product.php';
        $productModel = new Product();
        $products = $productModel->getAll();
        
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
        // Gọi model để lấy dữ liệu
        require_once './models/Category.php';
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        
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
   
public function categoryDelete() {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        require_once './models/Category.php';
        $categoryModel = new Category();
        $categoryModel->delete($id);
    }
    header('Location: ?act=category');
    exit();
}
   

}