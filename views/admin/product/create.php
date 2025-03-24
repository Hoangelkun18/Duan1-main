<div class="page-content">
    <div class="container-xxl">
        <!-- Form để tạo sản phẩm mới, sử dụng phương thức POST và hỗ trợ upload file -->
        <form action="?act=product_create" method="POST" enctype="multipart/form-data">
            <div class="row">
                <!-- Phần bên trái: Hiển thị bản xem trước của sản phẩm -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card shadow-sm">
                        <!-- Nội dung chính của card: Hiển thị ảnh và thông tin xem trước -->
                        <div class="card-body text-center">
                            <!-- Khu vực hiển thị ảnh xem trước -->
                            <div id="image-preview" class="mb-3">
                                <!-- Ảnh mặc định ban đầu, sẽ được thay đổi khi người dùng chọn ảnh -->
                                <img src="/Duan1-main/public/admin/assets_admin/images/product/default-product.png"
                                    alt="Ảnh sản phẩm" class="img-fluid rounded shadow-sm" id="main-image-preview"
                                    style="max-height: 200px; object-fit: cover;">
                            </div>
                            <div class="mt-3">
                                <!-- Tên sản phẩm xem trước, sẽ được cập nhật khi người dùng nhập -->
                                <h4 id="product-name-preview" class="text-primary">Tên Sản Phẩm</h4>
                                <!-- Tiêu đề cho phần giá -->
                                <h5 class="text-dark fw-medium mt-3">Giá:</h5>
                                <!-- Giá sản phẩm xem trước, sẽ được cập nhật khi người dùng nhập giá -->
                                <h4
                                    class="fw-semibold text-dark mt-2 d-flex align-items-center justify-content-center gap-2">
                                    <span id="product-price-preview">0</span> VNĐ
                                </h4>
                            </div>
                        </div>
                        <!-- Phần chân của card: Chứa các nút hành động -->
                        <div class="card-footer bg-light-subtle">
                            <div class="row g-2">
                                <!-- Nút để gửi form và tạo sản phẩm -->
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary w-100">Tạo Sản Phẩm</button>
                                </div>
                                <!-- Nút để hủy và quay lại trang danh sách sản phẩm -->
                                <div class="col-lg-6">
                                    <a href="?act=product" class="btn btn-outline-secondary w-100">Hủy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Hình Ảnh Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <!-- Up ảnh -->
                            <div class="mb-3">
                                <label for="main-image" class="form-label fw-bold">Hình Ảnh Chính</label>
                                <input type="file" name="main_image" id="main-image" class="form-control"
                                    accept="image/*" required>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Thông Tin Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!--nhập tên sản phẩm -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_sp" class="form-label fw-bold">Tên Sản Phẩm</label>
                                        <input type="text" id="ten_sp" name="ten_sp" class="form-control"
                                            placeholder="Nhập tên sản phẩm" required>
                                    </div>
                                </div>
                                <!--chọn danh mục sản phẩm -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="id_dm" class="form-label fw-bold">Danh Mục</label>
                                        <select class="form-control" id="id_dm" name="id_dm" required>
                                            <option value="">Chọn danh mục</option>
                                            <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['ten_dm'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!--nhập mô tả sản phẩm -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label fw-bold">Mô Tả</label>
                                        <textarea class="form-control" id="mo_ta" name="mo_ta" rows="5"
                                            placeholder="Nhập mô tả sản phẩm"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Nhập số lượng -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label fw-bold">Số Lượng</label>
                                        <input type="number" id="so_luong" name="so_luong" class="form-control"
                                            placeholder="Nhập số lượng" min="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <div
                            class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Biến Thể Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div id="variations-container">
                                <div class="variation-item border rounded p-3 mb-3 shadow-sm">
                                    <div class="row">
                                        <!-- Chọn màu -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Màu Sắc</label>
                                                <select class="form-control" name="variations[0][id_mau]">
                                                    <option value="">Chọn màu</option>
                                                    <?php foreach ($colors as $color): ?>
                                                    <option value="<?= $color['id'] ?>"><?= $color['ten_mau'] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Chọn size -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Kích Thước</label>
                                                <select class="form-control" name="variations[0][id_kich_co]">
                                                    <option value="">Chọn kích thước</option>
                                                    <?php foreach ($sizes as $size): ?>
                                                    <option value="<?= $size['id'] ?>"><?= $size['ten_kich_co'] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Nhập số lượng -->
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Số Lượng</label>
                                                <input type="number" class="form-control" name="variations[0][so_luong]"
                                                    min="0" required>
                                            </div>
                                        </div>
                                        <!-- Nhập giá -->
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Giá</label>
                                                <input type="number" class="form-control price-input"
                                                    name="variations[0][don_gia]" min="0" required>
                                            </div>
                                        </div>
                                        <!-- Nhập giá km -->
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Giá Khuyến Mãi</label>
                                                <input type="number" class="form-control" name="variations[0][gia_km]"
                                                    min="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded shadow-sm">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary w-100">Tạo Sản Phẩm</button>
                            </div>
                            <div class="col-lg-2">
                                <a href="?act=product" class="btn btn-outline-secondary w-100">Hủy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Phần JavaScript để xử lý tương tác trên giao diện -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Xem trước hình ảnh chính khi người dùng chọn file mới
    document.getElementById('main-image').addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('main-image-preview').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Cập nhật tên sản phẩm xem trước khi người dùng nhập
    document.getElementById('ten_sp').addEventListener('input', function() {
        document.getElementById('product-name-preview').textContent = this.value || "Tên Sản Phẩm";
    });

    // Cập nhật giá sản phẩm xem trước khi người dùng nhập giá
    document.querySelectorAll('.price-input').forEach(function(input) {
        input.addEventListener('input', function() {
            document.getElementById('product-price-preview').textContent = this.value || "0";
        });
    });
});
</script>