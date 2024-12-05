<?php
include_once ROOT_DIR . "views/client/header.php";
$username = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$message = $username ? '' : 'Bạn cần đăng nhập để truy cập trang này.';
?>
<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                        </ul>
                        <h1 class="title">Explore All Products</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <!-- <div class="axil-dashboard-author">
                    <div class="media">
                        <div class="thumbnail">
                            <img src="assets/images/product/author1.png" alt="Hello Annie">
                        </div>
                        <div class="media-body">
                            <h5 class="title mb-0"><?= $user['username'] ?></h5>
                            <span class="joining-date">eTrade Member Since Sep 2020</span>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true">
                                        <i class="fas fa-th-large"></i>Dashboard
                                    </a>
                                    
                                    <a class="nav-item nav-link" href="<?= ROOT_URL . '?ctl=list-order' ?>">
                                        <i class="fal fa-sign-out"></i>Order
                                    </a>
                                    <a class="nav-item nav-link" href="?ctl=logout">
                                        <i class="fal fa-sign-out"></i>Logout
                                    </a>
                                </div>
                            </nav>
                        </aside>
                    </div>

                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">
                            <!-- Trang Dashboard -->
                            <div class="container mt-5">
                                <div class="axil-dashboard-overview card shadow-sm p-4">
                                    <!-- Alert Message -->
                                    <?php if ($message): ?>
                                        <div class="alert alert-warning">
                                            <?php echo $message; ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="welcome-text mb-4">
                                            <h4>Hello, <?php echo htmlspecialchars( $user['username']); ?>!</h4>
                                            <p>
                                                Not <strong><?php echo htmlspecialchars( $user['username']); ?></strong>?
                                                <a href="?ctl=logout" class="text-danger">Log Out</a>
                                            </p>
                                        </div>
                                    <?php endif; ?>

                                    <p>
                                        From your account dashboard, you can view your recent orders, manage your shipping and billing addresses, and edit your profile details.
                                    </p>
                                    <form action="?ctl=editProfile" method="POST" enctype="multipart/form-data" class="mt-4">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="username"
                                                name="username"
                                                value="<?php echo htmlspecialchars($user['username']); ?>"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input
                                            
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                value="<?php echo htmlspecialchars($user['email']); ?>"
                                                required />
                                        </div>
                                        <div class="mb-3 none" style="display: none;">
                                            <label for="role" class="form-label">role Address</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="role"
                                                name="role"
                                                value="<?php echo htmlspecialchars($user['role']); ?>"
                                                required />
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <!-- Các tab khác như Orders, Downloads, Address, Account Details -->
                            <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">#6523</th>
                                                    <td>September 10, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$326.63 for 3 items</td>
                                                    <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                </tr>
                                                <!-- Các đơn hàng khác... -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <p>You don't have any downloads</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-address" role="tabpanel">
                                <div class="axil-dashboard-address">
                                    <p class="notice-text">The following addresses will be used on the checkout page by default.</p>
                                    <!-- Các địa chỉ người dùng -->
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                <div class="axil-dashboard-account">
                                    <form class="account-details-form">
                                        <!-- Các trường thay đổi thông tin tài khoản và mật khẩu -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->

    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
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