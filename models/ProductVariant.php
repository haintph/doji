<?php
class ProductVariant extends BaseModel
{
    /**
     * Trong bảng product_variants:
     * - `product_id`: liên kết tới bảng `products`
     * - `sku`: mã định danh duy nhất của biến thể
     * - `price`: giá của biến thể
     * - `stock_quantity`: số lượng tồn kho
     */

    // Lấy ra tất cả các biến thể
    public function all()
    {
        $sql = "SELECT pv.*, p.product_name 
                FROM product_variants pv 
                JOIN products p ON pv.product_id = p.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy các biến thể theo product_id
    public function findByProductId($productId)
    {
        $sql = "SELECT * FROM product_variants WHERE product_id = :product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['product_id' => $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm mới biến thể
    public function create($data)
    {
        $sql = "INSERT INTO product_variants (product_id, sku, price, stock_quantity, created_at, updated_at) 
                VALUES (:product_id, :sku, :price, :stock_quantity, NOW(), NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId(); // Trả về ID của biến thể vừa được thêm
    }

    // Cập nhật thông tin biến thể
    public function update($id, $data)
    {
        $sql = "UPDATE product_variants 
                SET 
                    sku = :sku,
                    price = :price,
                    stock_quantity = :stock_quantity,
                    updated_at = NOW()
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;
        $stmt->execute($data);
    }

    // Xóa biến thể
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM product_variants WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Lấy thông tin một biến thể theo id
    public function find($id)
    {
        $sql = "SELECT * FROM product_variants WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
