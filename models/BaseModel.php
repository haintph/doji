<?php
class BaseModel
{
    public $conn;
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;
            dbname=duan; charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "Loi co so du lieu: " . $e->getMessage();
        }
    }
}
