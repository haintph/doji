<?php
class Statistical extends BaseModel
{
    public function total_orders()
    {
        $sql = "SELECT COUNT(*) AS total_orders FROM orders";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function total_users()
    {
        $sql = "SELECT COUNT(*) AS total_users FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function total_price()
    {
        $sql = "SELECT SUM(total_price) AS total_price
        FROM orders
        WHERE status = 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
