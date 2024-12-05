<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin - Doji</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description"
        content="This is an example dashboard (CodeLean) created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pe-icon-7-stroke/1.2.0/pe-icon-7-stroke.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="<?= ROOT_URL . 'views/admin/assets/dist/metisMenu.min.css'?>" rel="stylesheet">
    <link href="<?= ROOT_URL . 'views/admin/assets/dist/pe-icon-7-stroke.css'?>" rel="stylesheet">
    <link href="<?= ROOT_URL . 'views/admin/assets/css/my_style.css'?>" rel="stylesheet">
    <link href="<?= ROOT_URL . 'views/admin/assets/css/main.css'?>" rel="stylesheet">
</head>
<style>
    /* Thiết lập kiểu dáng cho menu */
    .menu-left {
        background-color: white;
        /* Nền trắng */
        width: 200px;
        padding: 20px;
        border-radius: 5px;
    }

    .menu-left ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .menu-left ul li {
        margin: 10px 0;
    }

    .menu-left ul li a {
        color: black;
        /* Chữ màu đen */
        text-decoration: none;
        display: block;
        padding: 10px;
        border-radius: 3px;
        background-color: white;
        /* Nền trắng mặc định */
    }

    .menu-left ul li a:hover {
        background-color: #f0f0f0;
        /* Màu nền khi hover */
    }

    /* Trạng thái active */
    .menu-left ul li.active a {
        background-color: #a6c8ff;
        /* Màu nền xanh dương nhạt */
        color: black;
        /* Chữ màu đen */
    }
</style>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div >
                    <a href="<?= ADMIN_URL ?>"><img src="/../duan1/views/admin/assets/images/logo.webp" style="padding-left:10px" width="140px"  alt=""></a>
                </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>

                </div>
                <div class="app-header-right">


                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src=""
                                                alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2"
                                                        style="background-image: url('assets/images/dropdown-header/city3.jpg');">
                                                    </div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading"></div>
                                                                    <div class="widget-subheading opacity-8">A short
                                                                        profile description</div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <a href="<?= ROOT_URL . '?ctl=logout' ?>"
                                                                        class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-area-xs" style="height: 150px;">
                                                <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">Activity</li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Chat
                                                                <div class="ml-auto badge badge-pill badge-info">8</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Recover
                                                                Password</a>
                                                        </li>
                                                        <li class="nav-item-header nav-item">My Account
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Settings
                                                                <div class="ml-auto badge badge-success">New</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Messages
                                                                <div class="ml-auto badge badge-warning">512</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Logs</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider mb-0 nav-item"></li>
                                            </ul>
                                            <div class="grid-menu grid-menu-2col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6">
                                                        <button
                                                            class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                            <i
                                                                class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i>
                                                            Message Inbox
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button
                                                            class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                            <i
                                                                class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                            <b>Support Tickets</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item">
                                                </li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button class="btn-wide btn btn-primary btn-sm"> Open Messages
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading"> <h5>Xin chào: <?= $_SESSION['user']['username'] ?></h5></div>
                                    <div class="widget-subheading"></div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button"
                                        class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-btn-lg">
                        <button type="button" class="hamburger hamburger--elastic open-right-drawer">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

      

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <h2>MENU</h2>
                        <nav class="menu-left">
                            <ul>
                                <?php
                                $current_url = $_SERVER['REQUEST_URI']; // Lấy toàn bộ URL (bao gồm cả query string)
                                ?>

                                <!-- Mục Home -->
                                <li><a href="<?= ADMIN_URL ?>" class="menu-item <?= ($current_url == ADMIN_URL) ? 'active' : '' ?>">Home</a></li>

                                <!-- Mục Product -->
                                <li><a href="<?= ADMIN_URL . '?ctl=listsp' ?>" class="menu-item <?= ($current_url == ADMIN_URL . '?ctl=listsp') ? 'active' : '' ?>">Products</a></li>

                                <li><a href="<?= ADMIN_URL . '?ctl=listcate' ?>" class="menu-item <?= ($current_url == ADMIN_URL . '?ctl=listcate') ? 'active' : '' ?>">Categories</a></li>

                                <li><a href="<?= ADMIN_URL . '?ctl=listuser' ?>" class="menu-item <?= ($current_url == ADMIN_URL . '?ctl=listuser') ? 'active' : '' ?>">Users</a></li>

                                <li><a href="<?= ADMIN_URL . '?ctl=list-order' ?>" class="menu-item <?= ($current_url == ADMIN_URL . '?ctl=list-order') ? 'active' : '' ?>">Orders</a></li>
                                <li><a href="<?= ADMIN_URL . '?ctl=list-comments' ?>" class="menu-item <?= ($current_url == ADMIN_URL . '?ctl=list-comments') ? 'active' : '' ?>">Comments</a></li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const menuItems = document.querySelectorAll('.menu-item');
                    const currentUrl = window.location.href;

                    menuItems.forEach(item => {
                        const linkUrl = item.getAttribute('href');

                        // So sánh chính xác URL của mục menu với URL hiện tại
                        if (currentUrl === linkUrl) {
                            item.parentElement.classList.add('active');
                        } else {
                            item.parentElement.classList.remove('active');
                        }
                    });
                });
            </script>
            <div class="app-main__outer">