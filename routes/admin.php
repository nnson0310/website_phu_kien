<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use GrahamCampbell\Throttle\Facades\Throttle;

//Login and Logout

Route::get('/logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

Route::get('/login', 'LoginController@getLogin')->name('getLogin')->middleware('CheckLogout');

Route::post('/login', 'LoginController@postLogin')->name('postLogin')->middleware('throttle:3,1');

Route::group(['middleware' => 'CheckLogin'], function(){

    //dashboard

    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard'); 

    Route::post('/password/change', 'LoginController@changePassword')->name('change_password');

    //Category

    Route::group(['prefix' => 'category'], function(){

        Route::get('/add', 'CategoryController@addCategory')->name('add_category');

        Route::get('/list', 'CategoryController@listCategory')->name('list_category');

        Route::post('/list', 'CategoryController@listCategory')->name('list_category');

        Route::post('/save', 'CategoryController@saveCategory')->name('save_category');

        Route::get('/unhide/{cat_id}', 'CategoryController@unhideCategory')->name('unhide_category');

        Route::get('/hide/{cat_id}', 'CategoryController@hideCategory')->name('hide_category');

        Route::get('/delete/{cat_id}', 'CategoryController@deleteCategory')->name('delete_category');

        Route::get('/edit/{cat_id}', 'CategoryController@editCategory')->name('edit_category');

        Route::post('/update/{cat_id}', 'CategoryController@updateCategory')->name('update_category');

        Route::get('/recycle', 'CategoryController@recycleCategory')->name('recycle_category');

        Route::get('/restore/{cat_id}', 'CategoryController@restoreCategory')->name('restore_category');

        Route::get('/hide_all', 'CategoryController@hideAll')->name('hide_all');

    });

    //Brand

    Route::group(['prefix' => 'brand'], function(){

        Route::get('/add', 'BrandController@addBrand')->name('add_brand');

        Route::get('/list', 'BrandController@listBrand')->name('list_brand');

        Route::post('/list', 'BrandController@listBrand')->name('list_brand');

        Route::post('/save', 'BrandController@saveBrand')->name('save_brand');

        Route::get('/unhide/{brand_id}', 'BrandController@unhideBrand')->name('unhide_brand');

        Route::get('/hide/{brand_id}', 'BrandController@hideBrand')->name('hide_brand');

        Route::get('/delete/{brand_id}', 'BrandController@deleteBrand')->name('delete_brand');

        Route::get('/edit/{brand_id}', 'BrandController@editBrand')->name('edit_brand');

        Route::post('/update/{brand_id}', 'BrandController@updateBrand')->name('update_brand');

        Route::post('/sort', ['as' => 'sort_brand', 'uses' => 'BrandController@sortBrand']);

        Route::get('/recycle', ['as' => 'recycle_brand', 'uses' => 'BrandController@recycleBrand']);

        Route::get('/restore/{brand_id}', 'BrandController@restoreBrand')->name('restore_brand');
    });

    //Product

    Route::group(['prefix' => 'product'], function(){

        Route::get('/add', 'ProductController@addProduct')->name('add_product');

        Route::get('/list', 'ProductController@listProduct')->name('list_product');

        Route::post('/list', 'ProductController@listProduct')->name('list_product');

        Route::post('/save', 'ProductController@saveProduct')->name('save_product');

        Route::get('/unhide/{product_id}', 'ProductController@unhideProduct')->name('unhide_product');

        Route::get('/hide/{product_id}', 'ProductController@hideProduct')->name('hide_product');

        Route::get('/delete/{product_id}/{product_image}', 'ProductController@deleteProduct')->name('delete_product');

        Route::get('/edit/{product_id}', 'ProductController@editProduct')->name('edit_product');

        Route::post('/update/{product_id}/{product_image}', 'ProductController@updateProduct')->name('update_product');
        
        Route::get('/recycle', 'ProductController@recycleProduct')->name('recycle_product');

        Route::get('/restore/{product_id}', 'ProductController@restoreProduct')->name('restore_product');

    });

    //Orders

    Route::group(['prefix' => 'orders'], function(){

        Route::get('/status/list/{status}', 'AdminController@showOrders')->name('show_orders');

        Route::get('/list', 'AdminController@showAllOrders')->name('show_all_orders');

        Route::get('/details/{orders_id}', ['as' => 'show_details', 'uses' => 'AdminController@showDetails']);

        Route::post('/status/change/{orders_id}', ['as' => 'change_orders_status', 'uses' => 'AdminController@changeOrdersStatus']);

        Route::post('/product/remove', 'AdminController@removeProduct')->name('remove_product');

        Route::get('/recycle', 'AdminController@recycleOrders')->name('recycle_orders');

        Route::get('/restore/{orders_id}', 'AdminController@restoreOrders')->name('restore_orders');


    });

    //News

    Route::group(['prefix' => 'news'], function(){

        Route::get('/add', 'NewsController@addNews')->name('add_news');

        Route::post('/store', 'NewsController@storeNews')->name('store_news');
    
        Route::get('/list', 'NewsController@listNews')->name('list_news');

        Route::get('/hide/{news_id}', 'NewsController@hideNews')->name('hide_news');

        Route::get('/unhide/{news_id}', 'NewsController@unhideNews')->name('unhide_news');

        Route::delete('/delete/{id}', 'NewsController@deleteNews')->name('delete_news');

        Route::get('/edit/{id}', 'NewsController@editNews')->name('edit_news');

        Route::post('/update', 'NewsController@updateNews')->name('update_news');

        Route::get('/recycle', 'NewsController@recycleNews')->name('recycle_news');

        Route::delete('/force_delete/{id}', 'NewsController@forceDeleteNews')->name('force_delete_news');

        /* Route::get('/force_delete/{id}', 'NewsController@forceDeleteNews')->name('force_delete_news'); */

        Route::get('/restore/{id}', 'NewsController@restoreNews')->name('restore_news');

    });

    //Tags

    Route::group(['prefix' => 'tags'], function(){

        Route::get('/add', 'NewsController@addTags')->name('add_tags');

        Route::post('/create', 'NewsController@createTags')->name('create_tags');

        Route::get('/list', 'NewsController@listTags')->name('list_tags');

        Route::get('/delete/{tags_id}', 'NewsController@deleteTags')->name('delete_tags');

        Route::get('/recycle', 'NewsController@recycleTags')->name('recycle_tags');

        Route::get('/force_delete/{tags_id}', 'NewsController@forceDeleteTags')->name('force_delete_tags');

        Route::get('/restore/{tags_id}', 'NewsController@restoreTags')->name('restore_tags');

        Route::get('/unhide/{tags_id}', 'NewsController@unhideTags')->name('unhide_tags');

        Route::get('/hide/{tags_id}', 'NewsController@hideTags')->name('hide_tags');

    });


    //Upload photo
    Route::post('/upload_photo', 'CKEditorController@uploadPhoto')->name('upload_photo');

    //Customers
    Route::get('/customers/list', 'AdminController@listCustomers')->name('list.customers');

});
