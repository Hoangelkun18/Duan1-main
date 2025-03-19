<?php if(isset($_SESSION['success_message'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['success_message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error_message'])): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['error_message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['error_message']); ?>
<?php endif; ?>
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">All Product List</h4>

                        <a href="?act=product_create" class="btn btn-sm btn-primary">
                            Add Product
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
                                            <div class="form-check ms-1">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </div>
                                        </th>
                                        <th>Product Name & Size</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Rating</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product): ?>
                                    <?php 
                                            // Lấy thông tin kích thước cho sản phẩm
                                            $sizes = $productModel->getSizes($product['id']);
                                            $sizeText = '';
                                            foreach ($sizes as $size) {
                                                $sizeText .= $size['ten_kich_co'] . ' , ';
                                            }
                                            $sizeText = rtrim($sizeText, ' , ');
                                            
                                            // Lấy thông tin đánh giá
                                            $ratingInfo = $productModel->getRatingInfo($product['id']);
                                        ?>
                                    <tr>
                                        <td>
                                            <div class="form-check ms-1">
                                                <input type="checkbox" class="form-check-input"
                                                    id="customCheck2_<?php echo $product['id']; ?>">
                                                <label class="form-check-label"
                                                    for="customCheck2_<?php echo $product['id']; ?>">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div
                                                    class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                    <img src="./public/admin/assets_admin/images/product<?php echo htmlspecialchars($product['hinh_anh'] ? $product['hinh_anh'] : 'public/admin/assets_admin/images/product/p-1.png'); ?>"
                                                        alt="<?php echo $product['ten_sp']; ?>" class="avatar-md">
                                                </div>
                                                <div>
                                                    <a href="?act=product_edit&id=<?php echo $product['id']; ?>"
                                                        class="text-dark fw-medium fs-15"><?php echo $product['ten_sp']; ?></a>
                                                    <p class="text-muted mb-0 mt-1 fs-13"><span>Size :
                                                        </span><?php echo $sizeText ? $sizeText : 'N/A'; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$<?php echo $product['gia_thap']; ?><?php echo ($product['gia_cao'] > $product['gia_thap']) ? ' - $' . $product['gia_cao'] : ''; ?>
                                        </td>
                                        <td>
                                            <p class="mb-1 text-muted"><span
                                                    class="text-dark fw-medium"><?php echo $product['so_luong']; ?>
                                                    Item</span> Left</p>
                                            <p class="mb-0 text-muted"><?php echo $product['so_luong_ban'] ?? 0; ?> Sold
                                            </p>
                                        </td>
                                        <td><?php echo $product['ten_dm']; ?></td>
                                        <td>
                                            <span class="badge p-1 bg-light text-dark fs-12 me-1">
                                                <i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i>
                                                <?php echo $ratingInfo['rating']; ?>
                                            </span>
                                            <?php echo $ratingInfo['count']; ?> Review
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="?act=product_edit&id=<?php echo $product['id']; ?>"
                                                    class="btn btn-light btn-sm">
                                                    <iconify-icon icon="solar:eye-broken" class="align-middle fs-18">
                                                    </iconify-icon>
                                                </a>
                                                <a href="?act=product_edit&id=<?php echo $product['id']; ?>"
                                                    class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18">
                                                    </iconify-icon>
                                                </a>
                                                <a href="?act=product_delete&id=<?php echo $product['id']; ?>"
                                                    class="btn btn-soft-danger btn-sm"
                                                    onclick="confirmDelete(<?php echo $product['id']; ?>)">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                        class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                    <?php if (empty($products)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No products found</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                    <div class="card-footer border-top">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
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
    if (confirm("Are you sure you want to delete this product?")) {
        window.location.href = "?act=product_delete&id=" + id;
    }
}
</script>