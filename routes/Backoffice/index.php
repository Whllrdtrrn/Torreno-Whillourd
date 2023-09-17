<?php

use App\Http\Controllers\Backoffice\LibraryController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Auth;
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

// Register a route for the '/admin' endpoint
Route::get('/admin', function () {
    // Check if the user is authenticated
    if (Auth::check()) {
        // If authenticated, redirect the user to the '/admin/news' page
        return redirect('/admin/book');
    }
    // If not authenticated, redirect the user to the login page
    return redirect('/login');
});

// Register authentication routes but disable the registration feature
Auth::routes(['register' => true]);

Route::middleware(['auth','check.user.access','redirect.to.404'])->group(function () {

    Route::prefix('/admin')->name('backoffice.')->group(function () {
        

        Route::prefix('/books')->name('books.')->group(function () {
            // Get Method
            Route::get('/', [LibraryController::class, 'index'])->name('index');
            Route::get('/create', [LibraryController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [LibraryController::class, 'edit'])->name('edit');
            Route::get('delete/{id?}', [LibraryController::class, 'destroy'])->name('destroy');

            // POST Method
            Route::post('create', [LibraryController::class, 'store']);
            Route::post('edit/{id}', [LibraryController::class, 'update']);

        });
        Route::prefix('/users')->name('users.')->group(function () {
            // Get Method
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/update-user-status', [UserController::class, 'updateUserStatus']);

        });
        


        
    });
});