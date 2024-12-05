<?php

session_start();
function checkAdmin(){
    $user = $_SESSION['user'] ?? [];
    if (!$user || $user['role'] != 'admin') {
        return header("Location:" . ROOT_URL);
    }
}
// function checkAdmin()
// {
//     if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
//         header('Location: http://localhost/web/');
//         exit();
//     }
// }
