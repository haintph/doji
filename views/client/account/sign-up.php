<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2024 12:17:53 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Doji || Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= ROOT_URL . 'views/client/assets/images/logo/1.png' ?>">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
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
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="<?= ROOT_URL ?>" class="site-logo"><img src="<?= ROOT_URL . 'views/client/assets/images/logo/logo.webp' ?>" width="160px" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Not a member?</p>
                        <a href="?ctl=sign-in" class="axil-btn btn-bg-secondary sign-up-btn">Sign In Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--9">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">I'm New Here</h3>
                        <p class="b2 mb--55">Enter your detail below</p>
                        <?php if (isset($_SESSION['message'])): ?>
                            <div class="alert alert-info">
                                <?php echo htmlspecialchars($_SESSION['message']); ?>
                            </div>
                            <?php unset($_SESSION['message']);
                            ?>
                        <?php endif; ?>
                        <form class="singin-form" action="?ctl=sign-up" method="POST">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="username" placeholder="anniemario">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="annie@example.com">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="123456789">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/modernizr.min.js' ?>"></script>
    <!-- jQuery JS -->
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/jquery.js' ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/popper.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/bootstrap.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/slick.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/js.cookie.js' ?>"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/jquery-ui.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/jquery.ui.touch-punch.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/jquery.countdown.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/sal.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/jquery.magnific-popup.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/imagesloaded.pkgd.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/isotope.pkgd.min.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/counterup.js' ?>"></script>
    <script src="<?= ROOT_URL . 'views/client/assets/js/vendor/waypoints.min.js' ?>"></script>

    <!-- Main JS -->
    <script src="<?= ROOT_URL . 'views/client/assets/js/main.js' ?>"></script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2024 12:17:53 GMT -->

</html>