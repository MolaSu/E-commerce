<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home.index');
});


Route::controller(AuthController::class)->group(function(){
    Route::any('/auth/register','register');
    Route::any('/auth/login','login');
    Route::any('/auth/logout','logout');
    Route::get('/auth','index');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/category','index');
    Route::any('/category/add','add');
    Route::get('/category/delete/{CategoryId}','delete');
    Route::any('/category/edit/{CategoryId}','edit');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/product','index');
    Route::any('/product/add','add');
    Route::any('/product/edit/{id}','edit');
    Route::any('/product/delete/{id}','delete');
});

Route::controller(ControllersHomeController::class)->group(function(){
    Route::get('/home','index');
    route::get('/home/shop','shop');
    route::get('/home/category/{id}','category');
    route::get('/home/details/{id}','details');
});

Route::controller(CartController::class)->group(function(){
    Route::get('/cart','index');
    Route::post('/cart/add','add');
    Route::any('/cart/edit','edit');
    Route::get('/cart/delete/{o}','delete');
    Route::any('/cart/checkout','doCheckout');
    Route::get('/cart/checkout','checkout');
    Route::any('/cart/districts','districts');
    Route::post('/cart/wards','wards');
    Route::get('/cart/invoice/{id}','invoice');

    //Route::any('/cart/delete','doDelete');
});
