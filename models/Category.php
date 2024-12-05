<?php
class Category extends BaseModel
{
    //Lay tat ca danh muc
    public function list()
    {
        $sql = "SELECT * FROM categories WHERE soft_delete = 0 ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    //Thêm 1 bản ghi
    public function create($data)
    {
        $sql = "INSERT INTO categories(category_name, img_category,type) VALUES(:category_name,:img_category, :type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //Cập nhật
    public function update($id, $data)
    {
        $sql = "UPDATE categories 
        SET category_name	=:category_name	,
        img_category=:img_category, 
        type=:type 
        WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        //Them id vao mang
        $data['id'] = $id;
        $stmt->execute($data);
    }
    //Xoa ban ghi (Xoa mem khong xoa khoi Database)
    public function delete($id)
    {
        //Chuyển trạng thái của soft_delete từ 0->1
        $sql = "UPDATE categories SET soft_delete=1 WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    //Chi tiết 1 bản ghi 
    public function show($id)
    {
        $sql = "SELECT * FROM categories WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function find($id)
    {
        $sql = "SELECT * FROM categories WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
