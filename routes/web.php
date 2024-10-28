<?php
use Illuminate\Support\Facades\Route;

// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute resource untuk berbagai controller
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/transaksis', \App\Http\Controllers\TransaksiController::class);
Route::resource('/laporans', \App\Http\Controllers\LaporanController::class);
Route::resource('/barangs', \App\Http\Controllers\BarangController::class);
Route::resource('/barangmasuks', \App\Http\Controllers\BarangmasukController::class);
Route::resource('/barangkeluars', \App\Http\Controllers\BarangkeluarController::class);

// Rute untuk halaman admin
Route::get('/admin/mulai', [App\Http\Controllers\AdminController::class, 'mulai']); // mengarah ke halaman admin

use App\Http\Controllers\dashboardcontroller;

Route::get('/dashboard', [dashboardcontroller::class, 'index'])->name('dashboard');
