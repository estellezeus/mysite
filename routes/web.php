<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::post('/donate', [HomeController::class, 'donate'])->name('donate');
Route::post('/check-donate-status', [HomeController::class, 'checkTransactionStatus'])->name('check-donate-status');
Route::get('/books-list', [HomeController::class, 'booksList'])->name('books');
Route::get('/books-detail/{id}', [HomeController::class, 'bookDetails'])->name('book-details');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
});
