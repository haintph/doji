<?php include_once ROOT_DIR . "views/client/header.php" ?>

<main class="main-wrapper">

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">

                    <h4 class="title">Giỏ hàng của bạn</h4>
                    <a href="#" class="cart-clear">Clear Shoping Cart</a>
                </div>
                <form action="<?= ROOT_URL . '?ctl=update-cart' ?>" method="POST">
                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40">
                            <thead>
                                <tr>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-thumbnail">Ảnh sp</th>
                                    <th scope="col" class="product-title">Sản phẩm</th>
                                    <th scope="col" class="product-price">Giá </th>
                                    <th scope="col" class="product-quantity">Số lượng</th>

                                    <th scope="col" class="product-subtotal">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Cart -->
                                <?php foreach ($carts as $id => $cart) : ?>
                                    <tr>
                                        <td class="product-remove"><a href="<?= ROOT_URL . '?ctl=delete-cart&id=' . $id ?>" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                        <td class="product-thumbnail"><a href="single-product.html"><img src="<?= ROOT_URL . 'images/' . $cart['img_product'] ?>" alt="Digital Product"></a></td>
                                        <td class="product-title"><a href=""><?= $cart['product_name'] ?></a></td>
                                        <td class="product-price" data-title="Price"><span class="currency-symbol"></span><?= number_format($cart['price']) ?>VNĐ</td>
                                        <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                                <input type="number" name="quantity[<?= $id ?>]" class="quantity-input" min="1" value="<?= $cart['quantity'] ?>">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol"></span><?= number_format($cart['price'] * $cart['quantity']) ?>VNĐ</td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot class="cart-table-footer">
                    <tr>
                        <td colspan="5" class="text-end cart-total-label">Tổng tiền:</td>
                        <td colspan="2" class="cart-total-value fw-bold text-danger"><?= number_format($sumPrice) ?> VNĐ</td>
                    </tr>
                </tfoot>
                        </table>
                    </div>
                    <div class="cart-update-btn-area">
                        <!-- <div class="input-group product-cupon">
                            <input placeholder="Enter coupon code" type="text">
                            <div class="product-cupon-btn">
                                <button type="submit" class="axil-btn btn-outline">Apply</button>
                            </div>
                        </div> -->

                        <div class="update-btn">
                            <button type="submit" class="axil-btn btn-outline">Cập nhật sản phẩm</button>
                        </div>
                        <div class="update-btn">
                            <a href="<?= ROOT_URL . '?ctl=view-checkout' ?>" class="axil-btn btn-outline text-center">Thanh toán</a>
                        </div>
                       
                    </div>
                </form>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->

</main>


<?php include_once ROOT_DIR . "views/client/footer.php" ?>