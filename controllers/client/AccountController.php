<?php
require_once __DIR__ . '/../../models/Auth.php';
session_start();
class AccountController
{
    private $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }
    public function MyAccount()
    {
        $categories = (new Category)->list();

        // Kiểm tra xem `$_SESSION['user']` có tồn tại hay không
        if (isset($_SESSION['user'])) {
            // Giả sử `$_SESSION['user']` là một mảng chứa thông tin người dùng
            $userSession = $_SESSION['user'];
            $email = $userSession['email']; // Lấy email từ session
            $user = $this->authModel->findUserByEmail($email); // Tìm thông tin người dùng từ cơ sở dữ liệu

            // Trả về view với thông tin user và categories
            return view('client.account.my-account', compact('user', 'categories'));
        } else {
            // Người dùng chưa đăng nhập
            $_SESSION['message'] = "Bạn cần đăng nhập để truy cập trang này.";
            header("Location: ?ctl=sign-in");
            exit;
        }
    }


    public function editProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'];
            $role = $_POST['role'];
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $file = $_FILES['image'];
                $imageName = uniqid() . '-' . basename($file['name']);
                $targetPath = __DIR__ . "/../../images/users/" . $imageName;

                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                    $image = $imageName;
                    echo "Ảnh đã được tải lên thành công.";
                } else {
                    echo "Lỗi khi tải ảnh lên.";
                    exit();
                }
            }


            if (empty($username) || empty($email)) {
                echo "Vui lòng điền đầy đủ thông tin.";
                return;
            }
            $user = new AuthModel();
            $data = [
                'username' => $username,
                'image' => $image ?: null,
                'email' => $email,
                'role' => $role
            ];
            $user->edit($data);
            header("Location: " . ROOT_URL . "?ctl=my-account");
            exit();
        }
    }

    public function login()
    {
        $categories = (new Category)->list();
        //Kiem tra xem nguoi dung dang nhap chua
        if (isset($_SESSION['user'])) {
            header("Location:" . ROOT_URL);
            die();
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = (new AuthModel())->findUserByEmail($email);
            //Kiem tra mat khau
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    //dang nhap thanh cong
                    $_SESSION['user'] = $user;
                    //neu role la 1 vao admin,user vao trang chu
                    if ($user['role'] === 'admin') {
                        header("Location:" . ADMIN_URL);
                        die();
                    }
                    header("Location:" . ROOT_URL);
                    die();
                } else {
                    $error = "Email hoac mat khau khong dung";
                }
            } else {
                $error = "Email hoac mat khau khong dung";
            }
        }
        $message = session_flash('message');
        return view('client.account.sign-in', compact('message', 'error', 'categories'));
    }



    public function SignUp()
    {
        $categories = (new Category )->list();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            // dd($data);
            //Ma hoa mk
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            //Dua vao data
            $data['password'] = $password;
            //Insert 
            (new AuthModel())->createUser($data);
            //Thong bao
            $_SESSION['message'] = "Dang ky thanh cong";
            header("Location:" . ROOT_URL . "?ctl=sign-in");
            die();
        }
        return view('client.account.sign-up',compact('categories'));
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location:" . ROOT_URL . '?ctl=sign-in');
        die();
    }
}
