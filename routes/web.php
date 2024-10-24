<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/transaksis', \App\Http\Controllers\TransaksiController::class);
Route::resource('/laporans', \App\Http\Controllers\LaporanController::class);
Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
