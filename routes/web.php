<?php

use App\Http\Controllers\CalcController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\AgeChecker;
use App\Models\Category;
use Illuminate\Support\Facades\App;
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

Route::get("/lang/{lang}" ,function($lang){
    if ($lang =="ar")
        // app()->setLocale("ar");
        session()->put("lang" , "ar");

    else 
        session()->put("lang" , "en");

        // app()->setLocale("en");
    
        // echo trans("messages.Name");

        return redirect()->back();

});

Route::prefix("/category")->group(function(){
    Route::get("/" ,[CategoryController::class ,"index"])->name("category.index");
    Route::post("/search" ,[CategoryController::class ,"search"])->name("category.search");
    Route::post("/" ,[CategoryController::class ,"store"])->name("category.store");
    Route::get("/{id}" ,[CategoryController::class ,"edit"])->name("category.edit");
    Route::patch("/{id}" ,[CategoryController::class ,"update"])->name("category.update");
    Route::delete("/{id}/delete" ,[CategoryController::class ,"destroy"])->name("category.destroy");  
});

// Route::get("/test/{name?}" ,function($n=null){
// echo "Hello $n";
// })->whereAlpha("name" );


// Route::get("/test/{id}" ,function($id=10){
// echo "Test $id";
// });



Route::prefix("/")->middleware("age")->group(function(){
    Route::get("/hi/{age}" ,function($age){
        echo "Hi  $age";
        });   
    Route::get("/hello/{age}" ,function($age){
        echo "Hi  $age";
        });
});
// Route::prefix("/")->middleware(AgeChecker::class)->group(function(){
//     Route::get("/hi/{age}" ,function($age){
//         echo "Hi  $age";
//         });   
//     Route::get("/hello/{age}" ,function($age){
//         echo "Hi  $age";
//         });
// });

