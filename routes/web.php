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


use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('admin.dashboard');
});
Route::resource('categories','CategoryController');
Route::resource('users','UserController');


Route::prefix('/product')->group(function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/create', 'ProductController@store')->name('product.store');
    Route::get('/{id}/update', 'ProductController@edit')->name('product.edit');
    Route::post('/{id}/update', 'ProductController@update')->name('product.update');
    Route::get('/{id}/delete', 'ProductController@destroy')->name('product.destroy');
    Route::get('{id}/show', 'ProductController@show')->name('product.show');
    Route::get('/search', 'ProductController@search')->name('product.search');
});
