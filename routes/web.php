<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNewController;
use App\Models\Transaction;
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
    return view('auth.login');
});

//route admin
Route::resource('admin', AdminController::class)->middleware('admin');
// Route::get('/user', [UserNewController::class, 'showUser'])->middleware('admin');
Route::resource('books', BookController::class)->middleware('admin');
Route::resource('comments', CommentController::class)->middleware('admin');
Route::resource('users', UserController::class)->middleware('admin');
Route::get('/dashboard', [UserController::class, 'showDashboard'])->middleware('admin');
Route::resource('transactions', TransactionController::class)->middleware('admin');
Route::get('/brwTransactions/{id}', [TransactionController::class, 'borrowedTransaction'])->name('borrowed')->middleware('admin');
Route::get('/rtnTransactions/{id}', [TransactionController::class, 'returnedTransaction'])->name('returned')->middleware('admin');

//route user
Route::get('/home', [UserNewController::class, 'home'])->name('home')->middleware('auth');
Route::get('/category/{categories}', [UserNewController::class, 'bookCategories'])->middleware('auth');
Route::get('/BookDetail/{id}', [UserNewController::class, 'bookDetail'])->name('bookDetail')->middleware('auth');
Route::get('/booking/{id}', [UserNewController::class, 'showBookingForm'])->name('bookingForm')->middleware('auth');
Route::post('/booking', [UserNewController::class, 'bookingBook'])->name('bookingBook')->middleware('auth');
Route::post('/comment/{id}', [UserNewController::class, 'komentar'])->name('comment')->middleware('auth');


//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
