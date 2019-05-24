<?php

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

Route::get('/', 'HomeController@index');

Route::resource('/products', 'ProductsController');

Route::get('/users/{user}', 'UserController@show')->name('user');
Route::get('/users/{user}/cart', 'CartController@index');
Route::post('/users/{user}/charge', 'CartController@charge')->name('charge');
// route for sending email to customer service
Route::post('/users/{user}/contact', 'UserController@contact');
// route for updating profile
Route::put('/users/{user}/profile', 'UserController@update')->name('update_profile');
Route::post('/users/{user}/cart/item/{item}', 'OrderlineController@store')->name('add_item');

Route::delete('/users/{user}/orders/{order}/item/{item}', 'OrderlineController@destroy')->name('delete_item');

Auth::routes();
