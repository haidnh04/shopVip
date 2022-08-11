<?php
App\Lbc\LaravelBootstrapComponents::init();
App\Lbc\LaravelBootstrapComponents::initDocs();

use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\HomeUsersController;
use App\Http\Controllers\MenuUsersController;
use App\Http\Controllers\ProductUsersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\Users\User1Controller;
use App\Http\Controllers\Admin\CategoryNewController;
use App\Http\Controllers\Admin\KindNewController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\NewUsersController;
use App\Http\Controllers\SendNotificationController;
use App\Http\Controllers\Admin\CKEditorController;

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

    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('checkAdmin');
    Route::post('login',  [LoginController::class, 'store'])->name('login1');
    Route::post('logout', [LoginController::class, 'logOut'])->name('logout1');



    Route::middleware('auth', 'checkPermission')->group(function () {
        //Trang admin
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::post('add', [MainController::class, 'storeTodoList'])->name('storeTodoList');
        Route::delete('destroyTodoList', [MainController::class, 'destroyTodoList']);

        //Trang master
        //Route::get('main', [MainController::class, 'index'])->name('main');

        //Trang người dùng
        Route::prefix('users')->group(function () {
            Route::get('add', [UserController::class, 'create'])->name('createUser');
            Route::post('add', [UserController::class, 'store'])->name('storeUser');

            Route::get('list', [UserController::class, 'index'])->name('listUser');

            Route::get('edit/{user}', [UserController::class, 'show'])->name('showUser');
            Route::post('edit/{user}', [UserController::class, 'update']);

            Route::delete('destroy', [UserController::class, 'destroy']);

            Route::post('export', [UserController::class, 'exportUsers'])->name('exportUser');
            Route::get('changeStatus', [UserController::class, 'changeStatus']);
            Route::get('changeRoles', [UserController::class, 'changeRoles']);

        });


        Route::prefix('user1s')->group(function () {
            Route::get('/add', [User1Controller::class, 'create'])->name('createUser1');
            Route::post('/store', [User1Controller::class, 'store'])->name('storeUser1');

            Route::get('/list', [User1Controller::class, 'index'])->name('listUser1');
            Route::get('/getUsers', [User1Controller::class, 'getUsers']);

            Route::get('/edit/{id}', [User1Controller::class, 'show'])->name('showUser1');
            Route::get('/getuserbyid/{id}', [User1Controller::class, 'getUsersById']);
            Route::put('/update/{id}', [User1Controller::class, 'update']);

            Route::delete('/destroy/{id}', [User1Controller::class, 'destroy']);
        });

        //Trang menu(danh mục)
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create'])->name('createMenu');
            Route::post('add', [MenuController::class, 'store'])->name('storeMenu');

            Route::get('list', [MenuController::class, 'index'])->name('listMenu');

            Route::get('edit/{menu}', [MenuController::class, 'show'])->name('showMenu');
            Route::post('edit/{menu}', [MenuController::class, 'update']);

            Route::delete('destroy', [MenuController::class, 'destroy']);
            // Route::get('changeActive', [MenuController::class, 'changeActive']);

            //Route::get('edit/{id}', [MenuController::class, 'create'])->name('editMenu');
        });

        //Trang products (sản phẩm)
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create'])->name('createProduct');
            Route::post('add', [ProductController::class, 'store'])->name('storeProduct');

            Route::get('list', [ProductController::class, 'index'])->name('listProduct');

            Route::get('edit/{product}', [ProductController::class, 'show'])->name('showProduct');
            Route::post('edit/{product}', [ProductController::class, 'update']);

            Route::delete('destroy', [ProductController::class, 'destroy']);
            Route::get('changeActive', [ProductController::class, 'changeActive']);
        });

        //Trang Category News (Thể loại tin tức)
        Route::prefix('categorynew')->group(function () {
            Route::get('add', [CategoryNewController::class, 'create'])->name('createCategoryNew');
            Route::post('add', [CategoryNewController::class, 'store'])->name('storeCategoryNew');

            Route::get('list', [CategoryNewController::class, 'index'])->name('listCategoryNew');

            Route::get('edit/{categorynew}', [CategoryNewController::class, 'show'])->name('showCategoryNew');
            Route::post('edit/{categorynew}', [CategoryNewController::class, 'update']);

            Route::delete('destroy', [CategoryNewController::class, 'destroy']);
            Route::get('changeActive', [CategoryNewController::class, 'changeActive']);
        });

        //Trang kind News (Loại tin tức)
        Route::prefix('kindnew')->group(function () {
            Route::get('add', [KindNewController::class, 'create'])->name('createKindNew');
            Route::post('add', [KindNewController::class, 'store'])->name('storeKindNew');

            Route::get('list', [KindNewController::class, 'index'])->name('listKindNew');

            Route::get('edit/{kindnew}', [KindNewController::class, 'show'])->name('showKindNew');
            Route::post('edit/{kindnew}', [KindNewController::class, 'update']);

            Route::delete('destroy', [KindNewController::class, 'destroy']);
            Route::get('changeActive', [KindNewController::class, 'changeActive']);

        });

        //Trang News (Tin tức)
        Route::prefix('new')->group(function () {
            Route::get('add', [NewController::class, 'create'])->name('createNew');
            Route::post('add', [NewController::class, 'store'])->name('storeNew');

            Route::get('list', [NewController::class, 'index'])->name('listNew');

            Route::get('edit/{new}', [NewController::class, 'show'])->name('showNew');
            Route::post('edit/{new}', [NewController::class, 'update']);

            Route::delete('destroy', [NewController::class, 'destroy']);
            Route::delete('destroy1', [NewController::class, 'destroy1']);
            Route::get('changeActive', [NewController::class, 'changeActive']);
            Route::get('changeHightlight', [NewController::class, 'changeHightlight']);
        });

        //Trang ajax loại tin tức
        Route::prefix('ajax')->group(function () {
            Route::get('kind/{category_id}', [AjaxController::class, 'getKind'])->name('getKind');
            Route::get('kindSearch/{categoryNew}', [AjaxController::class, 'getKindSearch'])->name('getKindSearch');
        });

        //Trang Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create'])->name('createSlider');
            Route::post('add', [SliderController::class, 'store'])->name('storeSlider');

            Route::get('list', [SliderController::class, 'index'])->name('listSlider');

            Route::get('edit/{slider}', [SliderController::class, 'show'])->name('showSlider');
            Route::post('edit/{slider}', [SliderController::class, 'update'])->name('updateSlider');

            Route::delete('destroy', [SliderController::class, 'destroy']);
            Route::get('changeActive', [SliderController::class, 'changeActive']);
        });

        //Trang upload ảnh
        //Route::get('upload/services', [UploadController::class, 'create'])->name('createFile');
        Route::post('upload/services', [UploadController::class, 'store']);

        //Trang quản lý khách hàng đã mua hàng gì
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index'])->name('listCustomer');
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
        Route::post('export', [\App\Http\Controllers\Admin\CartController::class, 'exportCart'])->name('exportCart');


        //Notification
        Route::get('notification', [SendNotificationController::class, 'create'])->name('createNotification');
        Route::post('notification', [SendNotificationController::class, 'store'])->name('storeNotification');
    });
});

//GIao diện
Route::get('/', [HomeUsersController::class, 'index']);
Route::post('/services/load-product', [HomeUsersController::class, 'loadProduct']);

//liên hệ
Route::get('contact', [NewUsersController::class, 'contact']);


//Giới thiệu
Route::get('about', [NewUsersController::class, 'about']);

//Trang search
Route::post('search', [HomeUsersController::class, 'postSearch'])->name('timkiem113');

//Giao diện trang danh mục (chưa danh sách các sản phẩm)
Route::get('danh-muc/{id}-{slug}.html', [MenuUsersController::class, 'index']);

//Giao diện chi tiết trang sản phẩm
Route::get('san-pham/{id}-{slug}.html', [ProductUsersController::class, 'index']);

//Trang giỏ hàng
Route::post('add-cart', [CartController::class, 'index']);
Route::get('carts', [CartController::class, 'show']);
Route::post('update-cart', [CartController::class, 'update']);
Route::get('carts/delete/{id}', [CartController::class, 'remove']);
Route::post('carts', [CartController::class, 'addCart']);

//trang hiển thị thể loại tin tức
Route::get('categorynews', [NewUsersController::class, 'categoryNews']);
//trang hiển thị loại tin tức
Route::get('kindnews/{id}', [NewUsersController::class, 'kindNews']);
//trang hiển thị chi tiết tin tức
Route::get('news/{id}', [NewUsersController::class, 'news']);
//phần post đăng nhận xét trong chi tiết tin tức
Route::post('comment/{id}', [NewUsersController::class, 'postComment']);

Route::post('upload/form', [CKEditorController::class, 'form'])->name('upload.form');
Route::post('ck/upload', [CKEditorController::class, 'ckUpload'])->name('ck.upload');

