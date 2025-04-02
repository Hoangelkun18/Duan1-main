<div class="page-content">
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tài khoản </h4>
                    </div>
                    <div class="card-body">
                        <form action="?act=create_discount" method="POST">
                            <!-- Ten KM (Tên khuyến mãi) -->
                            <div class="mb-3">
                                <label for="ten_km" class="form-label">Tên</label>
                                <input type="text" id="name " name="name" class="form-control"
                                    placeholder="Tên khách hàng " required>
                            </div>

                            <!-- Ma KM (Mã khuyến mãi) -->
                            <div class="mb-3">
                                <label for="ma_km" class="form-label">Mã Khuyến Mãi</label>
                                <input type="text" id="ma_km" name="ma_km" class="form-control"
                                    placeholder="Mã khuyến mãi" required>
                            </div>

                            <!-- Ngay Bat Dau (Ngày bắt đầu) -->
                            <div class="mb-3">
                                <label for="ngay_bat_dau" class="form-label">Ngày Bắt Đầu</label>
                                <input type="date" id="ngay_bat_dau" name="ngay_bat_dau" class="form-control" required>
                            </div>

                            <!-- Ngay Ket Thuc (Ngày kết thúc) -->
                            <div class="mb-3">
                                <label for="ngay_ket_thuc" class="form-label">Ngày Kết Thúc</label>
                                <input type="date" id="ngay_ket_thuc" name="ngay_ket_thuc" class="form-control"
                                    required>
                            </div>

                            <!-- Loai KM (Loại khuyến mãi) -->
                            <div class="mb-3">
                                <label for="loai_km" class="form-label">Loại Khuyến Mãi</label>
                                <select id="loai_km" name="loai_km" class="form-control" required>
                                    <option value="0">Trực tiếp</option>
                                    <option value="1">Phần trăm</option>
                                </select>
                            </div>

                            <!-- Trang Thai (Trạng thái) -->
                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Trạng Thái</label>
                                <select id="trang_thai" name="trang_thai" class="form-control" required>
                                    <option value="0">Đang hoạt động</option>
                                    <option value="1">Ngừng hoạt động</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <a href="#!" class="btn btn-outline-secondary w-100">Hủy</a>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-primary w-100">Tạo Khuyến Mãi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>