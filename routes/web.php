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
Auth::routes();
Route::get('index','ProductController@index')->name('index');
Route::get('create','ProductController@create');
Route::get('/show/{id}','ProductController@show')->name('index.show');
Route::get('/edit/{id}','ProductController@edit')->name('index.edit');
Route::post('store','ProductController@store')->name('index.store');
Route::post('/update/{id}','ProductController@update')->name('index.update');
Route::post('/destroy/{id}','ProductController@destroy')->name('index.destroy');


