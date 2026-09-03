<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\TentangController;

//route yang bisa diakses ketika user belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'login'])->name('auth');
});

// route yang bisa diakses ketika user sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
       
    });
     Route::middleware('role:admin,kasir')->group(function () {

    Route::resource('/produk', ProdukController::class);

    Route::resource('/penjualan', PenjualanController::class);

    Route::resource('/itempenjualan', ItemPenjualanController::class);

    Route::get('/tentang', [TentangController::class, 'index'])
        ->name('tentang');

    // =====================================================
    // JENIS PRODUK - ADMIN & KASIR HANYA BISA MELIHAT
    // =====================================================
    Route::get('/jenis-produk', [JenisProdukController::class, 'index'])
        ->name('jenis-produk.index');
});


// =========================================================
// JENIS PRODUK - KHUSUS ADMIN
// =========================================================
Route::middleware('role:admin')->group(function () {

    Route::get('/jenis-produk/create', [JenisProdukController::class, 'create'])
        ->name('jenis-produk.create');

    Route::post('/jenis-produk', [JenisProdukController::class, 'store'])
        ->name('jenis-produk.store');

    Route::get('/jenis-produk/{jenisProduk}/edit', [JenisProdukController::class, 'edit'])
        ->name('jenis-produk.edit');

    Route::put('/jenis-produk/{jenisProduk}', [JenisProdukController::class, 'update'])
        ->name('jenis-produk.update');

    Route::delete('/jenis-produk/{jenisProduk}', [JenisProdukController::class, 'destroy'])
        ->name('jenis-produk.destroy');
});
});
