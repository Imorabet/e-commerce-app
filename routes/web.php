<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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

Route::get('/', [CategoryController::class ,'index'])->name('welcome');
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
})->middleware(['auth','admin'])->name('admin.dashboard');
Route::get('/logout',[UserController::class,'logout']);

Route::get('/all-products',[ProductController::class,'getProducts'])->middleware(['auth','admin'])->name('product.all');
Route::get('/add-product',[ProductController::class,'getCategories'])->middleware(['auth','admin']);
Route::post('/add-product',[ProductController::class,'add'])->middleware(['auth','admin'])->name('product.add');
Route::delete('/delete-product/{id}',[ProductController::class,'destroy'])->middleware(['auth','admin'])->name('product.delete');

Route::get('/add-category',function(){
    return view('Layouts.Admin.addCategory');
})->middleware(['auth','admin']);
Route::get('/all-categories',[CategoryController::class,'getCategories'])->middleware(['auth','admin'])->name('category.all');
Route::post('/add-category',[CategoryController::class,'add'])->middleware(['auth','admin'])->name('category.add');
Route::delete('/delete-category/{id}',[CategoryController::class,'destroy'])->middleware(['auth','admin'])->name('category.delete');

