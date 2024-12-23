<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan model Product sudah di-import
use App\Models\transaksi;
use App\Models\laporan;
use App\Models\Barang;
use App\Models\BarangMasuk;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $transaksis = Transaksi::all();
        $laporans = Laporan::all();
        $barangs = Barang::all();
        $barang_masuks = BarangMasuk::all();
    
        return view('dashboard', compact('products', 'transaksis', 'laporans', 'barangs', 'barang_masuks'));
    }
}    