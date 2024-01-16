<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [FrontendController::class, 'index']);

Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);
//product-list
Route :: get('product-list',[FrontendController :: class,'productlistAjax'])->name('search.add');
Route :: post('searchproduct',[FrontendController :: class,'searchProduct']);


Auth::routes();
Route::post('add-to-cart', [CartController::class, 'addProduct'])->name('cart.add');
Route::get('load-wishlist-data',[WishlistController::class, 'wishlistcount'])->name('wishlistload.add');
//cartload.add
Route::get('load-cart-data', [CartController::class, 'cartcount'])->name('cartload.add');
// )->name('cart.delete')
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem'])->name('wishlist.delete');

//wishlist.delete
Route::post('delete-cart-item', [CartController::class, 'deleteproduct'])->name('cart.delete');
// update-cart->name('cart.update')

Route::post('update-cart', [CartController::class, 'updatecart'])->name('cart.update');

Route::post('add-to-wishlist', [WishlistController::class,'add'])->name('wishlist.insert');

//wishlist
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order',[CheckoutController::class, 'placeorder']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::post('add-rating',[RatingController::class,'add']);

    Route::get('add-review/{product_slug}/userreview',[ReviewController::class,'add']);
    Route::post('add-review',[ReviewController::class,'create']);
//edit-review
Route::get('edit-review/{product_slug}/userreview',[ReviewController::class,'edit']);
Route::put('update-review',[ReviewController::class,'update']);

    Route::get('view-order/{id}', [UserController::class, 'view']);
    Route::get('Wishlist', [WishlistController::class, 'index']);
    Route::post('proceed-to-pay',[CheckoutController::class,'razorpaycheck'])->name('checkout.pay');;

//add-review
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', 'Admin\FrontendController@index');

    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('users',[DashboardController::class,'users']);
    Route::get('view-user/{id}',[DashboardController::class,'viewusers']);
    
    Route::get('orders',[OrderController::class, 'index']);
    Route::get('admin/view-order/{id}',[OrderController::class, 'view']);
    Route::put('update-order/{id}',[OrderController::class, 'updateorder']);
    Route::get('order-history',[OrderController::class, 'orderhistory']);
   
    Route::get('about', 'Admin\FrontendController@about');
    Route::get('aboutus', 'Admin\FrontendController@aboutus');
    Route::get('contact', 'Admin\FrontendController@contact');
    
    

   
});
