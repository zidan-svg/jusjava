<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BarangKeluarController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('barangkeluars', BarangKeluarController::class);
Route::resource('/products', ProductController::class);
Route::resource('/transaksis', TransaksiController::class);
Route::resource('/laporans', LaporanController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [UserController::class, 'index'])->name('home');

// Static Pages
Route::get('/about', function () {
    return view('about');
});

// Custom Routes
Route::post('/midtrans/callback', [TransaksiController::class, 'callback']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Transaksi route with cancel action
Route::get('/transaksis/{id}/batal', [TransaksiController::class, 'batal'])->name('transaksis.batal');
