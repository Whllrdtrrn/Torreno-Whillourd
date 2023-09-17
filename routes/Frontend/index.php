<?php

use App\Http\Controllers\Frontend\LibraryController;
use App\Http\Controllers\Frontend\MybookController;
use App\Http\Controllers\Frontend\ProfileController;


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
Route::middleware(['auth', 'user'])->group(function () {
    Route::prefix('/')->name('book.')->group(function () {
        Route::get('/', [LibraryController::class, 'index'])->name('index');
        Route::post('/borrow-book', [LibraryController::class, 'borrowBook'])->name('borrowBook');

    });
    Route::prefix('/my-book')->name('mybook.')->group(function () {
        Route::get('/', [MybookController::class, 'index'])->name('index');
        Route::get('return-book/{id?}', [MybookController::class, 'return_book'])->name('return_book');
        Route::get('view/{book_id?}', [MybookController::class, 'view_book'])->name('view_book');

    });
    Route::prefix('/profile')->name('profile.')->group(function () {
        // Get Method
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        // Disabled
        Route::get('/disable-account', [ProfileController::class, 'disable_account'])->name('disable_account');
        // POST Method for Profile Update
        Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');

    });
});