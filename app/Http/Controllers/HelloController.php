<?php

namespace App\Http\Controllers;

class HelloController extends Controller{
    
    function say_hello($name ,$age = null){
       return view("test.hello" )
        ->with("user_name" , $name)
        ->with("age" , $age);
    }
}