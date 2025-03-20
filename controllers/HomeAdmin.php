<?php
class HomeAdmin {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $view = 'dashboard';
        $title = 'dashboard';
        require_once './views/admin/main.php';
    }

    public function product() {
        require_once './models/Product.php';
        $productModel = new Product($this->db);
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

    public function productDelete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            require_once './models/Product.php';
            $productModel = new Product($this->db);
            $result = $productModel->delete($id);
            
            if ($result) {
                $_SESSION['success_message'] = "Xóa sản phẩm thành công!";
            } else {
                $_SESSION['error_message'] = "Không thể xóa sản phẩm. Vui lòng thử lại!";
            }
        }
        header('Location: ?act=product');
        exit();
    }

    public function category() {
        require_once './models/Category.php';
        $categoryModel = new Category($this->db);
        $categories = $categoryModel->getAll();
        
        $title = 'category';
        $view = 'category/list';
        require_once './views/admin/main.php';
    }

    public function categoryCreate() {
        require_once './models/Category.php';
        $categoryModel = new Category($this->db);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_dm = $_POST['ten_dm'];
            $mo_ta = $_POST['mo_ta'];
            
            if ($categoryModel->create($ten_dm, $mo_ta)) {
                $_SESSION['success_message'] = "Thêm danh mục thành công!";
                header('Location: ?act=category');
                exit();
            } else {
                $_SESSION['error_message'] = "Không thể thêm danh mục. Vui lòng thử lại!";
            }
        }

        $title = 'category create';
        $view = 'category/create';
        require_once './views/admin/main.php';
    }

    public function categoryEdit() {
        require_once './models/Category.php';
        $categoryModel = new Category($this->db);

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = $categoryModel->getById($id);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ten_dm = $_POST['ten_dm'];
                $mo_ta = $_POST['mo_ta'];

                if ($categoryModel->update($id, $ten_dm, $mo_ta)) {
                    $_SESSION['success_message'] = "Cập nhật danh mục thành công!";
                    header('Location: ?act=category');
                    exit();
                } else {
                    $_SESSION['error_message'] = "Không thể cập nhật danh mục. Vui lòng thử lại!";
                }
            }
        } else {
            $_SESSION['error_message'] = "Không tìm thấy danh mục!";
            header('Location: ?act=category');
            exit();
        }

        $title = 'category edit';
        $view = 'category/edit';
        require_once './views/admin/main.php';
    }

    public function categoryDelete() {
        require_once './models/Category.php';
        $categoryModel = new Category($this->db);
    
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $total = $categoryModel->getTotalCategory($id);
    
            if ($total['total'] > 0) {
                $_SESSION['error_message'] = "Không thể xóa danh mục này vì vẫn còn sản phẩm!";
            } else {
                if ($categoryModel->delete($id)) {
                    $_SESSION['success_message'] = "Xóa danh mục thành công!";
                } else {
                    $_SESSION['error_message'] = "Không thể xóa danh mục. Vui lòng thử lại!";
                }
            }
        }
    
        header('Location: ?act=category');
        exit();
    }
}
?>