<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use GrahamCampbell\Throttle\Facades\Throttle;

/////////////////////////////Front-end 
    
    //Cart

    Route::group(['prefix' => 'cart'], function(){

        Route::post('/save', 'CartController@saveCart')->name('save_cart');

        Route::get('/show', 'CartController@showCart')->name('show_cart');

        Route::post('/save_direct', 'CartController@saveCartDirect')->name('save_cart_direct');

        Route::get('/delete/{rowId}', 'CartController@deleteCart')->name('delete_cart');

        Route::get('/delete_all', 'CartController@deleteAllCart')->name('delete_all_cart');

        Route::post('/update', 'CartController@updateCart')->name('update_cart');

    });

    //Register, Login, Logout

    Route::get('/get_login', 'UserController@getLogin')->name('get_login');

    Route::get('/get_register', 'UserController@getRegister')->name('get_register');

    Route::post('/post_register', 'UserController@postRegister')->name('post_register');

    Route::post('/post_login', 'UserController@postLogin')->name('post_login')->middleware('throttle:3,1');

    Route::get('/register_success', 'UserController@registerSuccess')->name('register_success');

    Route::get('/logout', 'UserController@logout')->name('user_logout');

    //Search

    Route::post('/search/keywords', 'HomeController@searchByKeywords')->name('search_by_keywords');

    Route::get('/search/price/{range}', 'HomeController@searchByPrice')->name('search.price');

    //Orders

    Route::get('/checkout_login', 'CheckOutController@checkOutLogin')->name('checkout_login');

    Route::get('/checkout_form', 'CheckOutController@checkOutForm')->name('checkout_form');

    Route::post('/orders/add', 'CheckOutController@addOrders')->name('add_orders')->middleware('CheckLoginUser');

    Route::get('/orders/success', 'CheckOutController@ordersSuccess')->name('orders_success')->middleware('CheckLoginUser');

    //News

    Route::group(['prefix' => 'news'], function(){

        Route::get('/show', ['as' => 'show_news', 'uses' => 'UserController@showNews']);

        Route::get('/details/{news_id}', ['as' => 'show_news_details', 'uses' => 'UserController@showNewsDetails' ]);

        Route::post('/comments/add', 'UserController@addComments')->name('add_comments')->middleware('CheckLoginUser');

    });

    //User

    Route::group(['prefix' => 'profile'], function(){

        Route::get('/details/{user_id}', ['as' => 'user_profile', 'uses' => 'UserController@userProfile']);

        Route::post('/update', 'UserController@updateProfile')->name('update_profile');

    });

    //Review product

    Route::post('/product/reviews', 'UserController@productReviews')->name('product.reviews')->middleware('CheckLoginUser');

    //Log in with google

    Route::get('/google/login', 'AuthController@googleLogin')->name('google.login');

    Route::get('/google/callback', 'AuthController@googleCallback')->name('google.callback');

    
  

