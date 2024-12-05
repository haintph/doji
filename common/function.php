<?php

//Hàm render view
function view($path_view, $data = [])
{
    extract($data);

    $path_view = str_replace(".", "/", $path_view);

    include_once ROOT_DIR . "views/$path_view.php";
}
//
function dd($data)
{
    echo "<pre>";
    var_dump($data);
}
//Ham session_flash se huy session ngay lap tuc
function session_flash($key) {
    if (isset($_SESSION[$key])) {
        $message = $_SESSION[$key];
        unset($_SESSION[$key]); // Xóa sau khi lấy giá trị
        return $message;
    }
    return null; // Trả về null nếu không tồn tại khóa
}
//chuyen doi trang thai
function getStatusOrder($status){
    $status_detail = [
        1 => ['label' => 'Chờ xử lý', 'class' => 'badge-warning'],
        2 => ['label' => 'Đang xử lý', 'class' => 'badge-primary'],
        3 => ['label' => 'Hoàn thành', 'class' => 'badge-success'],
        4 => ['label' => 'Đã hủy', 'class' => 'badge-danger']
    ];
    if (isset($status_detail[$status])) {
        return '<span class="badge ' . $status_detail[$status]['class'] . '">' . $status_detail[$status]['label'] . '</span>';
    }
}
function getStatusOrderUser($status) {
    $status_detail = [
        1 => '<span class="status-label status-pending">Chờ xử lý</span>',
        2 => '<span class="status-label status-processing">Đang xử lý</span>',
        3 => '<span class="status-label status-completed">Hoàn thành</span>',
        4 => '<span class="status-label status-cancelled">Đã hủy</span>',
    ];

    return $status_detail[$status] ?? '<span class="status-label status-unknown">Không xác định</span>';
}

