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
        require_once './models/Product.php';
        require_once './models/Category.php';
        $productModel = new Product($this->db);
        $categoryModel = new Category($this->db);
    
        // Lấy ID sản phẩm từ URL
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $_SESSION['error_message'] = "Không tìm thấy sản phẩm!";
            header('Location: ?act=product');
            exit();
        }
    
        // Lấy thông tin sản phẩm
        $product = $productModel->getById($id);
        if (!$product) {
            $_SESSION['error_message'] = "Sản phẩm không tồn tại!";
            header('Location: ?act=product');
            exit();
        }
    
        // Lấy danh sách danh mục, màu sắc, kích thước và biến thể
        $categories = $categoryModel->getAll();
        $colors = $productModel->getAllColors();
        $sizes = $productModel->getAllSizes();
        $variations = $productModel->getVariations($id);
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Xử lý file upload
            $uploadDir = './public/admin/assets_admin/images/product/';
            $mainImage = $product['hinh_anh']; // Giữ ảnh cũ nếu không upload ảnh mới
            $additionalImages = [];
    
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
                $fileTemp = $_FILES['main_image']['tmp_name'];
                $fileName = time() . '_' . $_FILES['main_image']['name'];
                $filePath = $uploadDir . $fileName;
    
                if (move_uploaded_file($fileTemp, $filePath)) {
                    $mainImage = $fileName;
                }
            }
    
            if (isset($_FILES['additional_images'])) {
                $fileCount = count($_FILES['additional_images']['name']);
                for ($i = 0; $i < $fileCount; $i++) {
                    if ($_FILES['additional_images']['error'][$i] === UPLOAD_ERR_OK) {
                        $fileTemp = $_FILES['additional_images']['tmp_name'][$i];
                        $fileName = time() . '_' . $_FILES['additional_images']['name'][$i];
                        $filePath = $uploadDir . $fileName;
    
                        if (move_uploaded_file($fileTemp, $filePath)) {
                            $additionalImages[] = $fileName;
                        }
                    }
                }
            }
    
            // Xử lý dữ liệu form
            $productData = [
                'ten_sp' => $_POST['ten_sp'],
                'id_dm' => $_POST['id_dm'],
                'so_luong' => $_POST['so_luong'],
                'mo_ta' => $_POST['mo_ta'],
                'trang_thai' => isset($_POST['trang_thai']) ? 1 : 0,
                'additional_images' => $additionalImages
            ];
    
            $variations = [];
            if (isset($_POST['variations']) && is_array($_POST['variations'])) {
                foreach ($_POST['variations'] as $variation) {
                    $variations[] = [
                        'id_mau' => $variation['id_mau'],
                        'id_kich_co' => $variation['id_kich_co'],
                        'so_luong' => $variation['so_luong'],
                        'don_gia' => $variation['don_gia'],
                        'gia_km' => $variation['gia_km'] ?? $variation['don_gia']
                    ];
                }
            }
            $productData['variations'] = $variations;
    
            // Cập nhật sản phẩm
            if ($productModel->update($id, $productData, $mainImage)) {
                $_SESSION['success_message'] = "Cập nhật sản phẩm thành công!";
                session_write_close();
                header('Location: ?act=product');
                exit();
            } else {
                $_SESSION['error_message'] = "Không thể cập nhật sản phẩm. Vui lòng thử lại!";
                session_write_close();
                header('Location: ?act=product_edit&id=' . $id);
                exit();
            }
        }
    
        // Truyền dữ liệu vào view
        $view = 'product/edit';
        $title = 'Chỉnh Sửa Sản Phẩm';
        require_once './views/admin/main.php';
    }

    public function productCreate() {
        require_once './models/Product.php';
        require_once './models/Category.php';
        $productModel = new Product($this->db);
        $categoryModel = new Category($this->db);
        
        $categories = $categoryModel->getAll();
        $colors = $productModel->getAllColors();
        $sizes = $productModel->getAllSizes();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle file upload
            $uploadDir = './public/admin/assets_admin/images/product/';
            $mainImage = '';
            $additionalImages = [];
            
            // Make sure the upload directory exists
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            // Process main image
            if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
                $fileTemp = $_FILES['main_image']['tmp_name'];
                $fileName = time() . '_' . $_FILES['main_image']['name'];
                $filePath = $uploadDir . $fileName;
                
                if (move_uploaded_file($fileTemp, $filePath)) {
                    $mainImage = $fileName;
                }
            }
            
            // Process additional images
            if (isset($_FILES['additional_images'])) {
                $fileCount = count($_FILES['additional_images']['name']);
                
                for ($i = 0; $i < $fileCount; $i++) {
                    if ($_FILES['additional_images']['error'][$i] === UPLOAD_ERR_OK) {
                        $fileTemp = $_FILES['additional_images']['tmp_name'][$i];
                        $fileName = time() . '_' . $_FILES['additional_images']['name'][$i];
                        $filePath = $uploadDir . $fileName;
                        
                        if (move_uploaded_file($fileTemp, $filePath)) {
                            $additionalImages[] = $fileName;
                        }
                    }
                }
            }
            
            // Process form data
            $productData = [
                'ten_sp' => $_POST['ten_sp'],
                'id_dm' => $_POST['id_dm'],
                'so_luong' => $_POST['so_luong'],
                'mo_ta' => $_POST['mo_ta'],
                'trang_thai' => isset($_POST['trang_thai']) ? 1 : 0,
                'additional_images' => $additionalImages
            ];
            
            // Process variations
            $variations = [];
            if (isset($_POST['variations']) && is_array($_POST['variations'])) {
                foreach ($_POST['variations'] as $variation) {
                    $variations[] = [
                        'id_mau' => $variation['id_mau'],
                        'id_kich_co' => $variation['id_kich_co'],
                        'so_luong' => $variation['so_luong'],
                        'don_gia' => $variation['don_gia'],
                        'gia_km' => $variation['gia_km'] ?? $variation['don_gia']
                    ];
                }
            }
            
            $productData['variations'] = $variations;
            
            // Create the product
            if ($productModel->create($productData, $mainImage)) {
                $_SESSION['success_message'] = "Thêm sản phẩm thành công!";
                session_write_close(); // Đảm bảo session được lưu trước khi chuyển hướng
                header('Location: ?act=product');
                exit();
            } else {
                $_SESSION['error_message'] = "Không thể thêm sản phẩm. Vui lòng thử lại!";
                session_write_close(); // Đảm bảo session được lưu trước khi chuyển hướng
                header('Location: ?act=product_create');
                exit();
            }
        }
        
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