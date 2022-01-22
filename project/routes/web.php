<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\BarangController as UserBarangController;



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

Route::name('user.')->namespace('User')->group(function () {

    Route::namespace('Auth')->group(function () {
        // Login
        Route::get('/', [UserAuthController::class, 'index'])->name('login');
        Route::post('/', [UserAuthController::class, 'login'])->name('login-act');

        // Register 
        Route::get('/register', [UserAuthController::class, 'indexRegister'])->name('register');
        Route::post('/register', [UserAuthController::class, 'register'])->name('register-act');
    });

    Route::namespace('Auth')->group(function () {
        // Auth 
        Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

        // Dashboard 
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

        // Barang
        Route::get('/barang', [UserBarangController::class, 'index'])->name('barang');
    });
});