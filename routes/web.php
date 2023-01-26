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

Route::get('/home', 'ArticleController@showHome')->name('home');
Route::get('/regist', 'CompanyController@showCompany')->name('regist');
Route::get('/regist','ArticleController@showRegistForm')->name('regist');
Route::get('/regist','CompanyController@showCompanyForm')->name('regist');
Route::post('/regist','ArticleController@registSubmit')->name('submit');
Route::post('/regist','CompanyController@registCompanySubmit')->name('submit');
