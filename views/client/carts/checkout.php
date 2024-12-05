<?php include_once ROOT_DIR . "views/client/header.php" ?>

<main class="main-wrapper">

    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <form action="<?= ROOT_URL . '?ctl=checkout' ?>" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="axil-checkout-notice">

                            <div class="axil-toggle-box">
                                <div class="toggle-bar"><i class="fas fa-pencil"></i> Mã giảm giá <a href="javascript:void(0)" class="toggle-btn">Click để nhập mã <i class="fas fa-angle-down"></i></a>
                                </div>

                                <div class="axil-checkout-coupon toggle-open">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <div class="input-group">
                                        <input placeholder="Enter coupon code" type="text">
                                        <div class="apply-btn">
                                            <button type="submit" class="axil-btn btn-bg-primary">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Billing details</h4>
                           
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" name="username" value="<?= $user['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <span>*</span></label>
                                <input type="tel" name="phone" value="<?= $user['phone'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ <span>*</span></label>
                                <input type="text" name="address" value="<?= $user['address'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Email  <span>*</span></label>
                                <input type="email"  name="email" value="<?= $user['email'] ?>">
                            </div>
                           <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Đơn hàng của bạn</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($carts as $cart ) : ?>
                                        <tr class="order-product">
                                            
                                            <td><?= $cart['product_name'] ?><span class="quantity text-primary"> x <?= $cart['quantity'] ?></span></td>
                                            <td><?= number_format($cart['price'] * $cart['quantity']) ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                        <tr class="order-total">
                                            <td>Tổng tiền</td>
                                            <td class="order-total-amount "><?= number_format($sumPrice) ?></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" name="payment_method" value="cod" checked >
                                        <label class="form-check-label" for="cod">Thanh toán khi giao hàng (COD)</label>
                                    </div>
                                    <p>Thanh toán bằng tiền mặt khi nhận hàng</p>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group justify-content-between align-items-center">
                                        <input type="radio"   >
                                        <label for="">Thanh toán online</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Xác nhận thanh toán</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area  -->

</main>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>