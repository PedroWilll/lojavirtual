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
Route::get('/product', 'ProductController@index'); //view
Route::Post('/product','ProductController@store'); //post
Route::get('/product/edit/{id}','ProductController@edit'); //edit
Route::Post('/product/{id}','ProductController@update'); //save edit
Route::delete('/product/{id}','ProductController@destroy'); //save edit
//Retailer
Route::get('/retailer', 'RetailerController@index'); //view
Route::Post('/retailer', 'RetailerController@store'); //post
Route::get('/retailer/edit/{id}', 'RetailerController@edit'); //edit
Route::Post('/retailer/{id}', 'RetailerController@update'); //post
Route::delete('/retailer/{id}', 'RetailerController@destroy'); //delete