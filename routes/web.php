<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'LandingPageController@index')->name('LandingPage');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/search', 'ShopController@search')->name('shop.search');
Route::get('/shop/{abc}', 'ShopController@show')->name('shop.show');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::post('/testorder', 'TestController@store')->name('test.store');
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

Route::post('/coupen', 'CoupenController@store')->name('coupen.store');
Route::delete('/coupen', 'CoupenController@destroy')->name('coupen.delete');


 Route::get('/destroy', function () {
     Cart::destroy();
    });




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
