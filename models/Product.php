<?php
class Product extends BaseModel
{
    /**
     * Trong bảng products có thuộc tinh status
     * giá trị 0 : Ngừng kinh doanh
     * Giá trị 1 : Đang kinh doanh
     */

    //Lấy ra tất cả các bản ghi
    // public function all()
    // {
    //     $sql = "SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id = c.id";
    //     //Chuẩn bị thực thi
    //     $stmt = $this->conn->prepare($sql);
    //     //Thực thi
    //     $stmt->execute();
    //     //Trả về dữ liệu lấy được
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    
    public function all()
    {
        $sql = "SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id=c.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function allAdmin()
    {
        $sql = "SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id=c.id ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //san pham moi nhat
    public function newProduct(){
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function countAll()
    {
        $sql = "SELECT COUNT(*) AS total FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function listProductInCategory($id)
    {
        $sql = "SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id=c.id WHERE c.id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Thêm mới sản phẩm 
    public function create($data)
    {
        $sql = "INSERT INTO products (category_id, product_name, img_product,price, description,quantity, status, brand) 
        VALUES (:category_id, :product_name, :img_product,:price, :description,:quantity, :status, :brand)";
        //Chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        // Thực thi câu lệnh SQL
        $stmt->execute($data);
    }
    public function update($id, $data)
    {
        $sql = "UPDATE products 
            SET 
                category_id = :category_id ,
                product_name = :product_name,
                img_product = :img_product,
                price=:price,
                description = :description,
                quantity = :quantity,
                status = :status,
                brand= :brand   
                WHERE id = :id
            ";

        $stmt = $this->conn->prepare($sql);
        //thêm id và mảng data
        $data['id'] = $id;
        $stmt->execute($data);
    }
    /**
     * function delete: xóa bản ghi
     * @id: mã sản phẩm cần xóa
     */
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    /**
     * function find: lấy ra 1 bản ghi theo id
     * @id: mã sản phẩm cần tìm
     */
    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //san pham lien quan
    public function listProductReled($category_id, $id)
    {
        $sql = "SELECT p.*, c.category_name 
            FROM products p 
            JOIN categories c ON p.category_id = c.id 
            WHERE c.id = :category_id 
            AND p.id <> :id 
            ORDER BY p.id DESC 
            LIMIT 6";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'category_id' => $category_id,
            'id' => $id,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //SELECT p.*, c.category_name: Lấy tất cả các trường từ bảng products và trường category_name từ bảng categories.
        //FROM products p JOIN categories c ON p.category_id = c.id: Kết hợp hai bảng dựa trên khóa ngoại category_id.
        //WHERE c.id = :category_id: Lọc các sản phẩm thuộc danh mục cụ thể.
        //AND p.id <> :id: Loại trừ sản phẩm hiện tại (không lấy chính nó trong danh sách liên quan).
        //ORDER BY p.id DESC LIMIT 6: Lấy tối đa 6 sản phẩm mới nhất từ bảng products.
    }
    //Tim kiem 
    public function searchProductName($name){
        $sql= "SELECT p.*, category_name FROM products p JOIN categories c ON p.category_id=c.id WHERE product_name LIKE '%$name%'";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
