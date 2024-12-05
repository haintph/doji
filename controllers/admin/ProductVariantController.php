<?php
class ProductVariantController
{
    public function index()
    {
        $variants = (new ProductVariant)->all();
        return view('admin.productvariants.list', compact('variants'));
    }

    public function create()
    {
        $products = (new Product)->all(); // Lấy danh sách sản phẩm
        $message = $_SESSION['message'] ?? '';
        return view('admin.productvariants.add', compact('products', 'message'));
    }

    public function store()
    {
        $data = $_POST;

        // Kiểm tra dữ liệu cần thiết
        if (empty($data['sku']) || empty($data['price']) || empty($data['stock_quantity']) || empty($data['product_id'])) {
            $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin!";
            header("location:" . ADMIN_URL . "?ctl=addvariant");
            return;
        }

        // Thêm mới biến thể
        try {
            (new ProductVariant)->create($data);
            $_SESSION['message'] = "Thêm biến thể sản phẩm thành công";
        } catch (Exception $e) {
            $_SESSION['message'] = "Lỗi: " . $e->getMessage();
        }
        header("location:" . ADMIN_URL . "?ctl=listpv");
    }

    public function edit()
    {
        $id = $_GET['id'];
        $variant = (new ProductVariant)->find($id);
        $products = (new Product)->all(); // Lấy danh sách sản phẩm để chọn
        $message = $_SESSION['message'] ?? '';

        if (!$variant) {
            $_SESSION['message'] = "Không tìm thấy biến thể với ID: " . htmlspecialchars($id);
            header("location:" . ADMIN_URL . "?ctl=listvariant");
            return;
        }

        return view('admin.productvariants.edit', compact('variant', 'products', 'message'));
    }

    public function update()
    {
        $data = $_POST;
        $id = $data['id'];

        // Kiểm tra dữ liệu cần thiết
        if (empty($data['sku']) || empty($data['price']) || empty($data['stock_quantity']) || empty($data['product_id'])) {
            $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin!";
            header("location:" . ADMIN_URL . "?ctl=editvariant&id=$id");
            return;
        }

        // Cập nhật biến thể
        try {
            (new ProductVariant)->update($id, $data);
            $_SESSION['message'] = "Cập nhật biến thể sản phẩm thành công";
        } catch (Exception $e) {
            $_SESSION['message'] = "Lỗi: " . $e->getMessage();
        }
        header("location:" . ADMIN_URL . "?ctl=listvariant");
    }

    public function delete()
    {
        $id = $_GET['id'];

        // Xóa biến thể
        try {
            (new ProductVariant)->delete($id);
            $_SESSION['message'] = "Xóa biến thể sản phẩm thành công";
        } catch (Exception $e) {
            $_SESSION['message'] = "Lỗi: " . $e->getMessage();
        }
        header("location:" . ADMIN_URL . "?ctl=listvariant");
    }
}
