<div class="page-content">
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chỉnh Sửa Khuyến Mãi</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form Edit -->
                        <form action="?act=edit_discount&id=<?php echo $discount['id']; ?>" method="POST">
                            <!-- Tên KM (Tên khuyến mãi) -->
                            <div class="mb-3">
                                <label for="ten_km" class="form-label">Tên Khuyến Mãi</label>
                                <input type="text" id="ten_km" name="ten_km" class="form-control"
                                    value="<?php echo htmlspecialchars($discount['ten_km']); ?>"
                                    placeholder="Tên khuyến mãi" required>
                            </div>

                            <!-- Mã KM (Mã khuyến mãi) -->
                            <div class="mb-3">
                                <label for="ma_km" class="form-label">Mã Khuyến Mãi</label>
                                <input type="text" id="ma_km" name="ma_km" class="form-control"
                                    value="<?php echo htmlspecialchars($discount['ma_km']); ?>"
                                    placeholder="Mã khuyến mãi" required>
                            </div>

                            <!-- Ngày Bắt Đầu -->
                            <div class="mb-3">
                                <label for="ngay_bat_dau" class="form-label">Ngày Bắt Đầu</label>
                                <input type="date" id="ngay_bat_dau" name="ngay_bat_dau" class="form-control"
                                    value="<?php echo $discount['ngay_bat_dau']; ?>" required>
                            </div>

                            <!-- Ngày Kết Thúc -->
                            <div class="mb-3">
                                <label for="ngay_ket_thuc" class="form-label">Ngày Kết Thúc</label>
                                <input type="date" id="ngay_ket_thuc" name="ngay_ket_thuc" class="form-control"
                                    value="<?php echo $discount['ngay_ket_thuc']; ?>" required>
                            </div>

                            <!-- Loại KM (Loại khuyến mãi) -->
                            <div class="mb-3">
                                <label for="loai_km" class="form-label">Loại Khuyến Mãi</label>
                                <select id="loai_km" name="loai_km" class="form-control" required>
                                    <option value="0" <?php echo ($discount['loai_km'] == 0) ? 'selected' : ''; ?>>Trực
                                        tiếp</option>
                                    <option value="1" <?php echo ($discount['loai_km'] == 1) ? 'selected' : ''; ?>>Phần
                                        trăm</option>
                                </select>
                            </div>

                            <!-- Trạng thái -->
                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Trạng Thái</label>
                                <select id="trang_thai" name="trang_thai" class="form-control" required>
                                    <option value="0" <?php echo ($discount['trang_thai'] == 0) ? 'selected' : ''; ?>>
                                        Đang hoạt động</option>
                                    <option value="1" <?php echo ($discount['trang_thai'] == 1) ? 'selected' : ''; ?>>
                                        Ngừng hoạt động</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <a href="?act=discount" class="btn btn-outline-secondary w-100">Hủy</a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-primary w-100">Cập Nhật Khuyến Mãi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>