<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController as UserAuthController;;



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

Route::name('user.')->namespace('User')->prefix('user')->group(function () {

    Route::namespace('Auth')->group(function () {
        // Login
        Route::get('/', [UserAuthController::class, 'index'])->name('login');
        Route::post('/', [UserAuthController::class, 'login'])->name('login');
        Route::get('/', [UserAuthController::class, 'indexreq'])->name('login');
        Route::get('/register', [UserAuthController::class, 'register'])->name('login');
    });

    Route::namespace('Auth')->group(function () {
        // Auth 
        Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

        // Dashboard 
        Route::get('/dashboard', [UserAuthController::class, 'index'])->name('dashboard');

        // Barang
        Route::get('/barang', [UserAuthController::class, 'index'])->name('barang');
    });
});