<?php
class AuthModel extends BaseModel
{
    public function all()
    {
        $sql = "SELECT * FROM users";
        //Chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        //Trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkUserExists($email, $username)
    {
        $sql = "SELECT * FROM users WHERE email = :email OR username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'username' => $username]);
        return $stmt->fetch();
    }

    public function createUser($data)
    {
        $sql = "INSERT INTO users(username, email, password, phone, address) 
        VALUES (:username, :email, :password, :phone, :address)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // Tìm người dùng theo email
    public function findUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function findUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function edit($data)
    {
        $sql = "UPDATE users SET username = :username, role = :role WHERE email = :email";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':email', $data['email']);

        return $stmt->execute();
    }

    public function delete($id)
    {
        dd($id);
        $sql = "DELETE FROM users WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }
    //Cart
    public function update($id, $data)
    {
        $sql = "UPDATE users 
        SET username=:username,
         phone=:phone, 
         address=:address,
         role=:role,
         active=:active WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        //Them id vao data
        $data['id'] = $id;
        $stmt->execute($data);
    }
    //update active user
    public function updateActive($id,$active){
        $sql = "UPDATE users SET active = :active WHERE id=:id";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id' => $id,'active' => $active]);
    }
}
