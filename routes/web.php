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
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
    Auth::routes();
    Route::get('index', [ProductController::class, 'index'])->name('index');
    Route::get('create', [ProductController::class, 'create']);
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('store', [ProductController::class, 'store'])->name('store');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');



