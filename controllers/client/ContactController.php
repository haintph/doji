<?php 
class ContactController{
    public function index(){
        $categories = (new Category)->list();
        return view('client.contact.contact',compact('categories'));
    }
}