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

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('', 'DashboardController@showDashboard');
    Route::resource('product', 'ProductController');
    Route::resource('order', 'OrderController');
    Route::resource('comment', 'CommentController');
    Route::resource('user', 'UserController');
    Route::resource('category', 'CategoryController');
});
////login
//Route::get('login','Auth\LoginController@login');
//Route::post('login','Auth\LoginController@postLogin');
//Test
Route::get('/test-slug', 'TestController@testSlug')->name('slug');
Route::get('/images', 'ImageController@index');
//Auth::routes();

Route::get('', 'HomeController@index')->name('home');





// detail product
Route::get('chi-tiet-san-pham/{slug}', 'HomeController@detailProduct')->name('detailProduct');
Route::get('san-pham/{slug}', 'HomeController@productCate')->name('product_cate');


// auth login logout Son
Route::get('/login', 'AuthCustom\AuthController@Login')->name('Auth.Login');
Route::post('/checkLogin', 'AuthCustom\AuthController@checkLogin');
Route::get('/logout', 'AuthCustom\AuthController@Logout')->name('Auth.Logout');


