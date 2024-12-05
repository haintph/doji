<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2024 12:16:10 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?? '' ?> Doji</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= ROOT_URL . 'views/client/assets/images/logo/1.png' ?>">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/font-awesome.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/flaticon/flaticon.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/slick.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/slick-theme.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/jquery-ui.min.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/sal.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/magnific-popup.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/vendor/base.css' ?>">
    <link rel="stylesheet" href="<?= ROOT_URL . 'views/client/assets/css/style.min.css' ?>">

</head>


<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <header class="header axil-header header-style-4">
        <div class="header-top-campaign">
            <div class="container position-relative">
                <div class="campaign-content">
                    <div class="campaign-countdown"></div>
                    <p>Mở cánh cửa đến với thế giới trang sức <a href="#">Nhận ưu đãi cửa bạn</a></p>
                </div>
            </div>
            <button class="remove-campaign"><i class="fal fa-times"></i></button>
        </div>
        <!-- Start Header Top Area  -->
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 col-12">
                    </div>
                    <div class="col-md-4 col-5">
                        <div class="header-brand">
                            <a href="<?= ROOT_URL ?>" class="logo logo-dark">
                                <img src="<?= ROOT_URL . 'views/client/assets/images/logo/logo.webp' ?>" width="150px" alt="Site Logo">
                            </a>
                            <a href="index.html" class="logo logo-light">
                                <img src="assets/images/logo/logo-light.png" alt="Site Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-7">
                        <div class="header-action">
                            <ul class="action-list">
                                <li class="axil-search">
                                    <a href="" class="header-search-icon" title="Search">
                                        <i class="flaticon-magnifying-glass"></i>
                                    </a>
                                </li>
                                <li class="shopping-cart">
                                    <a href="<?= ROOT_URL . '?ctl=view-cart' ?>">
                                        <i class="flaticon-shopping-cart"><?= $_SESSION['totalQuantity'] ?? '0'  ?></i>
                                    </a>
                                </li>
                                <li class="my-account">
                                    <a href="javascript:void(0)">
                                        <i class="flaticon-person"></i>
                                    </a>
                                    <div class="my-account-dropdown">
                                        <?php if (isset($_SESSION['user'])): ?>
                                            <h5>Xin chào: <?= $_SESSION['user']['username'] ?></h5>
                                        <?php endif; ?>
                                        <ul>
                                            <li>
                                                <a href="<?= ROOT_URL . '?ctl=my-account' ?>">My Account</a>
                                            </li>
                                            <li>
                                                <a href="#">Support</a>
                                            </li>
                                            <li>
                                                <a href="#">Language</a>
                                            </li>
                                        </ul>

                                        <?php if (isset($_SESSION['user'])): ?>
                                            <a href="<?= ROOT_URL . '?ctl=logout' ?>" class="axil-btn btn btn-danger">Log out</a>
                                        <?php else: ?>
                                            <a href="<?= ROOT_URL . '?ctl=sign-in' ?>" class="axil-btn btn-bg-primary">Login</a>
                                            <div class="reg-footer text-center">
                                                No account yet? <a href="<?= ROOT_URL . '?ctl=sign-up' ?>" class="btn-link">REGISTER HERE.</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <li class="axil-mobile-toggle">
                                    <button class="menu-btn mobile-nav-toggler">
                                        <i class="flaticon-menu-2"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area  -->

        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.html" class="logo">
                                    <img src="<?= ROOT_URL . 'views/client/assets/images/logo/logo.webp' ?>" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li>
                                    <a href="<?= ROOT_URL ?>">Trang chủ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?= ROOT_URL . '?ctl=shop' ?>">Cửa hàng</a>
                                    <ul class="axil-submenu">
                                        <?php foreach ($categories as $cate): ?>
                                            <li><a href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>"><?= $cate['category_name'] ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area  -->
    </header>