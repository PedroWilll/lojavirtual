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

/*Route::get('/', function () {
    return view('product');
});*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Products
//Route::resource('product','ProductController');
Route::get('/product', function () {
    return view('product');
});
Route::Post('/product','ProductController@store');

//Retailer
Route::get('/retailer', function() {
    return view('retailer');
});
//Route::Post('/retailer', 'oi');