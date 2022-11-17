<?php


use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\StoreController;
use App\Http\Controllers\Front\OrderController;
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


Route::get('/change-language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('lang', $locale);
    return back();
});

Route::get('/',HomeController::class);

//products
Route::get('/all-products',[HomeController::class,'all_products']);
Route::get('/search',[HomeController::class,'search']);

// stores
Route::get('/all-stores',[StoreController::class,'index']);
Route::get('/create-store',[StoreController::class,'create']);
Route::post('/create-store',[StoreController::class,'store'])->name('store');



Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'dologin'])->name('do_login');
Route::get('/profile',[AuthController::class,'profile']);
Route::post('/update-profile',[AuthController::class,'update_profile'])->name('update-profile');



Auth::routes(['login' => false]);


Route::get('/orders',OrderController::class);



Route::get('/pages',[HomeController::class,'pages']);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* cart */
Route::post('cart', [CartController::class,'send_cart'])->name('cart');
Route::get('get_one_cart_/{id}', [CartController::class,'get_one_cart_']);
Route::get('get_cart_', [CartController::class,'get_cart_']);
Route::get('view-cart', [CartController::class,'get_cart'])->name('Get-cart');
Route::get('get_header_cart', [CartController::class,'get_header_cart'])->name('get_header_cart');
Route::post('update_cart', [CartController::class,'update_cart'])->name('update_cart');
Route::get('get_ajax_cart/{id}', [CartController::class,'get_ajax_cart']);
Route::get('delete_cart', [CartController::class,'delete_cart'])->name('delete_cart');
Route::get('show-product', [ProductController::class,'show_product'])->name('show-product');
