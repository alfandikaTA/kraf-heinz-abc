<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BarangController as AdminBarangController;
use App\Http\Controllers\Admin\PesananController as AdminPesananController;
use App\Http\Controllers\Admin\TokoController as AdminTokoController;

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

Route::get('/', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

Route::prefix('admin')->name('admin.')->group(function () {
  Route::get('/', [AdminAuthController::class, 'login'])->name('login');
  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::get('/barang', [AdminBarangController::class, 'index'])->name('barang');
  Route::get('/pesanan', [AdminPesananController::class, 'index'])->name('pesanan');
  Route::get('/toko', [AdminTokoController::class, 'index'])->name('toko');
});