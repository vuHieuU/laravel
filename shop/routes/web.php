<?php

//admin
use App\Http\Controllers\admin\detailCartController;
use App\Http\Controllers\admin\users\userController;
use App\Http\Controllers\admin\mainController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\sliderController;
use App\Http\Controllers\admin\CustomerController;
// giao diện
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\detailController;
// route
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin/users/login',[userController::class,'index'])->name("login");
Route::post('admin/users/login/store',[userController::class,'store']);

Route::middleware(['auth'])->group(function (){

      Route::prefix('admin')->group(function (){
             Route::get('main',[mainController::class,'index'])->name('admin');

             // Danh mục
      Route::prefix('menu')->group(function (){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::get('edit/{id}',[MenuController::class,'showEdit']);
            Route::post('edit/{id}',[MenuController::class,'handleEdit']);
            Route::get('remove/{id}',[MenuController::class,'remove']);
            });
             // Sản phẩm
      Route::prefix('product')->group(function(){
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('edit/{id}',[ProductController::class,'edit']);
            Route::post('edit/{id}',[ProductController::class,'update']);
            Route::get('list',[ProductController::class,'index']);
            Route::get('Delete/{id}',[ProductController::class,'destroy']);
      });
          // slider
          Route::prefix('slider')->group(function(){
              Route::get('add',[sliderController::class,'create']);
              Route::post('add',[sliderController::class,'store']);
              Route::get('edit/{id}',[sliderController::class,'edit']);
              Route::post('edit/{id}',[sliderController::class,'update']);
              Route::get('list',[sliderController::class,'index']);
              Route::get('Delete/{id}',[sliderController::class,'destroy']);
          });
        // cart
                Route::prefix('cart')->group(function(){
                Route::get('list',[CustomerController::class,'index']);
                Route::get('detailCart/{id}',[detailCartController::class,'index']);
              });
          // upload

      Route::post('upload/services',[UploadController::class,'store']);
      });
});

Route::get('/',[HomeController::class,'index']);
Route::get('danh-muc/{id}-{slug}.html',[CateController::class,'index']);
Route::get('product-detail/{id}',[detailController::class,'index']);
Route::post('add-cart',[CartController::class,'index']);
Route::get('/cart',[CartController::class,'show']);
Route::post('/update_Cart',[CartController::class,'update']);
Route::get('/delete/{id}',[CartController::class,'remove']);
Route::post('/cart',[CartController::class,'addCart']);



