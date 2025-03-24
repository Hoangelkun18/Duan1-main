<div class="page-content">
    <!-- Start Container Fluid -->
    <div class="container-fluid">
        <?php if(isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['error_message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">Danh sách khuyến mãi</h4>

                        <a href="?act=discount_create" class="btn btn-sm btn-primary">
                            Thêm khuyến mãi
                        </a>

                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Tháng này
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Tải xuống</a>
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Xuất</a>
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Nhập</a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khuyến mãi</th>
                                        <th>Mã khuyến mãi</th>
                                        <th>Loại</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($discounts as $discount): ?>
                                    <tr>
                                        <td><?= $discount['id'] ?></td>
                                        <td><?= $discount['ten_km'] ?></td>
                                        <td><?= $discount['ma_km'] ?></td>
                                        <td><?= $discount['loai_km'] == 1 ? 'Phần trăm' : 'Trực tiếp' ?></td>
                                        <td><?= $discount['ngay_bat_dau'] ?></td>
                                        <td><?= $discount['ngay_ket_thuc'] ?></td>
                                        <td><?= $discount['trang_thai'] == 0 ? 'Kích hoạt' : 'Vô hiệu hóa' ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="?act=edit_discount&id=<?= $discount['id'] ?>"
                                                    class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18">
                                                    </iconify-icon>
                                                </a>
                                                <a href="?act=discount_delete&id=<?= $discount['id'] ?>"
                                                    class="btn btn-soft-danger btn-sm"
                                                    onclick="confirmDelete(<?= $discount['id'] ?>)">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                        class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                    <?php if (empty($discounts)): ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Không có khuyến mãi nào</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer border-top">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Trước</a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Tiếp theo</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container Fluid -->
</div>

<script>
function confirmDelete(id) {
    if (confirm("Bạn có chắc chắn muốn xóa khuyến mãi này?")) {
        window.location.href = "?act=discount_delete&id=" + id;
    }
}
</script>