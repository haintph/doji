<?php
include_once ROOT_DIR . "views/admin/header.php"
?>

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Order
                    <div class="page-title-subheading">
                        View,update
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <!-- <a href="<?= ADMIN_URL . '?ctl=addsp' ?>"
                    class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Create
                </a> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">

                <div class="card-header">
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="btn btn-focus">This week</button>
                            <button class="active btn btn-focus">Anytime</button>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['message'])) {
                    echo "<div class='alert alert-success'>{$_SESSION['message']}</div>";
                    unset($_SESSION['message']); // Xóa session để tránh hiển thị lại
                }
                ?>

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>HỌ VÀ TÊN</th>
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>PHƯƠNG THỨC THANH TOÁN</th>
                                <th>TRANG THÁI </th>
                                <th>TỔNG TIỀN</th>
                                <th>NGÀY MUA</th>

                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php foreach ($orders  as $order): ?>
                                <tr>
                                    <td class="text-center text-muted"><?= $order['id'] ?></td>
                                    <td class="text-muted"><?= $order['username'] ?></td>
                                    <td class="text-muted"><?= $order['phone'] ?></td>
                                    <td class="text-muted"><?= $order['payment_method'] ?></td>
                                    <td class="text-muted"><?= getStatusOrder($order['status']) ?></td>
                                    <td class="text-muted"><?= number_format($order['total_price'])  ?>VND</td>
                                    <td class="text-muted"><?= $order['created_at'] ?></td>

                                    <td class="text-center">
                                        <a href="<?= ADMIN_URL . '?ctl=detail-order&id=' . $order['id'] ?>" class="btn btn-warning text-white">Cập nhật</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>

                <div class="d-block card-footer">
                    <nav role="navigation" aria-label="Pagination Navigation"
                        class="flex items-center justify-between">
                        <div class="flex justify-between flex-1 sm:hidden">
                            <span
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                « Previous
                            </span>

                            <a href="#page=2"
                                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                Next »
                            </a>
                        </div>

                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700 leading-5">
                                    Showing
                                    <span class="font-medium">1</span>
                                    to
                                    <span class="font-medium">5</span>
                                    of
                                    <span class="font-medium">9</span>
                                    results
                                </p>
                            </div>

                            <div>
                                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                    <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                                        <span
                                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5"
                                            aria-hidden="true">
                                            <svg class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>

                                    <span aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                                    </span>
                                    <a href="#page=2"
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                        aria-label="Go to page 2">
                                        2
                                    </a>

                                    <a href="#page=2" rel="next"
                                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                                        aria-label="Next &amp;raquo;">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
include_once ROOT_DIR . "views/admin/footer.php"
?>