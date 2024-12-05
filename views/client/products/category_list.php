<?php
include_once ROOT_DIR . "views/client/header.php" 
?>

<main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item"><a href="<?= ROOT_URL . '?ctl=shop' ?>">Cửa hàng</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page"><?= $title ?? '' ?></li>
                            </ul>
                            <h1 class="title"> Tất cả sản phẩm : <?= $title ?? '' ?> </h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                       <!--  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-shop-top">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="category-select">

                                        <!-- Start Single Select  -->
                                    <select class="single-select" onchange="location = this.value;">
                                        <option value="" disabled selected>Chọn danh mục</option>
                                        <?php foreach ($categories as $cate): ?>
                                            <option value="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                                <?= $cate['category_name'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>

                                    <!-- End Single Select  -->

                                        <!-- Start Single Select  -->
                                        <select class="single-select">
                                            <option>Color</option>
                                            <option>Red</option>
                                            <option>Blue</option>
                                            <option>Green</option>
                                            <option>Pink</option>
                                        </select>
                                        <!-- End Single Select  -->

                                        <!-- Start Single Select  -->
                                        <select class="single-select">
                                            <option>Price Range</option>
                                            <option>0 - 100</option>
                                            <option>100 - 500</option>
                                            <option>500 - 1000</option>
                                            <option>1000 - 1500</option>
                                        </select>
                                        <!-- End Single Select  -->

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                        <!-- Start Single Select  -->
                                        <select class="single-select">
                                            <option>Sort by Latest</option>
                                            <option>Sort by Name</option>
                                            <option>Sort by Price</option>
                                            <option>Sort by Viewed</option>
                                        </select>
                                        <!-- End Single Select  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row--15">
                    <?php foreach($products as $pro): ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
                            <div class="thumbnail">
                                <a href="<?= ROOT_URL . '?ctl=details&id=' . $pro['id'] ?>">
                                    <img src="<?= ROOT_URL . 'images/' . $pro['img_product'] ?>" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="<?= ROOT_URL . '?ctl=details&id=' . $pro['id'] ?>"><?= $pro['product_name'] ?></a></h5>
                                    <div class="product-price-variant">
										<span class="price current-price"><?= number_format($pro['price']) ?> VNĐ</span>
									</div>
									<ul>
										<li>Số lượng: <?= $pro['quantity'] ?></li>
									</ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <!-- End Single Product  -->
                </div>  
                <div class="text-center pt--30">
                    <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Tải thêm</a>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->
        <!-- Start Axil Newsletter Area  -->
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                    <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i
                                class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->
    </main>

<?php
include_once ROOT_DIR . "views/client/footer.php" 
?>