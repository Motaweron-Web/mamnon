<?php

use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
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

Route::get('/',HomeController::class);
Route::get('/all-products',[HomeController::class,'all_products']);
Route::get('/all-stores',[HomeController::class,'all_stores']);
Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'dologin'])->name('do_login');

Route::get('/display', function(){
    $students = app('firebase.firestore')->database()->collection('admin_user')->documents();
    foreach ($students as $student) {
        print_r('Student ID =' . $student->id());
        print_r("<br>" . 'Student Name = ' . $student->data()['firstName']);
        print_r("<br>" . 'Student Age = ' . $student->data()['lastName']);
    }
});

Auth::routes(['login' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
