<section class="section-b-space pt-0 product-thumbnail-page">
    <div class="custom-container container">
        <div class="row gy-4">
            <!-- ---------------------------------------------------------------------------- -->

            <div class="col-lg-6">
                <div class="row sticky">
                    <div class="col-sm-2 col-3">
                        <div class="swiper product-slider product-slider-img">
                            <div class="swiper-wrapper">
                                <?php foreach($productDetail as $prod): ?>
                                <div class="swiper-slide"> <img
                                        src="/Duan1-main/public/admin/assets_admin/images/product/<?= $prod['hinh_anh']?>"
                                        alt="">
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-9">
                        <div class="swiper product-slider-thumb product-slider-img-1">
                            <div class="swiper-wrapper ratio_square-2">
                                <?php foreach($productDetail as $prod): ?>
                                <div class="swiper-slide">
                                    <img class="bg-img"
                                        src="/Duan1-main/public/admin/assets_admin/images/product/<?= $prod['hinh_anh']?>"
                                        alt="">
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-detail-box">
                    <div class="product-option">
                        <?php foreach($productDetail as $prod): 
                             $danh_sach_mau = explode(',', $prod['danh_sach_mau']);  // Tách danh sách màu sắc thành mảng
                             $danh_sach_kich_co = explode(',', $prod['danh_sach_kich_co']);  // Tách danh sách kích cỡ thành mảng
                         ?>


                        <h3><?=$prod['ten_sp'] ?></h3>
                        <p><?=$prod['gia_thap'] ?>
                            <del><?=$prod['gia_km_cao'] ?></del><span class="offer-btn">25% off</span>
                        </p>
                        <div class="rating">
                            <p><?=$prod['mo_ta'] ?></p>
                        </div>

                        <div class="d-flex">
                            <div>
                                <h5>Size:</h5>
                                <div class="size-box">
                                    <ul class="selected">
                                        <?php foreach($danh_sach_kich_co as $kich_co ): ?>
                                        <li><?= $kich_co ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5>Color:</h5>
                            <div class="size-box">
                                <ul class="color-variant">
                                    <?php foreach($danh_sach_mau as $mau): ?>
                                    <li><?= $mau ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="quantity-box d-flex align-items-center gap-3">
                            <div class="quantity">
                                <button class="minus" type="button">-</button>
                                <input type="number" value="1" min="1" max="20">
                                <button class="plus" type="button">+</button>
                            </div>
                            <div class="d-flex align-items-center gap-3 w-100"> <a class="btn btn_black sm" href="#"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight">Add To Cart</a><a class="btn btn_outline sm"
                                    href="#">Buy Now</a></div>
                        </div>

                        <div class="dz-info">
                            <ul>
                                <li>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6>Có sẵn: </h6>
                                        <p>Đặt hàng trước</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6>Danh mục: </h6>
                                        <p><?=$prod['ten_dm'] ?>-
                                            <?=$prod['id_dm'] ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6>Số lượng:</h6>
                                        <p><?=$prod['so_luong'] ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->
    <div class="product-section-box x-small-section pt-0">
        <div class="custom-container container">
            <div class="row">
                <div class="col-12">
                    <ul class="product-tab theme-scrollbar nav nav-tabs nav-underline" id="Product" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                data-bs-target="#Description-tab-pane" role="tab" aria-controls="Description-tab-pane"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="specification-tab" data-bs-toggle="tab"
                                data-bs-target="#specification-tab-pane" role="tab"
                                aria-controls="specification-tab-pane" aria-selected="false">Specification</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="question-tab" data-bs-toggle="tab"
                                data-bs-target="#question-tab-pane" role="tab" aria-controls="question-tab-pane"
                                aria-selected="false">Q & A</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                data-bs-target="#Reviews-tab-pane" role="tab" aria-controls="Reviews-tab-pane"
                                aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content product-content" id="ProductContent">
                        <div class="tab-pane fade show active" id="Description-tab-pane" role="tabpanel"
                            aria-labelledby="Description-tab" tabindex="0">
                            <div class="row gy-4">
                                <div class="col-12">
                                    <p class="paragraphs">Experience the perfect blend of comfort and style with our
                                        Summer Breeze Cotton Dress. Crafted from 100% premium cotton, this dress offers
                                        a soft and breathable feel, making it ideal for warm weather. The lightweight
                                        fabric ensures you stay cool and comfortable throughout the day.</p>
                                    <p class="paragraphs">Perfect for casual outings, beach trips, or summer parties.
                                        Pair it with sandals for a relaxed look or dress it up with heels and
                                        accessories for a more polished ensemble.</p>
                                </div>
                                <div class="col-12">
                                    <div class="row gy-4">
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="general-summery">
                                                <h5>Product Specifications</h5>
                                                <ul>
                                                    <li>100% Premium Cotton</li>
                                                    <li>A-line silhouette with a flattering fit</li>
                                                    <li>Knee-length for versatile styling</li>
                                                    <li>V-neck for a touch of elegance</li>
                                                    <li>Short sleeves for a casual look</li>
                                                    <li>Available in solid colors and floral prints</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="general-summery">
                                                <h5>Washing Instructions</h5>
                                                <ul>
                                                    <li>Use cold water for washing</li>
                                                    <li>Use a low heat setting for drying.</li>
                                                    <li>Avoid using bleach on this fabric.</li>
                                                    <li>Use a low heat setting when ironing.</li>
                                                    <li>Do not take this item to a dry cleaner.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="general-summery">
                                                <h5>Size & Fit</h5>
                                                <ul>
                                                    <li>The model (height 5'8) is wearing a size S</li>
                                                    <li>Measurements taken from size Small</li>
                                                    <li>Chest: 30"</li>
                                                    <li>Length: 20"</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="specification-tab-pane" role="tabpanel"
                            aria-labelledby="specification-tab" tabindex="0">
                            <p>I like to be real. I don't like things to be staged or fussy. Grunge is a hippied
                                romantic version of punk. I have my favourite fashion decade, yes, yes, yes: '60s. It
                                was a sort of little revolution; the clothes were amazing but not too exaggerated.
                                Fashions fade, style is eternal. A girl should be two things: classy and fabulous.</p>
                            <div class="table-responsive theme-scrollbar">
                                <table class="specification-table table striped">
                                    <tr>
                                        <th>Product Dimensions</th>
                                        <td>15 x 15 x 3 cm; 250 Grams</td>
                                    </tr>
                                    <tr>
                                        <th>Date First Available</th>
                                        <td>5 April 2021</td>
                                    </tr>
                                    <tr>
                                        <th>Manufacturer&rlm;</th>
                                        <td>Aditya Birla Fashion and Retail Limited</td>
                                    </tr>
                                    <tr>
                                        <th>ASIN</th>
                                        <td>B06Y28LCDN</td>
                                    </tr>
                                    <tr>
                                        <th>Item model number</th>
                                        <td>AMKP317G04244</td>
                                    </tr>
                                    <tr>
                                        <th>Department</th>
                                        <td>Men</td>
                                    </tr>
                                    <tr>
                                        <th>Item Weight</th>
                                        <td>250 G</td>
                                    </tr>
                                    <tr>
                                        <th>Item Dimensions LxWxH</th>
                                        <td>15 x 15 x 3 Centimeters</td>
                                    </tr>
                                    <tr>
                                        <th>Net Quantity</th>
                                        <td>1 U</td>
                                    </tr>
                                    <tr>
                                        <th>Included Components&rlm;</th>
                                        <td>1-T-shirt</td>
                                    </tr>
                                    <tr>
                                        <th>Generic Name</th>
                                        <td>T-shirt</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="question-tab-pane" role="tabpanel" aria-labelledby="question-tab"
                            tabindex="0">
                            <div class="question-main-box">
                                <h5>Have Doubts Regarding This Product ?</h5>
                                <h6 data-bs-toggle="modal" data-bs-target="#question-modal" title="Quick View"
                                    tabindex="0">Post Your Question</h6>
                            </div>
                            <div class="question-answer">
                                <ul>
                                    <li>
                                        <div class="question-box">
                                            <p>Q1 </p>
                                            <h6>Which designer created the little black dress?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0</a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a></li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>The little black dress (LBD) is often
                                                attributed to the iconic fashion designer Coco Chanel. She popularized
                                                the concept of the LBD in the 1920s, offering a simple, versatile, and
                                                elegant garment that became a staple in women's fashion.</span></div>
                                    </li>
                                    <li>
                                        <div class="question-box">
                                            <p>Q2 </p>
                                            <h6>Which First Lady influenced women's fashion in the 1960s?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0</a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a></li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>The First Lady who significantly
                                                influenced women's fashion in the 1960s was Jacqueline Kennedy, the wife
                                                of President John F. Kennedy. She was renowned for her elegant and
                                                sophisticated style, often wearing simple yet chic outfits that set
                                                trends during her time in the White House. </span></div>
                                    </li>
                                    <li>
                                        <div class="question-box">
                                            <p>Q3 </p>
                                            <h6>What was the first name of the fashion designer Chanel?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0 </a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a></li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>The first name of the fashion designer
                                                Chanel was Gabrielle. Gabrielle "Coco" Chanel was a pioneering French
                                                fashion designer known for her timeless designs, including the iconic
                                                Chanel suit and the little black dress.</span></div>
                                    </li>
                                    <li>
                                        <div class="question-box">
                                            <p>Q4 </p>
                                            <h6>Carnaby Street, famous in the 60s as a fashion center, is in which
                                                capital?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0</a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a></li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>Carnaby Street, famous for its
                                                association with fashion and youth culture in the 1960s, is located in
                                                London, the capital of the United Kingdom.🎉</span></div>
                                    </li>
                                    <li>
                                        <div class="question-box">
                                            <p>Q5 </p>
                                            <h6>Threadless is a company selling unique what?</h6>
                                            <ul class="link-dislike-box">
                                                <li> <a href="#"><i class="iconsax" data-icon="like"> </i>0</a></li>
                                                <li> <a href="#"><i class="iconsax" data-icon="dislike"> </i>0</a></li>
                                            </ul>
                                        </div>
                                        <div class="answer-box"><b>Ans.</b><span>Threadless is a company selling unique
                                                T-shirts.</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Reviews-tab-pane" role="tabpanel" aria-labelledby="Reviews-tab"
                            tabindex="0">
                            <div class="row gy-4">
                                <div class="col-lg-4">
                                    <div class="review-right">
                                        <div class="customer-rating">
                                            <div class="global-rating">
                                                <div>
                                                    <h5>4.5</h5>
                                                </div>
                                                <div>
                                                    <h6>Average Ratings</h6>
                                                    <ul class="rating p-0 mb">
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-regular fa-star"></i></li>
                                                        <li><span>(14)</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="rating-progess">
                                                <li>
                                                    <p>5 Star</p>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="Animated striped example" aria-valuenow="75"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            style="width: 80%"></div>
                                                    </div>
                                                    <p>80%</p>
                                                </li>
                                                <li>
                                                    <p>4 Star</p>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="Animated striped example" aria-valuenow="75"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            style="width: 70%"></div>
                                                    </div>
                                                    <p>70%</p>
                                                </li>
                                                <li>
                                                    <p>3 Star</p>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="Animated striped example" aria-valuenow="75"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            style="width: 55%"></div>
                                                    </div>
                                                    <p>55%</p>
                                                </li>
                                                <li>
                                                    <p>2 Star</p>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="Animated striped example" aria-valuenow="75"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            style="width: 40%"></div>
                                                    </div>
                                                    <p>40%</p>
                                                </li>
                                                <li>
                                                    <p>1 Star</p>
                                                    <div class="progress" role="progressbar"
                                                        aria-label="Animated striped example" aria-valuenow="75"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            style="width: 25%"></div>
                                                    </div>
                                                    <p>25%</p>
                                                </li>
                                            </ul>
                                            <button class="btn reviews-modal" data-bs-toggle="modal"
                                                data-bs-target="#Reviews-modal" title="Quick View" tabindex="0">Write a
                                                review</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="comments-box">
                                        <h5>Comments </h5>
                                        <ul class="theme-scrollbar">
                                            <li>
                                                <div class="comment-items">
                                                    <div class="user-img"> <img
                                                            src="/Duan1-main/public/client/assets/images/user/1.jpg"
                                                            alt=""></div>
                                                    <div class="user-content">
                                                        <div class="user-info">
                                                            <div class="d-flex justify-content-between gap-3">
                                                                <h6> <i class="iconsax" data-icon="user-1"></i>Michel
                                                                    Poe</h6><span> <i class="iconsax"
                                                                        data-icon="clock"></i>Mar 29, 2022</span>
                                                            </div>
                                                            <ul class="rating p-0 mb">
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-regular fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <p>Khaki cotton blend military jacket flattering fit mock horn
                                                            buttons and patch pockets showerproof black lightgrey.
                                                            Printed lining patch pockets jersey blazer built in pocket
                                                            square wool casual quilted jacket without hood azure.</p><a
                                                            href="#"> <span> <i class="iconsax" data-icon="undo"></i>
                                                                Replay</span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="reply">
                                                <div class="comment-items">
                                                    <div class="user-img"> <img
                                                            src="/Duan1-main/public/client/assets/images/user/2.jpg"
                                                            alt=""></div>
                                                    <div class="user-content">
                                                        <div class="user-info">
                                                            <div class="d-flex justify-content-between gap-3">
                                                                <h6> <i class="iconsax" data-icon="user-1"></i>Michel
                                                                    Poe</h6><span> <i class="iconsax"
                                                                        data-icon="clock"></i>Mar 29, 2022</span>
                                                            </div>
                                                            <ul class="rating p-0 mb">
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-regular fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <p>Khaki cotton blend military jacket flattering fit mock horn
                                                            buttons and patch pockets showerproof black lightgrey.
                                                            Printed lining patch pockets jersey blazer built in pocket
                                                            square wool casual quilted jacket without hood azure.</p><a
                                                            href="#"> <span> <i class="iconsax" data-icon="undo"></i>
                                                                Replay</span></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment-items">
                                                    <div class="user-img"> <img
                                                            src="/Duan1-main/public/client/assets/images/user/3.jpg"
                                                            alt=""></div>
                                                    <div class="user-content">
                                                        <div class="user-info">
                                                            <div class="d-flex justify-content-between gap-3">
                                                                <h6> <i class="iconsax" data-icon="user-1"></i>Michel
                                                                    Poe</h6><span> <i class="iconsax"
                                                                        data-icon="clock"></i>Mar 29, 2022</span>
                                                            </div>
                                                            <ul class="rating p-0 mb">
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-regular fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <p>Khaki cotton blend military jacket flattering fit mock horn
                                                            buttons and patch pockets showerproof black lightgrey.
                                                            Printed lining patch pockets jersey blazer built in pocket
                                                            square wool casual quilted jacket without hood azure.</p><a
                                                            href="#"> <span> <i class="iconsax" data-icon="undo"></i>
                                                                Replay</span></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-b-space pt-0">
    <div class="custom-container container product-contain">
        <div class="title text-start">
            <h3>Sản phẩm liên quan</h3>
            <svg>
                <use href="https://themes.pixelstrap.net/katie/assets/svg/icon-sprite.svg#main-line"></use>
            </svg>
        </div>
        <div class="swiper special-offer-slide-2">
            <div class="swiper-wrapper ratio1_3">
                <?php foreach($relatedProduct as $related ): ?>
                <div class="swiper-slide">

                    <div class="product-box-3">
                        <div class="img-wrapper">
                            <div class="product-image">
                                <a class="" href="#"> <img class="bg-img"
                                        src="/Duan1-main/public/admin/assets_admin/images/product/<?php echo $related['hinh_anh']; ?>"
                                        alt="product"></a>
                            </div>

                        </div>
                        <div class="product-detail">
                            <a href="?act=detail&id=<?=$related['id_san_pham']?>">
                                <h6><?php echo $related['ten_sp']; ?></h6>
                            </a>
                            <p><?php echo $related['don_gia']; ?>
                                <del><?php echo $related['gia_km']; ?></del><span>-20%</span>
                            </p>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>
                <!-- <div class="swiper-slide">
                    <div class="product-box-3">
                        <div class="img-wrapper">
                            <div class="label-block"><span class="lable-1">NEW</span><a class="label-2 wishlist-icon"
                                    href="javascript:void(0)" tabindex="0"><i class="iconsax" data-icon="heart"
                                        aria-hidden="true" data-bs-toggle="tooltip"
                                        data-bs-title="Add to Wishlist"></i></a></div>
                            <div class="product-image"><a class="pro-first" href="product.html"> <img class="bg-img"
                                        src="/Duan1-main/public/client/assets/images/product/product-3/18.jpg"
                                        alt="product"></a><a class="pro-sec" href="product.html"> <img class="bg-img"
                                        src="/Duan1-main/public/client/assets/images/product/product-3/22.jpg"
                                        alt="product"></a></div>
                            <div class="cart-info-icon"> <a href="#" data-bs-toggle="modal" data-bs-target="#addtocart"
                                    tabindex="0"><i class="iconsax" data-icon="basket-2" aria-hidden="true"
                                        data-bs-toggle="tooltip" data-bs-title="Add to cart"> </i></a><a
                                    href="compare.html" tabindex="0"><i class="iconsax" data-icon="arrow-up-down"
                                        aria-hidden="true" data-bs-toggle="tooltip" data-bs-title="Compare"></i></a><a
                                    href="#" data-bs-toggle="modal" data-bs-target="#quick-view" tabindex="0"><i
                                        class="iconsax" data-icon="eye" aria-hidden="true" data-bs-toggle="tooltip"
                                        data-bs-title="Quick View"></i></a></div>
                        </div>
                        <div class="product-detail">
                            <ul class="rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li>4.3</li>
                            </ul><a href="product.html">
                                <h6>Wide Linen-Blend Trousers</h6>
                            </a>
                            <p>$100.00
                                <del>$18.00 </del>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box-3">
                        <div class="img-wrapper">
                            <div class="label-block"><span class="lable-1">NEW</span><a class="label-2 wishlist-icon"
                                    href="javascript:void(0)" tabindex="0"><i class="iconsax" data-icon="heart"
                                        aria-hidden="true" data-bs-toggle="tooltip"
                                        data-bs-title="Add to Wishlist"></i></a></div>
                            <div class="product-image"><a class="pro-first" href="product.html"> <img class="bg-img"
                                        src="/Duan1-main/public/client/assets/images/product/product-3/12.jpg"
                                        alt="product"></a><a class="pro-sec" href="product.html"> <img class="bg-img"
                                        src="/Duan1-main/public/client/assets/images/product/product-3/10.jpg"
                                        alt="product"></a></div>
                            <div class="cart-info-icon"> <a href="#" data-bs-toggle="modal" data-bs-target="#addtocart"
                                    tabindex="0"><i class="iconsax" data-icon="basket-2" aria-hidden="true"
                                        data-bs-toggle="tooltip" data-bs-title="Add to cart"> </i></a><a
                                    href="compare.html" tabindex="0"><i class="iconsax" data-icon="arrow-up-down"
                                        aria-hidden="true" data-bs-toggle="tooltip" data-bs-title="Compare"></i></a><a
                                    href="#" data-bs-toggle="modal" data-bs-target="#quick-view" tabindex="0"><i
                                        class="iconsax" data-icon="eye" aria-hidden="true" data-bs-toggle="tooltip"
                                        data-bs-title="Quick View"></i></a></div>
                        </div>
                        <div class="product-detail">
                            <ul class="rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li>4.3</li>
                            </ul><a href="product.html">
                                <h6>Long Sleeve Rounded T-Shirt</h6>
                            </a>
                            <p>$120.30
                                <del>$140.00</del><span>-20%</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box-3">
                        <div class="img-wrapper">
                            <div class="label-block"><span class="lable-1">NEW</span><a class="label-2 wishlist-icon"
                                    href="javascript:void(0)" tabindex="0"><i class="iconsax" data-icon="heart"
                                        aria-hidden="true" data-bs-toggle="tooltip"
                                        data-bs-title="Add to Wishlist"></i></a></div>
                            <div class="product-image"><a class="pro-first" href="product.html"> <img class="bg-img"
                                        src="/Duan1-main/public/client/assets/images/product/product-3/16.jpg"
                                        alt="product"></a><a class="pro-sec" href="product.html"> <img class="bg-img"
                                        src="/Duan1-main/public/client/assets/images/product/product-3/20.jpg"
                                        alt="product"></a></div>
                            <div class="cart-info-icon"> <a href="#" data-bs-toggle="modal" data-bs-target="#addtocart"
                                    tabindex="0"><i class="iconsax" data-icon="basket-2" aria-hidden="true"
                                        data-bs-toggle="tooltip" data-bs-title="Add to cart"> </i></a><a
                                    href="compare.html" tabindex="0"><i class="iconsax" data-icon="arrow-up-down"
                                        aria-hidden="true" data-bs-toggle="tooltip" data-bs-title="Compare"></i></a><a
                                    href="#" data-bs-toggle="modal" data-bs-target="#quick-view" tabindex="0"><i
                                        class="iconsax" data-icon="eye" aria-hidden="true" data-bs-toggle="tooltip"
                                        data-bs-title="Quick View"></i></a></div>
                            <div class="countdown">
                                <ul class="clockdiv11">
                                    <li>
                                        <div class="timer">
                                            <div class="days"></div>
                                        </div><span class="title">Days</span>
                                    </li>
                                    <li class="dot"> <span>:</span></li>
                                    <li>
                                        <div class="timer">
                                            <div class="hours"></div>
                                        </div><span class="title">Hours</span>
                                    </li>
                                    <li class="dot"> <span>:</span></li>
                                    <li>
                                        <div class="timer">
                                            <div class="minutes"></div>
                                        </div><span class="title">Min</span>
                                    </li>
                                    <li class="dot"> <span>:</span></li>
                                    <li>
                                        <div class="timer">
                                            <div class="seconds"></div>
                                        </div><span class="title">Sec</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-detail">
                            <ul class="rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                <li>4.3</li>
                            </ul><a href="product.html">
                                <h6>Blue lined White T-Shirt</h6>
                            </a>
                            <p>$190.00
                                <del>$210.00</del>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box-3">
                        <div class="img-wrapper">
                            <div class="label-block"><span class="lable-1">NEW</span><a class="label-2 wishlist-icon"
                                    href="javascript:void(0)" tabindex="0"><i class="iconsax" data-icon="heart"
                                        aria-hidden="true" data-bs-toggle="tooltip"
                                        data-bs-title="Add to Wishlist"></i></a></div>
                            <div class="product-image"><a class="pro-first" href="product.html"> <img class="bg-img"
                                        src="/Duan1-main/public/client/assets/images/product/product-3/22.jpg"
                                        alt="product"></a><a class="pro-sec" href="product.html"> <img class="bg-img"
                                        src="/Duan1-main/public/client/assets/images/product/product-3/12.jpg"
                                        alt="product"></a></div>
                            <div class="cart-info-icon"> <a href="#" data-bs-toggle="modal" data-bs-target="#addtocart"
                                    tabindex="0"><i class="iconsax" data-icon="basket-2" aria-hidden="true"
                                        data-bs-toggle="tooltip" data-bs-title="Add to cart"> </i></a><a
                                    href="compare.html" tabindex="0"><i class="iconsax" data-icon="arrow-up-down"
                                        aria-hidden="true" data-bs-toggle="tooltip" data-bs-title="Compare"></i></a><a
                                    href="#" data-bs-toggle="modal" data-bs-target="#quick-view" tabindex="0"><i
                                        class="iconsax" data-icon="eye" aria-hidden="true" data-bs-toggle="tooltip"
                                        data-bs-title="Quick View"></i></a></div>
                            <div class="countdown">
                                <ul class="clockdiv10">
                                    <li>
                                        <div class="timer">
                                            <div class="days"></div>
                                        </div><span class="title">Days</span>
                                    </li>
                                    <li class="dot"> <span>:</span></li>
                                    <li>
                                        <div class="timer">
                                            <div class="hours"></div>
                                        </div><span class="title">Hours</span>
                                    </li>
                                    <li class="dot"> <span>:</span></li>
                                    <li>
                                        <div class="timer">
                                            <div class="minutes"></div>
                                        </div><span class="title">Min</span>
                                    </li>
                                    <li class="dot"> <span>:</span></li>
                                    <li>
                                        <div class="timer">
                                            <div class="seconds"></div>
                                        </div><span class="title">Sec</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-detail">
                            <ul class="rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li>4.3</li>
                            </ul><a href="product.html">
                                <h6>Greciilooks Women's Stylish Top</h6>
                            </a>
                            <p>$100.00
                                <del>$140.00</del><span>-20%</span>
                            </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>