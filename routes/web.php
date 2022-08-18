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

Route::get('locale/{locale}','App\Http\Controllers\MainController@changeLocale')->name('change.locale');
Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/catalog/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/catalog/{category}/{product}', 'App\Http\Controllers\MainController@product')->name('product');

Route::group([
    'prefix' => 'basket'
], function (){
    Route::get('/', 'App\Http\Controllers\BasketController@basket')->name('basket');
    Route::post('/{product}/add', 'App\Http\Controllers\BasketController@addProduct')->name('basket-add');
    Route::post('/{product}/remove', 'App\Http\Controllers\BasketController@removeProduct')->name('basket-remove');
    Route::get('/order/make', 'App\Http\Controllers\BasketController@order')->name('order');
    Route::post('/order/confirm', 'App\Http\Controllers\BasketController@confirmOrder')->name('confirm-order');
});

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'admin'
], function() {
    Route::group([
        'middleware' => 'is_admin',
    ], function (){
        Route::get('home', 'App\Http\Controllers\Admin\OrderController@index')->name('admin.home');
        Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');

        Route::get('category/{category}/product/create', 'App\Http\Controllers\Admin\ProductController@create')->name('product.create');
        Route::get('category/{category}/product/{product}/edit', 'App\Http\Controllers\Admin\ProductController@edit')->name('product.edit');
        Route::put('category/{category}/product/{product}', 'App\Http\Controllers\Admin\ProductController@update')->name('product.update');
        Route::post('category/{category}/product', 'App\Http\Controllers\Admin\ProductController@store')->name('product.store');
        Route::delete('product/{product}', 'App\Http\Controllers\Admin\ProductController@destroy')->name('product.destroy');

        Route::get('category/{category}/attribute/create', 'App\Http\Controllers\Admin\AttributeController@create')->name('attribute.create');
        Route::get('category/{category}/attribute/{attribute}/edit', 'App\Http\Controllers\Admin\AttributeController@edit')->name('attribute.edit');
        Route::put('category/{category}/attribute/{attribute}', 'App\Http\Controllers\Admin\AttributeController@update')->name('attribute.update');
        Route::post('category/{category}/attribute', 'App\Http\Controllers\Admin\AttributeController@store')->name('attribute.store');
        Route::delete('attribute/{attribute}', 'App\Http\Controllers\Admin\AttributeController@destroy')->name('attribute.destroy');
    });
});



