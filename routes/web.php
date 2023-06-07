<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/buku/data-buku', function () {
    return view('admin.buku');
});

Route::get('/buku/data-peminjaman', function () {
    return view('admin.peminjamanBuku');
});

Route::get('/admin', [AdminController::class, 'showAdmin']);
Route::get('/user', [UserNewController::class, 'showUser']);
Route::resource('books', BookController::class);
Route::resource('comments', CommentController::class);
Route::resource('users', UserController::class);
Route::resource('transactions', TransactionController::class);
