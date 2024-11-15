<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function() {
    Route::get('/', [UsersController::class, 'index'])->name('users_index');
    Route::get('/create', [UsersController::class, 'create'])->name('users_create');
    Route::post('/store', [UsersController::class, 'store'])->name('users_store');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users_edit');
    Route::post('/update/{id}', [UsersController::class, 'update'])->name('users_update');
});

require __DIR__.'/auth.php';
