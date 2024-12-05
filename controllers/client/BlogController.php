<?php
class BlogController{
    public function index(){
        $categories = (new Category)->list();
        return view('client.blog.blog',compact('categories'));
    }
}