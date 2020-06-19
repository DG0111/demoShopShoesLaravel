<?php

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

// admin
//->middleware('auth.admin')

Route::namespace('Admin')->middleware(['auth'])->middleware(['role:Super-Admin|Admin|Write'])->prefix('admin')->group(function () {
    Route::get('', 'DashboardController@showDashboard');
    Route::resource('product', 'ProductController');
    Route::patch('search-product','ProductController@search')->name('search-product');

    Route::resource('order', 'OrderController');
    Route::resource('comment', 'CommentController');
    Route::resource('user', 'UserController');
    Route::resource('category', 'CategoryController');
    Route::resource('admin', 'AdminController');
});

Route::get('/test-slug', 'TestController@testSlug')->name('slug');
Route::get('/images', 'ImageController@index');

Auth::routes();

Route::get('', 'HomeController@index')->name('home');

// detail product
Route::get('chi-tiet-san-pham/{slug}', 'HomeController@detailProduct')->name('detailProduct');
Route::get('san-pham/{slug}', 'HomeController@productCate')->name('product_cate');

// cart

Route::post('cart/{id}', 'CartController@addToCart')->name('add-cart');
Route::get('check-out', 'CartController@showCart')->name('check-out');
Route::delete('delete-product-in-cart/{id}', 'CartController@remove')->name('delete-product-in-cart');

Route::patch('update-cart', 'CartController@update');
// comment
Route::post('save-comment', 'CommentController@created')->name('save-comment');

Route::post('create-order', 'OrderController@create')->name('create-order');

//search
Route::post('search', 'HomeController@search')->name('search');

Route::get('export', 'OrderController@export');

