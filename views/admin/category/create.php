<div class="page-content">
    <div class="container-xxl">
        <div class="row">

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
                                        <button type="submit" class="btn btn-success w-100">Save
                                            Change</button>
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