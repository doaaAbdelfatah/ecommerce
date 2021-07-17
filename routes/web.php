<?php

use App\Http\Controllers\CalcController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get("/test/{name}/{age?}" ,function($xx ,$age=16){
    // echo "Hello $xx from test";

    return view("hello" ,["user_name" =>$xx , "age"=>$age]);
});



Route::get("/hello/{name}/{age?}" , [HelloController::class ,"say_hello"]);
Route::get("/test" , [TestController::class ,"test"]);

Route::get("/cat" , [TestController::class ,"list_cats"]);
Route::get("/cat/{name}" , [TestController::class ,"cats"]);

Route::get("/add/{x}/{y}/{z?}" ,[CalcController::class , "add"] );

Route::get("/show" ,[CalcController::class , "show"]  );
Route::post("/show" ,[CalcController::class , "sum"]  );


Route::view("/home" , "home" ,["title" =>"Welcome to Home Page"]);
Route::view("/employees" , "emps" );


// Route::get('/master', function () {
//     return view('master');
// });