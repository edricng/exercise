<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/add', function () {
    return view('add_weight');
});
Route::get('/', 'IndexController@index');
Route::get('/weight/{uuid}', 'WeightController@show');
Route::post('/weight', 'WeightController@store');
Route::post('/update-weight/{uuid}', 'WeightController@update');
Route::post('/delete-weight', 'WeightController@delete');


Route::get('/add-product', function () {
    return view('add_product');
});
Route::post('/product', 'ProductController@store');
Route::post('/cart', 'ProductController@cart');
Route::get('/view-cart', 'ProductController@showCart');
Route::get('/remove-item/{uuid}', 'ProductController@removeItem');


Route::post('/number', 'NumberController@generate');