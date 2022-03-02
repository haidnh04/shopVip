<?php

use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Main1Controller;
use App\Http\Controllers\Menu1Controller;
use App\Http\Controllers\Product1Controller;
use App\Http\Controllers\CartController;

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
//phần Admin
Route::prefix('admin')->group(function () {

    //Login
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login',  [LoginController::class, 'store'])->name('login1');


    Route::middleware('auth')->group(function () {

        //Trang admin
        Route::get('/', [MainController::class, 'index'])->name('admin');

        //Trang master
        //Route::get('main', [MainController::class, 'index'])->name('main');

        //Trang menu(danh mục)
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create'])->name('createMenu');
            Route::post('add', [MenuController::class, 'store'])->name('storeMenu');

            Route::get('list', [MenuController::class, 'index'])->name('listMenu');

            Route::get('edit/{menu}', [MenuController::class, 'show'])->name('showMenu');
            Route::post('edit/{menu}', [MenuController::class, 'update']);

            Route::delete('destroy', [MenuController::class, 'destroy']);
            //Route::get('edit/{id}', [MenuController::class, 'create'])->name('editMenu');
        });

        //Trang products(danh mục)
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create'])->name('createProduct');
            Route::post('add', [ProductController::class, 'store'])->name('storeProduct');

            Route::get('list', [ProductController::class, 'index'])->name('listProduct');

            Route::get('edit/{product}', [ProductController::class, 'show'])->name('showProduct');
            Route::post('edit/{product}', [ProductController::class, 'update']);

            Route::delete('destroy', [ProductController::class, 'destroy']);
        });

        //Trang Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create'])->name('createSlider');
            Route::post('add', [SliderController::class, 'store'])->name('storeSlider');

            Route::get('list', [SliderController::class, 'index'])->name('listSlider');

            Route::get('edit/{slider}', [SliderController::class, 'show'])->name('showSlider');
            Route::post('edit/{slider}', [SliderController::class, 'update']);

            Route::delete('destroy', [SliderController::class, 'destroy']);
        });

        //Route::get('upload/services', [UploadController::class, 'create'])->name('createFile');
        Route::post('upload/services', [UploadController::class, 'store']);

        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index'])->name('listCustomer');
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);

    });
});

//GIao diện
Route::get('/', [Main1Controller::class, 'index']);
Route::post('/services/load-product', [Main1Controller::class, 'loadProduct']);

//Giao diện trang danh mục (chưa danh sách các sản phẩm)
Route::get('danh-muc/{id}-{slug}.html', [Menu1Controller::class, 'index']);

//Giao diện chi tiết trang sản phẩm
Route::get('san-pham/{id}-{slug}.html', [Product1Controller::class, 'index']);

//Trang giỏ hàng
Route::post('add-cart', [CartController::class, 'index']);
Route::get('carts', [CartController::class, 'show']);
Route::post('update-cart', [CartController::class, 'update']);
Route::get('carts/delete/{id}', [CartController::class, 'remove']);   
Route::post('carts', [CartController::class, 'addCart']);
