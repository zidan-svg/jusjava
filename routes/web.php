<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BarangKeluarController;
// Rute untuk halaman utama

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
Route::post('/barangkeluars', [BarangKeluarController::class, 'store'])->name('barangkeluars.store');
// Transaksi route with cancel action
Route::get('/transaksis/{id}/batal', [TransaksiController::class, 'batal'])->name('transaksis.batal');

// Rute resource untuk berbagai controller
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/transaksis', \App\Http\Controllers\TransaksiController::class);
Route::resource('/laporans', \App\Http\Controllers\LaporanController::class);
Route::resource('/barangs', \App\Http\Controllers\BarangController::class);
Route::resource('/barangmasuks', \App\Http\Controllers\BarangmasukController::class);
Route::get('/barangkeluars/create', [BarangKeluarController::class, 'create'])->name('barangkeluars.create');


// Rute untuk halaman admin
Route::get('/admin/mulai', [App\Http\Controllers\AdminController::class, 'mulai']); // mengarah ke halaman admin



Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');

