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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Products
//Route::resource('product','ProductController');
Route::get('/product', 'ProductController@index');
Route::Post('/product','ProductController@store');
Route::get('/product/edit/{id}','ProductController@edit');
//Retailer
Route::get('/retailer', 'RetailerController@index');
Route::Post('/retailer', 'RetailerController@store');
Route::get('/retailer/{id}', 'RetailerController@edit');