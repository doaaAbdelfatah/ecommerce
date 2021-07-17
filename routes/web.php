<?php

use App\Http\Controllers\CalcController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\TestController;
use App\Models\Category;
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

Route::prefix("/category")->group(function(){
    Route::get("/" ,[CategoryController::class ,"index"])->name("category.index");
    Route::post("/" ,[CategoryController::class ,"store"])->name("category.store");
    Route::get("/{id}/delete" ,[CategoryController::class ,"destroy"])->name("category.destroy");
    
});
