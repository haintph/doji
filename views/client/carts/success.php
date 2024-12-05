<?php include_once ROOT_DIR . "views/client/header.php" ?>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="alert alert-success py-5">
                    <h1 class="display-4"><i class="bi bi-check-circle-fill text-success"></i> Đặt Hàng Thành Công!</h1>
                    <p class="lead mt-3">Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.</p>
                </div>
                <div class="mt-4">
                    <a href="<?= ROOT_URL ?>" class="btn btn-primary btn-lg">
                        <i class="bi bi-house"></i> Về Trang Chủ
                    </a>
                    <a href="<?= ROOT_URL . '?ctl=shop' ?>" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-cart"></i> Tiếp Tục Mua Sắm
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>