<?php
class AboutController{
    public function index(){
        $categories = (new Category)->list();
        return view('client.about.about',compact('categories'));
    }
}