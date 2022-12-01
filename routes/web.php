<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PamegtosController;
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

Route::middleware('auth')->group(function () {

    Route::get('/',[HomeController::class, 'index'])->name('home');

    Route::resource('books', BookController::class);
    Route::get('/admin',[BookController::class, 'index'])->name('admin.books');
    Route::resource('categories', CategoryController::class);
    Route::get('/image/{name}',[BookController::class, 'display']) ->name('images');



    Route::get('/knygos',[BookController::class, 'userBooks'])->name('user.books');
    Route::put('rezervuoti/{add}', [OrderController::class, 'rezervuoti'])->name('rezervuoti');
    Route::put('pamegti/{add}', [OrderController::class, 'pamegti'])->name('pamegti');
    Route::post('books/search',[BookController::class, 'findBook'])->name('find.book');
    Route::resource('orders', OrderController::class);
    Route::resource('pamegtos', PamegtosController::class);
});

Auth::routes();
