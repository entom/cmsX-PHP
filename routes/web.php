<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','Front@index');
Route::get('/products','Front@products');
Route::get('/products/details/{id}','Front@product_details');
Route::get('/products/categories','Front@product_categories');
Route::get('/products/brands','Front@product_brands');
Route::get('/blog','Front@blog');
Route::get('/blog/post/{id}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/cart','Front@cart');
Route::get('/checkout','Front@checkout');
Route::get('/search/{query}','Front@search');

Route::get('hello', 'Hello@index');
Route::get('/hello/{name}', 'Hello@show');

Route::get('blade', function() {
    return view('page', array('name' => 'Thomas'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['namespace'=>'Admin'], function()
{
    Route::get('/admin/login', ['as' => 'admin', 'uses' => 'Login@login']);
    Route::post('/admin/login', ['as' => 'admin', 'uses' => 'Login@postLogin']);
    Route::get('/admin', ['middleware' => ['admin'], 'as' => 'admin', 'uses' => 'Dashboard@home']);

    Route::resource('/admin/users', 'UsersController');
    Route::resource('/admin/sites', 'SitesController');
});

Route::resource('admin/blogs', 'Admin\\BlogsController');