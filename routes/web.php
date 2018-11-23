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

Route::get('/', [
'uses' => 'FrontEndController@index',
'as' =>'index'
]);

Route::get('product/{id}', [
    'uses' => 'FrontEndController@singleProduct',
    'as' => 'product.single'
]);

Route::post('/card/add', [
    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);
Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@addRapid',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as' =>'cart'
]);

Route::get('/cart/delete/{id}', [
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

/// checkoutssss

Route::get('/cart/checkout', [
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::resource('products', 'ProductsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
