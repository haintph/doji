<?php
class ProductController
{
    public function index()
    {
        $categories = (new Category)->list();
        $products = (new Product)->all();

        // Lấy biến thể cho mỗi sản phẩm
        foreach ($products as &$product) {
            $product['variants'] = (new ProductVariant)->findByProductId($product['id']);
        }

        return view('client.products.shop', compact('products', 'categories'));
    }

    public function list()
    {
        $id = $_GET['id'];
        $products = (new Product)->listProductInCategory($id);
        $category = (new Category)->find($id);
        $title = (new Category)->show($id);
        $title = $title['category_name'];
        $categories = (new Category)->list();

        return view(
            'client.products.category_list',
            compact('products', 'title', 'categories')
        );
    }

    public function detail()
    {
        $id = $_GET['id'];
        $product = (new Product)->find($id);
        $title = $product['product_name'] ?? '';
        $categories = (new Category)->list();

        // Lấy thông tin tên danh mục
        $category = (new Category)->show($id);
        $category_name = $category ? $category['category_name'] : '';

        //Danh sach san pham lien quan
        $productReleads = (new Product)->listProductReled($product['category_id'],$id);

        // Lấy thông tin người dùng từ $_SESSION
        $user = $_SESSION['user'] ?? null;

        $commentListByProducts = (new Comment)->getCommentsByProductId($id);
        if (!$commentListByProducts) {
            $commentListByProducts = [];
        }

        $product['variants'] = (new ProductVariant)->findByProductId($id);
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        // Tính tổng
        $_SESSION['totalQuantity'] = (new CartController)->totalSumQuantity();

        return view(
            'client.products.details',
            compact('product', 'title', 'categories', 'commentListByProducts', 'user', 'category_name','productReleads')
        );
    }
    

}
