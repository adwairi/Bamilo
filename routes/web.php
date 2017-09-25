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

Route::get('/',function (){
    return view('welcome');
});
Route::get('/data', 'HomeController@index')->name('home');
//Route::POST('/', 'HomeController@filter')->name('home');

Auth::routes();


Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');
Route::resource('attribute', 'AttributeController');
Route::resource('productAttributes', 'ProductAttributesController');
Route::resource('attributeOptions', 'AttributeOptionsController');
Route::resource('cart', 'CartController');
Route::POST('productValidation', 'ProductController@validation')->name('productValidation');
