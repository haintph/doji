<?php
require_once __DIR__ . '/../../models/Auth.php';
class AdminUserController
{
    public function index()
    {
        $users = (new AuthModel)->all();
        return view('admin.users.list', compact('users'));
    }

    public function formEdit()
    {
        if (!isset($_GET['email']) || empty($_GET['email'])) {
            die("Email không hợp lệ!");
        }

        $email = $_GET['email'];

        $user = (new AuthModel)->findUserByEmail($email);

        if (!$user) {
            die("Không tìm thấy user với email này!");
        }

        // Truyền dữ liệu user vào view
        return view('admin.users.edit', ['user' => $user]);
    }


    public function edit()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $role = $_POST['role'] ?? 'client';
            $email = $_POST['email'];
            $image = '';

            // Xử lý ảnh (nếu có)
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $file = $_FILES['image'];
                $imageName = uniqid() . '-' . basename($file['name']);
                $targetPath = "../images/users/" . $imageName;

                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                    $image = $imageName;
                } else {
                    echo "Lỗi khi tải ảnh lên.";
                    exit();
                }
            }

            // Kiểm tra trường hợp thiếu dữ liệu
            if (empty($username) || empty($email)) {
                echo "Vui lòng điền đầy đủ thông tin.";
                return;
            }

            // Cập nhật dữ liệu vào database
            $user = new AuthModel();
            $data = [
                'username' => $username,
                'image' => $image ?: null,
                'role' => $role,
                'email' => $email
            ];
            $user->edit($data);

            // Chuyển hướng về danh sách user
            header("Location: " . ADMIN_URL . "?ctl=listuser");
            exit();
        }
    }

    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            if ($id) {
                (new AuthModel)->delete($id);
                $_SESSION['message'] = "Xóa dữ liệu thành công";
                header("location: " . ADMIN_URL . "?ctl=listuser");
                exit();
            } else {
                echo "ID không tồn tại!";
            }
        } else {
            echo "Yêu cầu không hợp lệ!";
        }
    }
    public function updateActive()
    {
        $data = $_POST;

        $data['active'] = $data['active'] ? 0 : 1;
        (new AuthModel)->updateActive($data['id'],$data['active']);
        return header('Location:' . ADMIN_URL . '?ctl=listuser');
    }
}
