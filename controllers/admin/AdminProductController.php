<?php
//Dieu khien san pham
class AdminProductController
{
    public function __construct()
    {
        $user = $_SESSION['user'] ?? [];
        if (!$user || $user['role'] != 'admin') {
            return header("Location:" . ROOT_URL);
        }
    }
    //Hien thi danh sach san pham
    // public function index()
    // {
    //     $products = (new Product)->all();
    //     return view('admin.products.list', compact('products'));
    // }
    public function index()
    {
        $message = $_SESSION['message']  ?? '';
        $products = (new Product)->all();
        return view('admin.products.list', compact('products', 'message'));
    }

    //Hien thi form them
    public function create()
    {
        $categories = (new Category)->list();
        return view('admin.products.add', compact('categories'));
    }
    //Them du lieu
    public function store()
    {
        $data = $_POST;
        $data['img_product'] = ''; //truong hop khong nhap anh
        $file = $_FILES['img_product'];
        if ($file['size'] > 0) {
            $image = $file['name'];

            if (move_uploaded_file($file['tmp_name'], "../images/" . $image)) {
                $data['img_product'] = $image; // Gán tên ảnh vào dữ liệu
            } else {
                $data['img_product'] = '';
            }
        }
        $data['img_product'] = $image;
        $product = new Product;

        $product->create($data);
        $_SESSION['message'] = "Thêm dữ liệu thành công";
        header("location: " . ADMIN_URL . "?ctl=listsp");
        exit();
    }


    public function edit()
    {
        $id = $_GET['id'];
        //lay du lieu sp co id=$id
        $product = (new Product)->find($id);
        //danhmuc
        $categories = (new Category)->list();
        $message = $_SESSION['message'] ?? '';
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update()
    {
        $data = $_POST;
        // Tạo đối tượng Product
        $product = new Product;
        //lấy ra sản phẩm cũ
        $item = $product->find($data['id']);
        //Lưu ảnh cũ vào image khi người dùng không cập nhật ảnh
        $image = $item['img_product'];

        //Lấy file người dùng nhập vào
        $file = $_FILES['img_product'];
        if ($file['size'] > 0) {
            $image = $file['name'];
            //Upload image
            move_uploaded_file($file['tmp_name'], ROOT_DIR . "images/" . $image);
        }
        //Thểm ảnh vào data
        $data['img_product'] = $image;
        //Cập nhật
        $product->update($data['id'], $data);

        $_SESSION['message'] = "Cập nhật dữ liệu thành công";
        //Quay về trang edit

        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }

    public function delete()
    {
        $id = $_GET['id'];
        (new Product)->delete($id);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }
}
