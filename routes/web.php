<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [CategoryController::class ,'index']);
Route::fallback(function () {
    return response()->view('errors', [], 404);
});
Route::get('/products',
[ProductController::class ,'index']);
Route::get('/login',function(){
    return view('Auth.login');
})->name('login.n');
Route::post('/login', [UserController::class,'login'])->name('login.user');

Route::get('/signup',function(){
    return view('Auth.signup');
});
Route::post('/signup', [UserController::class,'register'])->name('register.user');
Route::get('/admin',function(){
    return view('Layouts.Admin.dashboard');
})->middleware('auth')->name('admin.dashboard');
Route::get('/logout',[UserController::class,'logout']);