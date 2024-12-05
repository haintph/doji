<?php

class DashboardController
{
    public function __construct()
    {
        $user = $_SESSION['user'] ?? [];
        if (!$user || $user['role'] != 'admin') {
            return header("Location:" . ROOT_URL);
        }
    }
    public function index()
    {
        $total_order = (new Statistical)->total_orders();
        $toltal_user = (new Statistical)->total_users();
        $total_price = (new Statistical)->total_price();
        return view('admin.dashboard', compact('total_order', 'toltal_user', 'total_price'));
    }
}
