<div class="page-content">
    <div class="container-xxl">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="bg-light text-center rounded bg-light">
                            <img src="/Duan1-main/public/admin/assets_admin/images/product/p-1.png" alt=""
                                class="avatar-xxl">
                        </div>
                        <div class="mt-3">
                            <h4>Fashion Men, Women & Kid's</h4>
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <p class="mb-1 mt-2">Created By :</p>
                                    <h5 class="mb-0">Seller</h5>
                                </div>
                                <div class="col-lg-4 col-4">
                                    <p class="mb-1 mt-2">Stock :</p>
                                    <h5 class="mb-0">46233</h5>
                                </div>
                                <div class="col-lg-4 col-4">
                                    <p class="mb-1 mt-2">ID :</p>
                                    <h5 class="mb-0">FS16276</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top">
                        <div class="row g-2">
                            <div class="col-lg-6">
                                <a href="?act=category" class="btn btn-outline-secondary w-100">Back to List</a>
                            </div>
                            <div class="col-lg-6">
                                <a href="?act=category" class="btn btn-primary w-100">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8">
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

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Category</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form tạo danh mục -->
                        <form method="POST" action="?act=category_create">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_dm" class="form-label">Category Title</label>
                                        <input type="text" id="ten_dm" name="ten_dm" class="form-control"
                                            placeholder="Enter Title" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-0">
                                        <label for="mo_ta" class="form-label">Description</label>
                                        <textarea class="form-control bg-light-subtle" id="mo_ta" name="mo_ta" rows="7"
                                            placeholder="Type description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-light mb-3 rounded">
                                <div class="row justify-content-end g-2">
                                    <div class="col-lg-2">
                                        <button type="submit" class="btn btn-outline-secondary w-100">Save Change</button>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="?act=category" class="btn btn-primary w-100">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>