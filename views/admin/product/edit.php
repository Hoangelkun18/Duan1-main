<div class="page-content">
    <div class="container-xxl">
        <form action="?act=product_edit&id=<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <div id="image-preview" class="mb-3">
                                <img src="/Duan1-main/public/admin/assets_admin/images/product/<?= htmlspecialchars($product['hinh_anh'] ? $product['hinh_anh'] : 'default-product.png') ?>"
                                    alt="Ảnh sản phẩm" class="img-fluid rounded shadow-sm" id="main-image-preview"
                                    style="max-height: 200px; object-fit: cover;">
                            </div>
                            <div class="mt-3">
                                <h4 id="product-name-preview" class="text-primary">
                                    <?= htmlspecialchars($product['ten_sp']) ?></h4>
                                <h5 class="text-dark fw-medium mt-3">Giá:</h5>
                                <h4
                                    class="fw-semibold text-dark mt-2 d-flex align-items-center justify-content-center gap-2">
                                    <span
                                        id="product-price-preview"><?= number_format($variations[0]['don_gia'] ?? 0, 0, ',', '.') ?></span>
                                    VNĐ
                                </h4>
                            </div>
                        </div>
                        <div class="card-footer bg-light-subtle">
                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary w-100">Cập Nhật</button>
                                </div>
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
                            <div class="mb-3">
                                <label for="main-image" class="form-label fw-bold">Hình Ảnh Chính</label>
                                <input type="file" name="main_image" id="main-image" class="form-control"
                                    accept="image/*">
                                <small class="text-muted">Để trống nếu không muốn thay đổi hình ảnh chính</small>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Thông Tin Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_sp" class="form-label fw-bold">Tên Sản Phẩm</label>
                                        <input type="text" id="ten_sp" name="ten_sp" class="form-control"
                                            placeholder="Nhập tên sản phẩm"
                                            value="<?= htmlspecialchars($product['ten_sp']) ?>" required>
                                    </div>
                                </div>
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
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="so_luong" class="form-label fw-bold">Số Lượng</label>
                                        <input type="number" id="so_luong" name="so_luong" class="form-control"
                                            placeholder="Nhập số lượng" min="0" value="<?= $product['so_luong'] ?>"
                                            required>
                                    </div>
                                </div>
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
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Biến Thể Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div id="variations-container">
                                <?php foreach ($variations as $index => $variation): ?>
                                <div class="variation-item border rounded p-3 mb-3 shadow-sm">
                                    <div class="row">
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
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Số Lượng</label>
                                                <input type="number" class="form-control"
                                                    name="variations[<?= $index ?>][so_luong]" min="0"
                                                    value="<?= $variation['so_luong'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Giá</label>
                                                <input type="number" class="form-control price-input"
                                                    name="variations[<?= $index ?>][don_gia]" min="0"
                                                    value="<?= $variation['don_gia'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Giá Khuyến Mãi</label>
                                                <input type="number" class="form-control"
                                                    name="variations[<?= $index ?>][gia_km]" min="0"
                                                    value="<?= $variation['gia_km'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded shadow-sm">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary w-100">Cập Nhật</button>
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