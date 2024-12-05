<?php
class HomeController
{
    
    public function index()
    {
        $title= "Trang chủ";
        $products = (new Product)->all();
        $categories = (new Category)->list() ;
        return view("client.home",compact('categories','title','products'));
    }
}