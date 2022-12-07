<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'AdminMiddleware'], function () {
    Route::get('user/index', [UserController::class, 'index'])->name('index.user');
    Route::get('user/create',[UserController::class, 'create'])->name('create.user');
    Route::post('user/create',[UserController::class, 'store'])->name('store.user');
    Route::get('user/edit/{id}',[UserController::class, 'edit'])->name('edit.user');
    Route::put('user/edit/{id}',[UserController::class, 'update'])->name('update.user');
    Route::get('user/{id}',[UserController::class, 'show'])->name('show.user');
    Route::delete('user/delete/{user_id}',[UserController::class, 'destroy'])->name('destroy.user');
});

Route::group(['prefix' => 'almacenista', 'middleware' => 'AlmacenistaMiddleware'], function () {
    Route::get('product/index', [ProductsController::class, 'index'])->name('index.product');
    Route::get('product/create',[ProductsController::class, 'create'])->name('create.product');
    Route::post('product/create',[ProductsController::class, 'store'])->name('store.product');
    Route::get('product/edit/{id}',[ProductsController::class, 'edit'])->name('edit.product');
    Route::put('product/edit/{id}',[ProductsController::class, 'update'])->name('update.product');
    Route::get('product/{id}',[ProductsController::class, 'show'])->name('show.product');
    Route::delete('product/delete/{id}',[ProductsController::class, 'destroy'])->name('destroy.product');
    Route::post('product/reporte',[ProductsController::class, 'reporte'])->name('reporte.product');
    Route::view('reportes', 'products.reporte');
});
