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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/post','ProductController');

//
Route::get('/home', 'ProductController@showHome')->name('home');


//詳細画面を表示
Route::get('/detail', 'DetailController@showDetail')->name('detail');

