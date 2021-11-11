<?php

use Illuminate\Support\Facades\Route;
use App\Controller\Admin\CatagoryController;
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


Route::get('/', [App\Http\Controllers\frontend\FrontendController::class, 'index']);
Route::get('catagory', [App\Http\Controllers\frontend\FrontendController::class, 'catagory']);
Route::get('view-cat/{slug}', [App\Http\Controllers\frontend\FrontendController::class, 'viewCat']);
Route::get('view-cat/{slug}/{name}', [App\Http\Controllers\frontend\FrontendController::class, 'product_view']);
Route::get('contact', [App\Http\Controllers\frontend\FrontendController::class, 'show_stores']);

Auth::routes();

Route::post('addtocart',  [App\Http\Controllers\frontend\CartController::class, 'add_product']);
Route::post('removecart', [App\Http\Controllers\frontend\CartController::class, 'removecart']);
Route::post('updatecart', [App\Http\Controllers\frontend\CartController::class, 'updatecart']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\frontend\CartController::class, 'view_cart']);
    Route::get('checkout', [App\Http\Controllers\frontend\CheckoutController::class, 'index']);
    Route::post('placeorder', [App\Http\Controllers\frontend\CheckoutController::class, 'placeoreder']);

    ROute::get('myorder', [App\Http\Controllers\frontend\UserController::class, 'index']);
    ROute::get('vieworder/{id}', [App\Http\Controllers\frontend\UserController::class, 'view']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index']);
    Route::get('catagories', [App\Http\Controllers\Admin\CatagoryController::class, 'index']);
    Route::get('addcatagories', [App\Http\Controllers\Admin\CatagoryController::class, 'add']);
    Route::get('editcatagory/{id}', [App\Http\Controllers\Admin\CatagoryController::class, 'edit']);
    Route::get('deletecatagory/{id}', [App\Http\Controllers\Admin\CatagoryController::class, 'destroy']);
    Route::post('insert-catagory',  [App\Http\Controllers\Admin\CatagoryController::class, 'insert']);
    Route::put('update-catagory/{id}',  [App\Http\Controllers\Admin\CatagoryController::class, 'update']);

    Route::get('stores', [App\Http\Controllers\Admin\StoreController::class, 'index']);
    Route::get('addstore', [App\Http\Controllers\Admin\StoreController::class, 'add']);
    Route::post('insertstore',  [App\Http\Controllers\Admin\StoreController::class, 'insert']);
    Route::get('editstore/{id}', [App\Http\Controllers\Admin\StoreController::class, 'edit']);
    Route::put('updatestore/{id}',  [App\Http\Controllers\Admin\StoreController::class, 'update']);
    Route::get('deletestore/{id}', [App\Http\Controllers\Admin\StoreController::class, 'destroy']);

    Route::get('products', [App\http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('addproducts', [App\http\Controllers\Admin\ProductController::class, 'add']);
    Route::post('insert-product',  [App\Http\Controllers\Admin\ProductController::class, 'insert']);
    Route::get('editproduct/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::get('deleteproduct/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);
    Route::put('update-product/{id}',  [App\Http\Controllers\Admin\ProductController::class, 'update']);

    Route::get('users',[App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('viewuser/{id}',[App\Http\Controllers\Admin\DashboardController::class, 'view']);
    Route::get('birthday',[App\Http\Controllers\Admin\DashboardController::class, 'birthday']);

    Route::get('orders',[App\Http\Controllers\Admin\OrderController::class, 'index']);
    Route::get('admin/vieworder/{id}',[App\Http\Controllers\Admin\OrderController::class, 'view']);
    Route::put('updateorder/{id}',[App\Http\Controllers\Admin\OrderController::class, 'update']);
    Route::get('comlpetedorders',[App\Http\Controllers\Admin\OrderController::class, 'showcompleted']);
    
});
