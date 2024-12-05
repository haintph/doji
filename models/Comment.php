<?php
class Comment extends BaseModel
{
    public function list()
    {
        $sql = "SELECT * FROM comments";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }
    //Thêm 1 bản ghi
    public function create($data)
    {
        $sql = "INSERT INTO comments(product_id, user_id, content) VALUES (:product_id,:user_id, :content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //Cập nhật
    public function update($id, $data)
    {
        $sql = "UPDATE comments SET content=:content WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        //Them id vao mang
        $data['id'] = $id;
        $stmt->execute($data);
    }
    //Xoa ban ghi (Xoa mem khong xoa khoi Database)
    //Chi tiết 1 bản ghi 
    public function show($id)
    {
        $sql = "SELECT * FROM comments";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCommentsByProductId($product_id)
    {

        $sql = "SELECT comments.*, users.username, comments.created_at
                FROM comments
                JOIN users ON comments.user_id = users.id
                WHERE comments.product_id = :product_id
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        dd($id);
        $sql = "DELETE FROM comments WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM comments WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
