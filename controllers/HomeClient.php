<?php 

class HomeClient
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function index() {
        $view = 'home';
        $title = 'home';
        require_once './views/client/main.php';
    }
    
    public function shop() {
        require_once './models/client/shop.php';
        $productShopModel = new Shop($this->db);
        $productShop = $productShopModel->getAll();

        $view = 'layout/shop';
        $title = 'shop';

        require_once './views/client/main.php';
    }

    public function detail() {
        require_once './models/client/detail.php';
        $view = 'layout/detail';
        $title = 'detail';
        $id = $_GET['id'];
    
        if (!$id) {
            header('Location: ?act=shop');
            exit();
        } else {
            $productModel = new Detail($this->db); // Tạo một đối tượng model
            $productDetail = $productModel->getAll($id); // Lấy chi tiết sản phẩm
            $relatedProduct = $productModel->getProd($id); // Lấy sản phẩm liên quan
            require_once './views/client/main.php';
        }
    }
    

    public function cart() {
        $view = 'layout/cart';
        $title = 'cart';
        require_once './views/client/main.php';
    }

    public function form_Address() {
        $view = 'layout/formAddress';
        $title = 'formAddress';
        require_once './views/client/main.php';
    }

    public function order_success() {
        $view = 'layout/orderSuccess';
        $title = 'orderSuccess';
        require_once './views/client/main.php';
    }

    public function user() {
        $view = 'layout/user';
        $title = 'user';
        require_once './views/client/main.php';
    }

    public function login() {
        $view = 'layout/login';
        $title = 'login';
        require_once './views/client/main.php';
    }
    public function sign_up() {
        $view = 'layout/signUp';
        $title = 'sign_up';
        require_once './views/client/main.php';
    }
}