<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;

// Guest: hanya bisa akses login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.handle');
    Route::get('/', fn() => redirect()->route('login'));
});

// Auth: hanya bisa akses jika sudah login
Route::middleware('auth')->group(function () {
    Route::get('/', fn() => redirect()->route('pemesanan.index')); // Home diarahkan ke pemesanan
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('bahan-baku', BahanBakuController::class);
    Route::post('/logout', [AuthController::class, 'handleLogout'])->name('logout');
});
