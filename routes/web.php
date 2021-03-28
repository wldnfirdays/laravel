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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/book',
    [App\Http\Controllers\HomeController::class, 'buku']
    )->name('buku')->middleware('auth');

Route::get('admin/home', [App\Http\Controllers\AdminController::class,
'index'])
        ->name('admin.home')
        ->middleware('is_admin');

Route::get('admin/books', [App\Http\Controllers\AdminController::class,
'books'])
        ->name('admin.books')
        ->middleware('is_admin');        

//PENGELOLA BUKU
Route::get('admin/books', [App\Http\Controllers\AdminController::class,
'submit_book'])
        ->name('admin.book.submit')
        ->middleware('is_admin');