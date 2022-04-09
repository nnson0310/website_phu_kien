<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use GrahamCampbell\Throttle\Facades\Throttle;

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


///Dieu huong 404 cho tat ca URL khong hop le
Route::fallback('HomeController@notFound')->name('page404');

/////Trang chu
Route::get('', ['as' => 'home_page', 'uses' => 'HomeController@index']);

//show products

Route::get('/category/{cat_id}','CategoryController@showCatProduct')->name('show_cat_product');
 
Route::get('/brand/{brand_id}','BrandController@showBrandProduct')->name('show_brand_product');

Route::get('/product_details/{product_id}/{brand_id}/{cat_id}','ProductController@showProductDetails')->name('product_details');