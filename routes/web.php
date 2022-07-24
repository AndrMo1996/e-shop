<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'reset'   => false,
    'confirm' => false,
    'verify'  => false
]);

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout-get');

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'admin'
], function() {
    Route::group([
        'middleware' => 'is_admin',
    ], function (){
        Route::get('/home', 'App\Http\Controllers\Admin\OrderController@index')->name('admin-home');
    });
});

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/catalog/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/catalog/{category}/{product}', 'App\Http\Controllers\MainController@product')->name('product');

Route::group([
    'prefix' => 'basket'
], function (){
    Route::get('/', 'App\Http\Controllers\BasketController@basket')->name('basket');
    Route::post('/add/{id}', 'App\Http\Controllers\BasketController@addProductToBasket')->name('add-to-basket');
    Route::post('/{id}/add', 'App\Http\Controllers\BasketController@addProduct')->name('basket-add');
    Route::post('/{id}/remove', 'App\Http\Controllers\BasketController@removeProduct')->name('basket-remove');
    Route::get('/order/make', 'App\Http\Controllers\BasketController@order')->name('order');
    Route::post('/order/confirm', 'App\Http\Controllers\BasketController@confirmOrder')->name('confirm-order');
});


