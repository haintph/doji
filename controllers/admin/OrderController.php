<?php
class OrderController
{
    public function index()
    {
        $orders = (new Order)->all();
        return view('admin.order.list', compact('orders'));
    }
    public function show()
    {
        $id = $_GET['id'];
        //Thay doi trang thai
        $message = "";
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $status = $_POST['status'];
            (new Order)->updateStatus($id, $status);
            $message = "Cập nhật trạng thái đơn hàng thành công";
        }
        $order = (new Order)->find($id);

        $order_details = (new Order)->listOrderDetail($id);

        $status = (new Order)->status_detail;
        return view("admin.order.detail", compact('order', 'order_details', 'status','message'));
    }
}
