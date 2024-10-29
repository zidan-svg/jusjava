<?php

namespace App\Http\Controllers;

use App\Models\transaksi; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    public function index() : View
    {
        $transaksis = transaksi::latest()->paginate(10);

        return view('transaksis.index', compact('transaksis'));
    }
    public function create(): View
    {
        return view('transaksis.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Tanggal_transaksi'  => 'required|date',
            'Nama_pembeli'       => 'required|min:1',
            'Jumlah_barang'      => 'required|numeric',
            'Total_pembayaran'   => 'required|numeric'
        ]);

        //create product
        transaksi::create([
            'Tanggal_transaksi'            => $request->Tanggal_transaksi,
            'Nama_pembeli'                 => $request->Nama_pembeli,
            'Jumlah_barang'                => $request->Jumlah_barang,
            'Total_pembayaran'             => $request->Total_pembayaran
        ]);

        return redirect()->route('transaksis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get product by ID
        $transaksi = transaksi::findOrFail($id);

        //render view with product
        return view('transaksis.show', compact('transaksi'));
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $transaksi = transaksi::findOrFail($id);

        //render view with product
        return view('transaksis.edit', compact('transaksi'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'Tanggal_transaksi'  => 'required|date',
            'Nama_pembeli'       => 'required|min:1',
            'Jumlah_barang'      => 'required|numeric',
            'Total_pembayaran'   => 'required|numeric'
        ]);

        //get product by ID
        $transaksi = transaksi::findOrFail($id);

        if ($request) {


            $transaksi->update([
                'Tanggal_transaksi'            => $request->Tanggal_transaksi,
                'Nama_pembeli'                 => $request->Nama_pembeli,
                'Jumlah_barang'                => $request->Jumlah_barang,
                'Total_pembayaran'             => $request->Total_pembayaran
                        ]);

        } else {

            $transaksi->update([
                'Tanggal_transaksi'            => $request->Tanggal_transaksi,
                'Nama_pembeli'                 => $request->Nama_pembeli,
                'Jumlah_barang'                => $request->Jumlah_barang,
                'Total_pembayaran'             => $request->Total_pembayaran
                        ]);
        }

        //redirect to index
        return redirect()->route('transaksis.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $transaksi = transaksi::findOrFail($id);

        //delete laporan
        $transaksi->delete();

        //redirect to index
        return redirect()->route('transaksis.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}