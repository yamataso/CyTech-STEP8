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
//データを表示
Route::get('/home', 'ArticleController@showHome')->name('home');
Route::get('/regist', 'CompanyController@showCompany')->name('regist');
//登録画面を表示
Route::post('/regist','CompanyController@showCompanyForm')->name('regist');

//詳細画面を表示
Route::get('/detail', 'DetailController@showDetail')->name('detail');


//ボタンの動作
Route::post('/regist','ArticleController@registSubmit')->name('submit');
Route::post('/regist','CompanyController@registCompanySubmit')->name('submit');
