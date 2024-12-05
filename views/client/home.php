<?php
include_once ROOT_DIR . "views/client/header.php"
?>
<main class="main-wrapper">

    <!-- Start Slider Area -->
    <div class="axil-main-slider-area main-slider-style-7 bg_image--8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <div class="main-slider-content">
                        <span class="subtitle"><i class="fas fa-fire"></i> Ưu đãi hấp dẫn tại Doji</span>
                        <h1 class="title">Bộ sưu tập thiết kế độc quyền</h1>
                        <p>Dòng sản phẩm giản dị với thiết kế ngắn bằng da lộn 100% Doji</p>
                        <div class="shop-btn">
                            <a href="<?= ROOT_URL . '?ctl=shop' ?>" class="axil-btn btn-bg-secondary right-icon">Xem ngay <i
                                    class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Axil Product Poster Area  -->
    <div class="axil-poster axil-section-gap pb--0">
        <div class="container">
            <div class="row g-lg-5 g-4">
                <div class="col-lg-6">
                    <div class="single-poster">
                        <a href="<?= ROOT_URL . '?ctl=shop' ?>">
                            <img src="<?= ROOT_URL . 'views/client/assets/images/product/poster/poster-08.png' ?>" alt="eTrade promotion poster">
                            <div class="poster-content">
                                <div class="inner">
                                    <h3 class="title">Chất lượng <br> cao cấp.</h3>
                                    <span class="sub-title">Bộ sưu tập <i
                                            class="fal fa-long-arrow-right"></i></span>
                                </div>
                            </div>
                            <!-- End .poster-content -->
                        </a>
                    </div>
                    <!-- End .single-poster -->
                </div>
                <div class="col-lg-6">
                    <div class="single-poster">
                        <a href="<?= ROOT_URL  ?>">
                            <img src="<?= ROOT_URL . 'views/client/assets/images/product/poster/poster-09.png' ?>" alt="eTrade promotion poster">
                            <div class="poster-content content-left">
                                <div class="inner">
                                    <span class="sub-title">Khuyến mãi 50% vào mùa đông</span>
                                    <h3 class="title">Xem ngay tại <br>Doji</h3>
                                </div>
                            </div>
                            <!-- End .poster-content -->
                        </a>
                    </div>
                    <!-- End .single-poster -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Axil Product Poster Area  -->

    <!-- Start New Arrivals Product Area  -->
    <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
        <div class="container ml--xxl-0">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> Tuần
                        này</span>
                    <h2 class="title">Hàng mới về</h2>
                </div>
                <div
                    class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <?php foreach ($newProducts as $pro): ?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="<?= ROOT_URL . '?ctl=details&id=' . $pro['id'] ?>">
                                        <img data-sal-delay="100" data-sal-duration="1500"
                                            src="<?= ROOT_URL . 'images/' . $pro['img_product'] ?>" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">New</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i
                                                        class="far fa-heart"></i></a></li>
                                            <li class="select-option"><a href="<?= ROOT_URL . '?ctl=details&id=' . $pro['id'] ?>">Xem chi tiết</a></li>
                                            <li class="quickview"><a href="" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html"><?= $pro['product_name'] ?></a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price"><?= number_format($pro['price']) ?> VNĐ</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End New Arrivals Product Area  -->

    <!-- Start Best Sellers Product Area  -->

    <!-- End  Best Sellers Product Area  -->

    <!-- Start Categorie Area  -->
    <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i>
                    Danh mục</span>
                <h2 class="title">Các loại mặt hàng </h2>
            </div>
            <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                <?php foreach ($categories as $cate): ?>
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal-delay="200" data-sal-duration="500">
                            <a href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                <img class="img-fluid" src="<?= ROOT_URL . 'images/' . $cate['img_category'] ?>"
                                    alt="product categorie">
                                <h6 class="cat-title"><?= $cate['category_name'] ?></h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- End Categorie Area  -->

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--80">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> Sản phẩm</span>
                    <h2 class="title">Tất cả sản phẩm</h2>
                </div>
                <div class="row row--15">
                    <?php foreach ($products as $pro): ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="<?= ROOT_URL . '?ctl=details&id=' . $pro['id'] ?>">
                                        <img data-sal-delay="100" data-sal-duration="1500"
                                            src="<?php echo ROOT_URL . 'images/' . $pro['img_product'] ?>" alt="Product Images">
                                    </a>
                                    <!-- <div class="label-block label-right">
                                        <div class="product-badget">20% OFF</div>
                                    </div> -->
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i
                                                        class="far fa-heart"></i></a></li>
                                            <li class="select-option"><a href="<?= ROOT_URL . '?ctl=details&id=' . $pro['id'] ?>">Xem chi tiết</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html"><?= $pro['product_name'] ?></a></h5>
                                        <div class="product-price-variant">
										<span class="price current-price"><?= number_format($pro['price']) ?> VNĐ</span>
									</div>
									
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                    <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Expolre Product Area  -->

    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--11">
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


<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<? ROOT_URL .'views/client/assets/images/icons/service1.png' ?>" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Fast &amp; Secure Delivery</h6>
                        <p>Tell about your service.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?= ROOT_URL .'views/client/assets/images/icons/service2.png' ?>" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Money Back Guarantee</h6>
                        <p>Within 10 days.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?= ROOT_URL .'views/client/assets/images/icons/service3.png'?>" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">24 Hour Return Policy</h6>
                        <p>No question ask.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="<?= ROOT_URL .'views/client/assets/images/icons/service4.png'?>" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Pro Quality Support</h6>
                        <p>24/7 Live support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once ROOT_DIR . "views/client/footer.php"
?>