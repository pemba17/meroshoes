<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\PhotoController;

use App\Http\Controllers\FrontController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\SellerController;

use App\Http\Controllers\CustomerController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\PasswordController;

use App\Http\Controllers\Auth\SocialController;

use App\Http\Controllers\BillController;

use Illuminate\Support\Facades\Input;

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

Route::get('/',[FrontController::class,'home'])->name('front.home');

Route::get('/product-detail/{id}',[FrontController::class,'productDetail'])->name('front.product-detail');

Route::get('/types',function(){

return view('frontend.pages.types');

})->name('types');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('backend.adminDashboard');


Route::resource('/products',ProductController::class);

Route::resource('/photos',PhotoController::class);

Route::get('/seller/dashboard',[SellerController::class,'dashboard'])->name('backend.sellerDashboard');


Route::get('/customer/dashboard',[CustomerController::class,'dashboard'])->name('backend.customerDashboard');


Route::resource('/users',UserController::class);

Route::resource('/userpassword',PasswordController::class);

Route::post('addCart',[CartController::class,'storeCart'])->name('addCart')->middleware('auth');

Route::get('/carts',[CartController::class,'cart'])->name('front.cart')->middleware('auth');

Route::delete('/deleteCart/{number}',[CartController::class,'deleteCart'])->name('deleteCart');

Route::put('/updateCart/{cart}',[CartController::class,'updateCart'])->name('updateCart');


Auth::routes(['verify'=>true]);

Route::get('/home',function(){

	return view('home');
});

Route::get('login/{service}', [SocialController::class, 'redirectToProvider']);
Route::get('login/{service}/callback', [SocialController::class, 'handleProviderCallback']);


Route::resource('checkout',BillController::class);

Route::get('/order-complete',function(){

return view('frontend.pages.ordercomplete');
})->name('ordercomplete');

