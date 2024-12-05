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
</style>
<div class="container my-5">
<div class="mb-4">
    <h5 class="text-primary"><i class="fas fa-user"></i> Thông tin khách hàng</h5>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p><strong>Họ tên: </strong><?= $user['username'] ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <p><strong>Email: </strong><?= $user['email'] ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <p><strong>Điện thoại: </strong><?= $user['phone'] ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <p><strong>Địa chỉ: </strong><?= $user['address'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <h2 class="mb-4">Danh Sách Đơn Hàng</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Phương Thức Thanh Toán</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Tổng Tiền</th>
                <th scope="col">Ngày Mua</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Lặp qua danh sách đơn hàng -->
            <?php foreach ($orders as $index => $order): ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td>
                        <?= htmlspecialchars($order['payment_method']) ?>
                    </td>
                    <td class="text-primary">
                        <?= getStatusOrderUser($order['status']) ?>
                    </td>
                    <td>
                        <?= number_format($order['total_price'], 0, ',', '.') ?> VNĐ
                    </td>
                    <td>
                        <?= date('d-m-Y', strtotime($order['created_at'])) ?>
                    </td>
                    <td>
                        <a href="?ctl=detail-order&id=<?= $order['id'] ?>" class="btn btn-primary">Chi Tiết</a>
                       
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Hiển thị thông báo khi không có đơn hàng -->
    <?php if (empty($orders)): ?>
        <div class="alert alert-warning text-center mt-4">
            Hiện tại bạn chưa có đơn hàng nào.
        </div>
    <?php endif; ?>
</div>

<?php
include_once ROOT_DIR . "views/client/footer.php"
?>