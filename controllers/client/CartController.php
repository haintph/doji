<?php
class CartController
{
    //Them vao gio hang
    public function addToCart()
    {

        //Tao 1 gio hang
        $carts = $_SESSION['cart'] ?? [];
        //lay san pham theo id de add vao gio
        $id = $_GET['id'];
        $product = (new Product)->find($id);

        if (isset($carts[$id])) {
            $carts[$id]['quantity'] += 1;
        } else {
            $carts[$id] = [
                'product_name' => $product['product_name'],
                'img_product' => $product['img_product'],
                'price' => $product['price'],
                'quantity' => 1,
            ];
        }
        //Luu gio hang vao session 
        $_SESSION['cart'] = $carts;
        
        $url = $_SESSION['URI'];
        return header("Location:" . $url);
    }
    //Tinh tổng số lượng sản phẩm để hiển thị giỏ hàng
    public function totalSumQuantity()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'];
        }
        return $total;
    }
    //view cart
    public function viewCart()
    {
        $categories = (new Category)->list();
        $sumPrice = (new CartController)->sumPrice();
        $carts = $_SESSION['cart'] ?? [];
        return view(
            "client.carts.cart",
            compact('carts', 'categories', 'sumPrice')
        );
    }
    public function sumPrice()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'] * $cart['price'];
        }
        return $total;
    }
    //Xoa san pham trong gio hang
    public function deleteProductCart()
    {
        //Lay id san pham
        $id = $_GET['id'];
        //Huy bien session chua san pham
        unset($_SESSION['cart'][$id]);
        //Chuyen huong vef gio hang
        $_SESSION['totalQuantity'] = (new CartController)->totalSumQuantity();
        return header("Location:" . ROOT_URL . '?ctl=view-cart');
    }
    public function updateCart()
    {
        $quantity = $_POST['quantity'];
        //Cap nhat so luong 
        foreach ($quantity as $id => $qty) {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
        return header("Location:" . ROOT_URL . "?ctl=view-cart");
    }
    //Hien thi thong tin thanh toan
    public function viewCheckOut()
    {
        $categories = (new Category)->list();
        //kiem tra ngdung dangnhap chua, chưa thì nhảy vào login
        if (!isset($_SESSION['user'])) {
            return header("Location: " . ROOT_URL . '?ctl=sign-in');
        }

        $user = $_SESSION['user'];
        $carts = $_SESSION['cart'];
        $sumPrice = (new CartController)->sumPrice();

        return view("client.carts.checkout", compact('user', 'carts', 'sumPrice','categories'));
    }
    //Thanh toan
    public function checkOut()
    {
        //Lay thong tin nguoi dung
        $user = [
            'id' => $_POST['id'],
            'username' => $_POST['username'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'role' => $_SESSION['user']['role'],
            'active' => $_SESSION['user']['active'],
        ];
        $sumPrice = (new CartController)->sumPrice();
        //Lay ra thong tin thanh toan
        $order = [
            'user_id' => $_POST['id'],
            'status' => 1,
            'payment_method' => $_POST['payment_method'],
            'total_price' => $sumPrice,
        ];
        (new AuthModel)->update($user['id'], $user);
        $order_id = (new Order)->create($order);
        
        $carts = $_SESSION['cart'];
        foreach ($carts as $id => $cart) {
            $or_detail = [
                'order_id' => $order_id,
                'product_id' => $id,
                'price' => $cart['price'],
                'quantity' => $cart['quantity'],

            ];
            (new Order)->createOrderDetail($or_detail);
        }
        $this->clearCart();//xoa thong tin gio hang
       return header("Location:" . ROOT_URL . '?ctl=success' );
    }
    //Xoa gio hang
    public function clearCart()
    {
        unset($_SESSION['cart']);
        unset($_SESSION['totalQuantity']);
        unset($_SESSION['URI']);
    }
    public function success(){
        return view('client.carts.success');
    }
    //list order
    public function listOrder(){
        return view('client.account.list-order');
    }
}
