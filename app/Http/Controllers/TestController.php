<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function test(){
      echo "Test"  ;
    }

    function cats($name){
      $c = new Category();
      $c->name =$name;
      $c->save(); // insert 

      var_dump($c);
    }

    function list_cats(){
      // var_dump( Category::all());
      foreach(Category::all() as $cat){
        echo $cat->name ,"<br>";
      }
    }
}
