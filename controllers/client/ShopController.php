<?php
class ShopController
{
    public function index()
    {
        $products = (new Product)->all();
        return view('client.shop.shop', compact("products"));
    }
    public function single()
    {
        return view('client.shop.single-product');
    }
}
