<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;

// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute untuk home
Route::get('/home', [UserController::class, 'index'])->name('home');

// Static Pages
Route::get('/about', function () {
    return view('about');
});

// Rute untuk Transaksi dengan callback Midtrans dan batal
Route::post('/midtrans/callback', [TransaksiController::class, 'callback']);
Route::get('/transaksis/{id}/batal', [TransaksiController::class, 'batal'])->name('transaksis.batal');

// Rute resource untuk CRUD controller
Route::resource('/products', ProductController::class);
Route::resource('/transaksis', TransaksiController::class);
Route::resource('/laporans', LaporanController::class);
Route::resource('/barangs', BarangController::class);

// Rute custom tambahan untuk Barang Keluar
Route::get('/barangkeluars/create', [BarangKeluarController::class, 'create'])->name('barangkeluars.create');
Route::post('/barangkeluars', [BarangKeluarController::class, 'store'])->name('barangkeluars.store');

// Rute untuk laporan dengan prefix "laporans"
Route::prefix('laporans')->name('laporans.')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('index');
    Route::get('/filter', [LaporanController::class, 'filter'])->name('filter');
    Route::post('/filter', [LaporanController::class, 'processFilter'])->name('processFilter');
    Route::get('/{id}', [LaporanController::class, 'show'])->name('show');
    Route::delete('/{id}', [LaporanController::class, 'destroy'])->name('destroy');
    // Route untuk menampilkan form create laporan
Route::get('/laporans/create', [LaporanController::class, 'create'])->name('laporans.create');

// Route untuk menyimpan laporan baru
Route::post('/laporans', [LaporanController::class, 'store'])->name('laporans.store');

});

// Rute untuk halaman admin
Route::get('/admin/mulai', [App\Http\Controllers\AdminController::class, 'mulai']);

// Rute untuk user authentication
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::get('barangmasuks/create', [BarangmasukController::class, 'create'])->name('barangmasuks.create');