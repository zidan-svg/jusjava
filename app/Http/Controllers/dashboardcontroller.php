<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan model Product sudah di-import
use App\Models\transaksi;
use App\Models\laporan;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $transaksis = Transaksi::all();
        $laporans = Laporan::all();
        $barangmasuks = Barangmasuk::all(); 
        $barangkeluars = BarangKeluar::all();  // Assuming BarangKeluar is the correct model
        $barangs = Barang::all();
        return view('dashboard', compact('products', 'transaksis', 'laporans', 'barangmasuks', 'barangkeluars', 'barangs'));
    }
}