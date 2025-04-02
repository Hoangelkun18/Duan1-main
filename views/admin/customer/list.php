<div class="page-content">
    <div class="container-xxl">
        <!-- Hiển thị thông báo -->
        <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
        </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">Tất cả danh mục</h4>
                        <a href="?act=customer_create" class="btn btn-sm btn-primary">
                            Thêm tài khoản
                        </a>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th>Tên </th>
                                        <th>Email</th>
                                        <th>Mật khẩu </th>
                                        <th>Địa chỉ </th>
                                        <th>Số điện thoai </th>
                                        <th>Chức năng</th>
                                        <th>Thao tác </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($customers as $customer): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <p class="text-dark fw-medium fs-15 mb-0"><?= $customer['name'] ?></p>
                                            </div>
                                        </td>
                                        <td><?= $customer['email'] ?></td>
                                        <td><?= $customer['mat_khau'] ?></td>
                                        <td><?= $customer['dia_chi'] ?></td>
                                        <td><?= $customer['so_dien_thoai'] ?></td>
                                        <td><?php if ($customer['role']== 1){echo"Khách hàng ";}else{
                                            echo"Admin";
                                        }  ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="?act=customer_edit&id=<?= $customer['id'] ?>"
                                                    class="btn btn-soft-info btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18">
                                                    </iconify-icon>
                                                </a>
                                                <a href="?act=customer_delete&id=<?= $customer['id'] ?>"
                                                    class="btn btn-soft-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                        class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>