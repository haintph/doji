<?php

require_once __DIR__ . "/../env.php";
require_once __DIR__ . "/../middleware.php";
require_once __DIR__ . "/../common/function.php";
//include model
require_once __DIR__ . "/../models/BaseModel.php";
require_once __DIR__ . "/../models/Category.php";
require_once __DIR__ . "/../models/Product.php";
require_once __DIR__ . "/../models/ProductVariant.php";
require_once __DIR__ . "/../models/Order.php";
require_once __DIR__ . "/../models/Statistical.php";
//include controller
require_once __DIR__ . "/../controllers/DashboardController.php";
require_once __DIR__ . "/../controllers/admin/AdminProductController.php";
require_once __DIR__ . "/../controllers/admin/AdminCategoryController.php";
require_once __DIR__ . "/../controllers/admin/AdminUserController.php";
require_once __DIR__ . "/../controllers/admin/ProductVariantController.php";
require_once __DIR__ . "/../controllers/admin/OrderController.php";
require_once __DIR__ . "/../controllers/admin/AdminCommentController.php";

$ctl = $_GET['ctl'] ?? "";
// checkAdmin();
match ($ctl) {
    "" => (new DashboardController)->index(),

    //product
    "listsp"    => (new AdminProductController)->index(),
    "addsp"     => (new AdminProductController)->create(),
    'storesp'   => (new AdminProductController)->store(),
    "editsp"    => (new AdminProductController)->edit(),
    "updatesp"  => (new AdminProductController)->update(),
    'deletesp'  => (new AdminProductController)->delete(),
    //category
    "listcate"   => (new AdminCategoryController)->index(),
    "addcate"    => (new AdminCategoryController)->create(),
    "storecate"  => (new AdminCategoryController)->store(),
    "editcate"   => (new AdminCategoryController)->edit(),
    "updatecate" => (new AdminCategoryController)->update(),
    "deletecate" => (new AdminCategoryController)->delete(),
    //productVariant
    "listpv"        => (new ProductVariantController)->index(),
    "addvariant"    => (new ProductVariantController)->create(),
    "storevariant"  => (new ProductVariantController)->store(),
    //user
    "listuser"  => (new AdminUserController)->index(),
    // "edit"      => (new AdminUserController)->formEdit(),
    "updateuser" => (new AdminUserController)->updateActive(),
    //order
    "list-order" => (new OrderController)->index(),
    "detail-order" => (new OrderController)->show(),

    //comments
    "list-comments" => (new AdminCommentController)->index(),
    "delete-comment" => (new AdminCommentController)->delete(),
    "editComment"  => (new AdminCommentController)->formEdit(),
    "commentEdit"  => (new AdminCommentController)->update(),


    default => view("errors.404"),
};
