<?php
require_once __DIR__ . "../env.php";
require_once __DIR__ . "/common/function.php";

//Model
require_once __DIR__ . "/models/BaseModel.php";
require_once __DIR__ . "/models/Category.php";
require_once __DIR__ . "/models/Comment.php";
require_once __DIR__ . "/models/Product.php";
require_once __DIR__ . "/models/ProductVariant.php";
require_once __DIR__ . "/models/Order.php";

//Controller
require_once __DIR__ . "/controllers/HomeController.php";
require_once __DIR__ . "/controllers/client/ClientCategoryController.php";
require_once __DIR__ . "/controllers/client/AboutController.php";
require_once __DIR__ . "/controllers/client/ContactController.php";
require_once __DIR__ . "/controllers/client/BlogController.php";
require_once __DIR__ . "/controllers/client/AccountController.php";
require_once __DIR__ . "/controllers/client/ProductController.php";
require_once __DIR__ . "/controllers/client/CommentController.php";
require_once __DIR__ . "/controllers/client/CartController.php";
require_once __DIR__ . "/controllers/client/OrderController.php";
require_once __DIR__ . "/controllers/client/SearchController.php";


$ctl = $_GET['ctl'] ?? '';

match ($ctl) {
    '', 'home'       => (new HomeController)->index(),
    'category'       => (new ProductController)->list(),
    'about'          => (new AboutController)->index(),
    'shop'           => (new ProductController)->index(),
    'details'        => (new ProductController)->detail(),
    'contact'        => (new ContactController)->index(),
    'blog'           => (new BlogController)->index(),
    'my-account'     => (new AccountController)->MyAccount(),
    'sign-in'        => (new AccountController)->login(),
    'sign-up'        => (new AccountController)->SignUp(),
    "createComment"  => (new CommentController)->createComment(),
    "logout"         => (new AccountController)->logout(),
    "editProfile"    => (new AccountController)->editProfile(),
    //cart
    'add-cart'     => (new CartController)->addToCart(),
    'view-cart'    => (new CartController)->viewCart(),
    'delete-cart'  => (new CartController)->deleteProductCart(),
    'update-cart'  => (new CartController)->updateCart(),
    'view-checkout'=> (new CartController)->viewCheckOut(),
    'checkout'     => (new CartController)->checkOut(),
    'success'      => (new CartController)->success(), 
    'list-order'   =>(new OrderController)->showOrderUser(),
    'detail-order' =>(new OrderController)->detailOrderUser(),

    //Search
    'search'       =>(new SearchController)->search(),

    default          => view("errors.404"),
};
