<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;

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

Route::get('/',[HomeController::class,'index']);

Route::get('/shop', [ProductController::class,'index']);
Route::get('/product-detail/{id}', [ProductController::class,'show']);

Route::get('/category/{slug}', [CategoryController::class,'showslug']);

Route::get('/blog', [BlogController::class,'index']);
Route::get('/blog-single/{id}', [BlogController::class,'show']);

Route::get('/contact', function () {
    return view('contact');
});


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//For USER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
  Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
  Route::get('/checkout/{id}/{price}', [OrderController::class,'index']);
  Route::post('/address/{id}/{price}', [OrderController::class,'save']);
  Route::get('/cart/{id}', [CartController::class,'index']);
  Route::get('/cart/delete/{id}', [CartController::class,'delete']);
  Route::get('/cart/store/{pro_id}/{usr_id}', [CartController::class,'store']);
  Route::get('/order-complete', function () {
      return view('order-complete');
  });
});

//For ADMIN
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
  Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');

  Route::get('/admin/products', [ProductController::class,'products']);
  Route::post('/submitproduct', [ProductController::class,'save']);
  Route::get('/admin/editproduct/{id}', [ProductController::class,'edit']);
  Route::put('/updateproduct/{id}', [ProductController::class,'update']);
  Route::get('/admin/deleteproduct/{id}', [ProductController::class,'delete']);

  Route::get('/admin/categories', [CategoryController::class,'categories']);
  Route::post('/submitcategory', [CategoryController::class,'save']);
  Route::get('/admin/editcategory/{id}', [CategoryController::class,'edit']);
  Route::put('/updatecategory/{id}', [CategoryController::class,'update']);
  Route::get('/admin/deletecategory/{id}', [CategoryController::class,'delete']);

  Route::get('/admin/addblog', function () {
      return view('admin.addblog');
  });
  Route::get('/admin/addcategory', function () {
      return view('admin.addcategory');
  });
  Route::get('/admin/addproduct', function () {
      return view('admin.addproduct');
  });
  Route::get('/admin/orders', [OrderController::class,'orders']);
  Route::get('/admin/users', [UserController::class,'users']);

  Route::get('/admin/blogs', [BlogController::class,'blogs']);
  Route::post('/submitblog', [BlogController::class,'save']);
  Route::get('/admin/editblog/{id}', [BlogController::class,'edit']);
  Route::put('/updateblog/{id}', [BlogController::class,'update']);
  Route::get('/admin/deleteblog/{id}', [BlogController::class,'delete']);

});
