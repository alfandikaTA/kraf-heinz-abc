<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BarangController as AdminBarangController;
use App\Http\Controllers\Admin\PesananController as AdminPesananController;
use App\Http\Controllers\Admin\TokoController as AdminTokoController;
use App\Http\Middleware\AdminIsLogin;
use App\Http\Middleware\AdminIsNotLogin;

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

  Route::namespace('Auth')->middleware(AdminIsNotLogin::class)->group(function(){
    // Login
    Route::get('/', [AdminAuthController::class, 'index'])->name('login');
    Route::post('/', [AdminAuthController::class, 'login'])->name('login');
  });

  Route::namespace('Auth')->middleware(AdminIsLogin::class)->group(function(){
    // Auth 
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Dashboard 
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Barang
    Route::get('/barang', [AdminBarangController::class, 'index'])->name('barang');
    Route::post('/barang', [AdminBarangController::class, 'add'])->name('barang-add');
    // Route::patch('/barang', [AdminBarangController::class, 'update'])->name('barang-update');
    Route::delete('/barang/{id}', [AdminBarangController::class, 'delete'])->name('barang-delete');


    // Pesanan 
    Route::get('/pesanan', [AdminPesananController::class, 'index'])->name('pesanan');

    // Toko 
    Route::get('/toko', [AdminTokoController::class, 'index'])->name('toko');
  });

});

?>