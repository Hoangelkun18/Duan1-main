<div class="page-content">
    <div class="container-xxl">
        <!-- Form để chỉnh sửa sản phẩm, gửi dữ liệu đến action product_edit với ID sản phẩm -->
        <form action="?act=product_edit&id=<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <!-- Phần bên trái: Hiển thị bản xem trước của sản phẩm -->
                <div class="col-xl-3 col-lg-4">
                    <div class="card shadow-sm">
                        <!-- Nội dung chính của card: Hiển thị ảnh và thông tin xem trước -->
                        <div class="card-body text-center">
                            <!-- Khu vực hiển thị ảnh xem trước -->
                            <div id="image-preview" class="mb-3">
                                <!-- Hiển thị ảnh hiện tại của sản phẩm, nếu không có thì dùng ảnh mặc định -->
                                <img src="/Duan1-main/public/admin/assets_admin/images/product/<?= htmlspecialchars($product['hinh_anh'] ? $product['hinh_anh'] : 'default-product.png') ?>"
                                    alt="Ảnh sản phẩm" class="img-fluid rounded shadow-sm" id="main-image-preview"
                                    style="max-height: 200px; object-fit: cover;">
                            </div>
                            <div class="mt-3">
                                <!-- Tên sản phẩm hiện tại, sẽ được cập nhật khi người dùng nhập -->
                                <h4 id="product-name-preview" class="text-primary">
                                    <?= htmlspecialchars($product['ten_sp']) ?></h4>
                                <!-- Tiêu đề cho phần giá -->
                                <h5 class="text-dark fw-medium mt-3">Giá:</h5>
                                <!-- Giá của biến thể đầu tiên (nếu có), định dạng số với dấu phân cách -->
                                <h4
                                    class="fw-semibold text-dark mt-2 d-flex align-items-center justify-content-center gap-2">
                                    <span
                                        id="product-price-preview"><?= number_format($variations[0]['don_gia'] ?? 0, 0, ',', '.') ?></span>
                                    VNĐ
                                </h4>
                            </div>
                        </div>
                        <!-- Phần chân của card: Chứa các nút hành động -->
                        <div class="card-footer bg-light-subtle">
                            <div class="row g-2">
                                <!-- Nút để gửi form và cập nhật sản phẩm -->
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary w-100">Cập Nhật</button>
                                </div>
                                <!-- Nút để hủy và quay lại trang danh sách sản phẩm -->
                                <div class="col-lg-6">
                                    <a href="?act=product" class="btn btn-outline-secondary w-100">Hủy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phần nội dung chính: Form nhập thông tin sản phẩm -->
                <div class="col-xl-9 col-lg-8">
                    <!-- Phần upload hình ảnh sản phẩm -->
                    <div class="card shadow-sm">
                        <!-- Tiêu đề của card: Hình Ảnh Sản Phẩm -->
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Hình Ảnh Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <!-- Trường để upload hình ảnh chính mới -->
                            <div class="mb-3">
                                <label for="main-image" class="form-label fw-bold">Hình Ảnh Chính</label>
                                <input type="file" name="main_image" id="main-image" class="form-control"
                                    accept="image/*">
                                <small class="text-muted">Để trống nếu không muốn thay đổi hình ảnh chính</small>
                            </div>
                            <!-- Trường để upload nhiều hình ảnh phụ mới -->
                            <div class="mb-3">
                                <label for="additional-images" class="form-label fw-bold">Hình Ảnh Phụ</label>
                                <input type="file" name="additional_images[]" id="additional-images"
                                    class="form-control" accept="image/*" multiple>
                                <small class="text-muted">Bạn có thể chọn nhiều hình ảnh</small>
                            </div>
                        </div>
                    </div>

                    <!-- Phần thông tin sản phẩm -->
                    <div class="card shadow-sm">
                        <!-- Tiêu đề của card: Thông Tin Sản Phẩm -->
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Thông Tin Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Trường nhập tên sản phẩm, hiển thị giá trị hiện tại -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_sp" class="form-label fw-bold">Tên Sản Phẩm</label>
                                        <input type="text" id="ten_sp" name="ten_sp" class="form-control"
                                            placeholder="Nhập tên sản phẩm"
                                            value="<?= htmlspecialchars($product['ten_sp']) ?>" required>
                                    </div>
                                </div>
                                <!-- Trường chọn danh mục, hiển thị danh mục hiện tại -->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="id_dm" class="form-label fw-bold">Danh Mục</label>
                                        <select class="form-control" id="id_dm" name="id_dm" required>
                                            <option value="">Chọn danh mục</option>
                                            <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['id'] ?>"
                                                <?= $category['id'] == $product['id_dm'] ? 'selected' : '' ?>>
                                                <?= $category['ten_dm'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Trường nhập mô tả sản phẩm, hiển thị mô tả hiện tại -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="mo_ta" class="form-label fw-bold">Mô Tả</label>
                                        <textarea class="form-control" id="mo_ta" name="mo_ta" rows="5"
                                            placeholder="Nhập mô tả sản phẩm"><?= htmlspecialchars($product['mo_ta']) ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Trường nhập số lượng sản phẩm, hiển thị số lượng hiện tại -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label fw-bold">Số Lượng</label>
                                        <input type="number" id="so_luong" name="so_luong" class="form-control"
                                            placeholder="Nhập số lượng" min="0" value="<?= $product['so_luong'] ?>"
                                            required>
                                    </div>
                                </div>
                                <!-- Trường chọn trạng thái hiển thị, hiển thị trạng thái hiện tại -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="trang_thai" class="form-label fw-bold">Trạng Thái</label>
                                        <div class="form-check form-switch mt-2">
                                            <input class="form-check-input" type="checkbox" id="trang_thai"
                                                name="trang_thai" <?= $product['trang_thai'] ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="trang_thai">Hiển Thị</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Phần biến thể sản phẩm -->
                    <div class="card shadow-sm">
                        <!-- Tiêu đề của card: Biến Thể Sản Phẩm, với nút thêm biến thể -->
                        <div
                            class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Biến Thể Sản Phẩm</h4>
                            <button type="button" class="btn btn-sm btn-light" id="add-variation">Thêm Biến Thể</button>
                        </div>
                        <div class="card-body">
                            <!-- Khu vực chứa các biến thể -->
                            <div id="variations-container">
                                <!-- Lặp qua danh sách biến thể hiện tại của sản phẩm -->
                                <?php foreach ($variations as $index => $variation): ?>
                                <div class="variation-item border rounded p-3 mb-3 shadow-sm">
                                    <div class="row">
                                        <!-- Trường chọn màu sắc, hiển thị màu hiện tại -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Màu Sắc</label>
                                                <select class="form-control" name="variations[<?= $index ?>][id_mau]">
                                                    <option value="">Chọn màu</option>
                                                    <?php foreach ($colors as $color): ?>
                                                    <option value="<?= $color['id'] ?>"
                                                        <?= $color['id'] == $variation['id_mau'] ? 'selected' : '' ?>>
                                                        <?= $color['ten_mau'] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Trường chọn kích thước, hiển thị kích thước hiện tại -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Kích Thước</label>
                                                <select class="form-control"
                                                    name="variations[<?= $index ?>][id_kich_co]">
                                                    <option value="">Chọn kích thước</option>
                                                    <?php foreach ($sizes as $size): ?>
                                                    <option value="<?= $size['id'] ?>"
                                                        <?= $size['id'] == $variation['id_kich_co'] ? 'selected' : '' ?>>
                                                        <?= $size['ten_kich_co'] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Trường nhập số lượng của biến thể, hiển thị số lượng hiện tại -->
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Số Lượng</label>
                                                <input type="number" class="form-control"
                                                    name="variations[<?= $index ?>][so_luong]" min="0"
                                                    value="<?= $variation['so_luong'] ?>" required>
                                            </div>
                                        </div>
                                        <!-- Trường nhập giá của biến thể, hiển thị giá hiện tại -->
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Giá</label>
                                                <input type="number" class="form-control price-input"
                                                    name="variations[<?= $index ?>][don_gia]" min="0"
                                                    value="<?= $variation['don_gia'] ?>" required>
                                            </div>
                                        </div>
                                        <!-- Trường nhập giá khuyến mãi, hiển thị giá khuyến mãi hiện tại -->
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Giá Khuyến Mãi</label>
                                                <input type="number" class="form-control"
                                                    name="variations[<?= $index ?>][gia_km]" min="0"
                                                    value="<?= $variation['gia_km'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nút xóa biến thể -->
                                    <button type="button" class="btn btn-sm btn-danger remove-variation">Xóa</button>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Phần nút gửi form ở dưới cùng -->
                    <div class="p-3 bg-light mb-3 rounded shadow-sm">
                        <div class="row justify-content-end g-2">
                            <!-- Nút gửi form để cập nhật sản phẩm -->
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary w-100">Cập Nhật</button>
                            </div>
                            <!-- Nút hủy và quay lại trang danh sách -->
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
// Đợi toàn bộ tài liệu HTML được tải xong trước khi chạy JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Xem trước hình ảnh chính khi người dùng chọn file mới
    document.getElementById('main-image').addEventListener('change', function(e) {
        if (this.files && this.files[0]) { // Kiểm tra xem có file được chọn không
            var reader = new FileReader(); // Tạo đối tượng FileReader để đọc file
            reader.onload = function(e) { // Khi file được đọc xong
                // Cập nhật src của thẻ img để hiển thị ảnh xem trước
                document.getElementById('main-image-preview').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]); // Đọc file dưới dạng URL
        }
    });

    // Cập nhật tên sản phẩm xem trước khi người dùng nhập
    document.getElementById('ten_sp').addEventListener('input', function() {
        // Lấy giá trị từ input và hiển thị, nếu không có giá trị thì hiển thị "Tên Sản Phẩm"
        document.getElementById('product-name-preview').textContent = this.value || "Tên Sản Phẩm";
    });

    // Cập nhật giá sản phẩm xem trước khi người dùng nhập giá
    document.querySelectorAll('.price-input').forEach(function(input) {
        input.addEventListener('input', function() {
            // Lấy giá trị từ input và hiển thị, nếu không có giá trị thì hiển thị "0"
            document.getElementById('product-price-preview').textContent = this.value || "0";
        });
    });

    // Thêm biến thể mới khi người dùng nhấn nút "Thêm Biến Thể"
    let variationCount = <?= count($variations) ?>; // Số lượng biến thể hiện tại
    document.getElementById('add-variation').addEventListener('click', function() {
        const container = document.getElementById('variations-container'); // Lấy khu vực chứa biến thể
        const template = container.querySelector('.variation-item').cloneNode(
        true); // Sao chép biến thể đầu tiên

        // Cập nhật tên của các trường trong form để tránh trùng lặp
        const inputs = template.querySelectorAll('input, select');
        inputs.forEach(function(input) {
            const name = input.getAttribute('name');
            if (name) {
                // Thay đổi chỉ số của biến thể (ví dụ: variations[0] thành variations[1])
                input.setAttribute('name', name.replace(/\[\d+\]/, '[' + variationCount + ']'));
            }
        });

        // Hiển thị nút xóa cho biến thể mới
        template.querySelector('.remove-variation').style.display = 'block';

        // Xóa giá trị của các trường trong biến thể mới
        template.querySelectorAll('input').forEach(input => input.value = '');
        template.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

        // Thêm biến thể mới vào khu vực chứa
        container.appendChild(template);
        variationCount++; // Tăng số đếm biến thể

        // Thêm sự kiện xóa cho nút xóa của biến thể mới
        template.querySelector('.remove-variation').addEventListener('click', function() {
            container.removeChild(template); // Xóa biến thể khi nhấn nút xóa
        });
    });

    // Thiết lập sự kiện xóa cho các nút xóa biến thể ban đầu
    document.querySelectorAll('.remove-variation').forEach(function(button) {
        button.addEventListener('click', function() {
            const container = document.getElementById('variations-container');
            const item = button.closest('.variation-item'); // Tìm biến thể chứa nút xóa
            container.removeChild(item); // Xóa biến thể
        });
    });
});
</script>