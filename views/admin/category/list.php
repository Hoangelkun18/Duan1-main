<div class="page-content">
    <div class="container-xxl">

        <div class="row">
            <?php foreach ($categories as $category): ?>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div
                            class="rounded bg-secondary-subtle d-flex align-items-center justify-content-center mx-auto">
                            <img src="/Duan1-main/public/admin/assets_admin/images/product/p-1.png" alt=""
                                class="avatar-xl">
                        </div>
                        <h4 class="mt-3 mb-0"><?= $category['ten_dm'] ?></h4>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">All Categories List</h4>

                        <a href="?act=category_create" class="btn btn-sm btn-primary">
                            Add Category
                        </a>

                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                This Month
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Export</a>
                                <!-- item-->
                                <a href="#!" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </div>
                                        </th>
                                        <th>Categories</th>
                                        <th>Description</th>
                                        <th>ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    id="customCheck<?= $category['id'] ?>">
                                                <label class="form-check-label"
                                                    for="customCheck<?= $category['id'] ?>"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div
                                                    class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                    <img src="/Duan1-main/public/admin/assets_admin/images/product/p-1.png"
                                                        alt="" class="avatar-md">
                                                </div>
                                                <p class="text-dark fw-medium fs-15 mb-0"><?= $category['ten_dm'] ?></p>
                                            </div>
                                        </td>
                                        <td><?= $category['mo_ta'] ?></td>
                                        <td><?= $category['id'] ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#!" class="btn btn-light btn-sm">
                                                    <iconify-icon icon="solar:eye-broken" class="align-middle fs-18">
                                                    </iconify-icon>
                                                </a>
                                                <a href="?act=category_edit&id=<?= $category['id'] ?>"
                                                    class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18">
                                                    </iconify-icon>
                                                </a>
                                                <a href="?act=category_delete&id=<?= $category['id'] ?>"
                                                    class="btn btn-soft-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
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