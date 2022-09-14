<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Frontend\FrontendController@index');
Route::get('category', 'Frontend\FrontendController@category');
Route::get('view-category/{slug}', 'Frontend\FrontendController@viewCategory');
Route::get('category/{cate_slug}/{prod_slug}', 'Frontend\FrontendController@productView');

Auth::routes();

Route::get('load-cart-data',[CartController::class, 'cartCountFarrel']);
Route::get('load-wishlist-count',[WishlistController::class, 'wishlistCountFarrel']); 

Route::post('add-to-cart',[CartController::class, 'addProductFarrel']);
Route::post('delete-cart-item',[CartController::class, 'deleteProductFarrel']);
Route::post('update-cart',[CartController::class, 'updateCartFarrel']);

Route::post('add-to-wishlist', 'Frontend\WishlistController@addFarrel');
Route::post('remove-wishlist-item', [WishlistController::class, 'deleteFarrel']);

Route::middleware(['auth'])->group(function () {
   Route::get('cart', 'Frontend\CartController@viewCartFarrel');
   Route::get('checkout', 'Frontend\CheckoutController@index');
   Route::post('place-order', 'Frontend\CheckoutController@placeOrderFarrel');
   Route::get('my-orders', 'Frontend\UserController@index');
   Route::get('view-order/{id}', 'Frontend\UserController@viewFarrel');
   
   Route::get('wishlist', 'Frontend\WishlistController@index');
  

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth', 'isAdmin'])->group(function(){
        Route::get('/dashboard','Admin\FrontendController@index');

        Route::get('categories', 'Admin\CategoryController@index');
        Route::get('add-category', 'Admin\CategoryController@addFarrel');
        Route::post('insert-category', 'Admin\CategoryController@insertFarrel');
        Route::get('edit-category/{id}', 'Admin\CategoryController@editFarrel');
        Route::put('update-category/{id}', 'Admin\CategoryController@updateFarrel');
        Route::get('delete-category/{id}', 'Admin\CategoryController@deleteFarrel');
        Route::get('delete-category/{id}', 'Admin\CategoryController@deleteFarrel');

        Route::get('products', 'Admin\ProductController@index');
        Route::get('add-products', 'Admin\ProductController@addFarrel');
        Route::post('insert-products', 'Admin\ProductController@insertFarrel');
        Route::get('edit-product/{id}', 'Admin\ProductController@editFarrel');
        Route::put('update-products/{id}', 'Admin\ProductController@updateFarrel');
        Route::get('delete-product/{id}', 'Admin\ProductController@deleteFarrel');
        
        
        Route::get('orders', 'Admin\OrderController@index');

        Route::get('admin/view-order/{id}', [OrderController::class, 'viewFarrel']);
        Route::put('update-order/{id}', [OrderController::class, 'updateFarrel']);
        Route::get('order-history', [OrderController::class, 'orderHistoryFarrel']);

        Route::get('users', 'Admin\DashboardController@usersFarrel');
        Route::get('view-user/{id}', 'Admin\DashboardController@viewUserFarrel');
    });

