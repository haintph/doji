<?php
class OrderController
{
    public function showOrderUser()
    {
        $user_id = $_SESSION['user']['id'];
        $orders = (new Order)->findOrderUser($user_id);
        $categories = (new Category)->list();
        $user = $_SESSION['user'];
        return view('client.account.list-order', compact('orders', 'categories', 'user'));
    }
    public function detailOrderUser()
    {
        $id = $_GET['id'];
        //Thay doi trang thai
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            (new Order)->updateStatus($id, 4);
        }
        $categories = (new Category)->list();

        $order = (new Order)->find($id);

        $order_details = (new Order)->listOrderDetail($id);

        $status = (new Order)->status_detail;
        return view("client.account.detail-order", compact('order', 'order_details', 'status','categories'));
    }
}
