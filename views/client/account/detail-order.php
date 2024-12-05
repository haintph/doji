<?php
include_once ROOT_DIR . "views/client/header.php"
?>
<style>
    .status-label {
        display: inline-block;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        text-align: center;
        color: white;
        min-width: 100px;
        /* Giúp đảm bảo kích thước đồng đều */
    }

    .status-pending {
        background-color: orange;
        /* Màu vàng */
        color: #212529;
        /* Màu chữ đậm hơn để dễ nhìn */
    }

    .status-processing {
        background-color: blue;
        /* Màu xanh lam */
    }
    .status-info{
        background-color: aqua;
    }

    .status-completed {
        background-color: green;
        /* Màu xanh lá */
    }

    .status-cancelled {
        background-color: red;
        /* Màu đỏ */
    }

    .status-unknown {
        background-color: gray;
        /* Màu xám */
    }

    /* Đặt màu chữ mặc định cho nút */
    .btn-danger {
        color: white;
        /* Màu chữ trắng mặc định */
    }

    /* Đặt màu chữ khi hover */
    .btn-danger:hover {
        color: white;
        /* Màu chữ trắng khi hover */
        text-decoration: none;
        /* Loại bỏ gạch chân khi hover */
    }
</style>
<div class="container mt-5">
    <h3 class="text-center text-primary mb-4">Chi tiết đơn hàng</h3>

    <!-- Thông tin khách hàng -->
    <div class="mb-4">
        <h5><i class="fas fa-user"></i> Thông tin khách hàng</h5>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p><strong>Họ tên: </strong><?= htmlspecialchars($order['username']) ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p><strong>Email: </strong><a href="mailto:<?= htmlspecialchars($order['email']) ?>"><?= htmlspecialchars($order['email']) ?></a></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p><strong>Điện thoại: </strong><a href="tel:<?= htmlspecialchars($order['phone']) ?>"><?= htmlspecialchars($order['phone']) ?></a></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p><strong>Địa chỉ: </strong><?= htmlspecialchars($order['address']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thông tin đơn hàng -->
    <div class="mb-4">
        <h5><i class="fas fa-shopping-cart"></i> Thông tin đơn hàng</h5>
        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Mã đơn hàng: </strong><?= htmlspecialchars($order['id']) ?></p>
                <p><strong>Ngày mua: </strong><?= date('d/m/Y', strtotime($order['created_at'])) ?></p>
                <p><strong>Phương thức thanh toán: </strong><?= htmlspecialchars($order['payment_method']) ?></p>
                <p><strong>Trạng thái đơn hàng: </strong><?= getStatusOrderUser($order['status']) ?></p>
                <p><strong>Tổng tiền: </strong><span class="text-danger"><?= number_format($order['total_price'], 0, ',', '.') ?> VND</span></p>
            </div>
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="mb-4">
        <h5><i class="fas fa-box"></i> Sản phẩm trong đơn hàng</h5>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 0;
                    foreach ($order_details as $stt => $product): ?>
                        <tr>
                            <td><?= $stt++ ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><img src="<?= ROOT_URL . 'images/' . $product['img_product'] ?>" width="100" alt=""></td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= number_format($product['price'], 0, ',', '.') ?> VND</td>
                            <td><?= number_format($product['quantity'] * $product['price'], 0, ',', '.') ?> VND</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

    <!-- Action (buttons) -->
    <div class="d-flex justify-content-between mb-4">
        <!-- Nút Quay lại trang chủ bên trái -->
        <a href="<?= ROOT_URL . '?ctl=list-order' ?>" class="btn btn-secondary">Danh sách đơn hàng</a>

        <?php if ($order['status'] == 1) : ?>
            <form action="" method="post">
                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy đơn hàng</button>
            </form>
        <?php endif ?>
    </div>

</div>


<?php
include_once ROOT_DIR . "views/client/footer.php"
?>