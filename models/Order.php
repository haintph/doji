<?php
class Order extends BaseModel
{

    public
        $status_detail = [
            1 => 'Chờ xử lý',
            2 => 'Đang xử lý',
            3 => 'Hoàn thành',
            4 => 'Đã hủy'
        ];
    //tat ca hoa don
    public function all()
    {
        $sql = "SELECT o.*,username, email, address, phone FROM orders o JOIN users 
        u ON o.user_id = u.id ORDER BY o.id DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //chi tiet hoa don
    public function find($id)
    {
        $sql = "SELECT o.*, username, email, address, phone
        FROM orders o JOIN users u ON o.user_id=u.id   
        WHERE o.id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //DANH SACH SAN PHAM HOA DON
    public function listOrderDetail($id)
    {
        $sql = "SELECT od.*,product_name,img_product
        FROM order_detail od JOIN products p
        ON od.product_id = p.id
        WHERE od.order_id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Them hoa don
    public function create($data)
    {
        $sql = "INSERT INTO orders(user_id, status, payment_method, total_price) 
        VALUES(:user_id, :status, :payment_method, :total_price)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);

        return $this->conn->lastInsertId();
    }
    //Cap nhat trang thai
    public function updateStatus($id, $status)
    {
        $sql = "UPDATE orders SET status=:status WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id, 'status' => $status]);
    }
    //Them chi tiet don hang
    public function createOrderDetail($data)
    {
        $sql = "INSERT INTO order_detail(order_id, product_id,price,quantity)
        VALUES (:order_id ,:product_id, :price, :quantity)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    //Chi tiet hoa don theo user
    public function findOrderUser($user_id)
    {
        $sql = "SELECT o.*, username, email, address, phone
        FROM orders o JOIN users u ON o.user_id=u.id
        WHERE u.id=:user_id ORDER BY id DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
