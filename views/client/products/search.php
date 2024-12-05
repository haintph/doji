<?php
include_once ROOT_DIR . "views/client/header.php"
?>

<div class="row row--15">
    <h2>Tu khoa tim kiem : <?= $keyword ?></h2>
    <?php if ($products) : ?>
        <?php foreach ($products as $pro): ?>
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
                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                <li class="quickview"><a href="#" data-bs-toggle="modal"><i
                                            class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <div class="inner">
                            <h5 class="title">
                                <a href="<?= ROOT_URL . '?ctl=details&id=' . $pro['id'] ?>"><?= $pro['product_name'] ?></a>
                            </h5>
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
        <?php endforeach; ?>
    <?php else : ?>
        <div>
            <h4>Khong tim thay san pham</h4>
        </div>
    <?php endif ?>
</div>

<?php
include_once ROOT_DIR . "views/client/footer.php"
?>