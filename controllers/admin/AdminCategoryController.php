<?php
class AdminCategoryController
{
    public function index()
    {
        $categories = (new Category)->list();
        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
        $message = $_SESSION['message'] ?? '';
        return view('admin.categories.add');
    }
    public function store()
    {
        $data = $_POST;
        $data['img_category'] = '';
        $file = $_FILES['img_category'];
        if ($file['size'] > 0) {
            $img_category = $file['name'];
            move_uploaded_file($file['tmp_name'], "../images/" . $img_category);
        }
        $data['img_category'] = $img_category;
        $categories = new Category;
        $categories->create($data);
        $_SESSION['message'] = "Thêm dữ liệu thành công";
        header("location:" . ADMIN_URL . "?ctl=listcate");
    }
    public function edit()
    {
        $id = $_GET['id'];
        $categories = (new Category)->find($id);
        $message = $_SESSION['message'] ?? '';
        return view('admin.categories.edit', compact('categories'));
    }
    public function update()
    {
        $data = $_POST;
        //Tao doi tuong category
        $categories = new Category;
        //lay danhmuc cu
        $item = $categories->find($data['id']);
        if (!$item || !is_array($item)) {
            die("Không tìm thấy danh mục với ID: " . htmlspecialchars($data['id']));
        }
        // Kiểm tra file upload
        $file = $_FILES['img_category'];
        if ($file['size'] > 0) {
            $image = time() . '_' . $file['name'];
            if (move_uploaded_file($file['tmp_name'], ROOT_DIR . "images/" . $image)) {
                if (file_exists(ROOT_DIR . "images/" . $item['img_category'])) {
                    unlink(ROOT_DIR . "images/" . $item['img_category']);
                }
            } else {
                die("Không thể upload ảnh.");
            }
            $data['img_category'] = $image;
        } else {
            $data['img_category'] = $item['img_category'];
        }
        // Gọi phương thức update
        try {
            $categories->update($data['id'], $data);
        } catch (Exception $e) {
            die("Lỗi khi cập nhật: " . $e->getMessage());
        }
        $_SESSION['message'] = "Cập nhật dữ liệu thành công";
        header("location: " . ADMIN_URL . "?ctl=listcate");
        die;
    }
    public function delete()
    {
        $id = $_GET['id'];
        (new Category)->delete($id);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header("location:" . ADMIN_URL . '?ctl=listcate');
    }
}
