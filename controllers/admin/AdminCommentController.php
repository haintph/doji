<?php
//Dieu khien san pham
require_once __DIR__ . '/../../models/Comment.php';
class AdminCommentController
{
    public function index()
    {
        $comments = (new Comment)->list();
        return view('admin.comments.list', compact('comments'));
    }
    public function create()
    {
        $categories = (new Category)->list();
        return view('admin.products.add', compact('categories'));
    }
    public function store()
    {
        $data = $_POST;

        $data['img_product'] = '';

        if (isset($_FILES['img_product']) && $_FILES['img_product']['size'] > 0) {
            $file = $_FILES['img_product'];

            $image = $file['name'];

            if (move_uploaded_file($file['tmp_name'], "../images/" . $image)) {
                $data['img_product'] = $image; // Gán tên ảnh vào dữ liệu
            } else {
                $data['img_product'] = '';
            }
        }
        $product = new Product;
        $product->create($data);

        header("location: " . ADMIN_URL . "?ctl=listsp");
        exit();
    }

    public function formEdit()
    {
        if (!isset($_GET['id'])) {
            die("id không hợp lệ!");
        }

        $email = $_GET['id'];

        $user = (new Comment)->find($email);
        if (!$user) {
            die("Không tìm thấy user với email này!");
        }

        return view('admin.comments.edit', ['user' => $user]);
    }

    public function edit()
    {
        $id = $_GET['id'];
        $product = (new Comment)->find($id);
        $categories = (new Comment)->list();
        $message = $_SESSION['message'] ?? '';
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update()
    {
        $data = $_POST;
        (new Comment)->update($data['id'], $data);
        $_SESSION['message'] = "Cập nhật dữ liệu thành công";

        header("location: " . ADMIN_URL . "?ctl=list-comments");
        die;
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_GET['id']) ? $_GET['id'] : null;

            if ($id) {
                (new Comment)->delete($id);
                $_SESSION['message'] = "Xóa dữ liệu thành công";
                header("location: " . ADMIN_URL . "?ctl=list-comments");
                exit();
            } else {
                echo "ID không tồn tại!";
            }
        } else {
            echo "Yêu cầu không hợp lệ!";
        }
    }
}
