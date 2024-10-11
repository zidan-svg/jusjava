<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/transaksis', \App\Http\Controllers\TransaksiController::class);
Route::resource('/laporans', \App\Http\Controllers\LaporanController::class);