<?php

namespace App\Http\Controllers;

use App\Models\Product; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    public function index() : View
    {
        $transaksis = transaksi::latest()->paginate(10);

        return view('tranksasis.index', compact('transaksis'));
    }

}
