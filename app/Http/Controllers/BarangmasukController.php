<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class BarangmasukController extends Controller
{
    public function index() : View
    {
        $barang_masuks = BarangMasuk::latest()->paginate(10);

        return view('barang_masuks.index', compact('barang_masuks'));
    }
    public function create(): View
    {
        return view('barang_masuks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Nama_barang'         => 'required|min:1',
            'Jenis'   => 'required|min:1',
            'Jumlah'         => 'required|numeric',
            'Deskripsi'         => 'required|min:1'
        ]);

        //create product
        BarangMasuk::create([
            'Nama_barang'         => $request->Nama_barang,
            'Jenis'   => $request->Jenis,
            'Jumlah'         => $request->Jumlah,
            'Deskripsi'         => $request->Deskripsi
        ]);

        return redirect()->route('barang_masuks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get barang by ID
        $barang_masuk = BarangMasuk::findOrFail($id);

        //render view with product
        return view('barang_masuks.show', compact('barang_masuk'));
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
        $barang_masuk = BarangMasuk::findOrFail($id);

        //render view with product
        return view('barang_masuks.edit', compact('barang_masuk'));
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
            'Nama_barang'         => 'required|min:1',
            'Jenis'   => 'required|min:1',
            'Jumlah'         => 'required|numeric',
            'Deskripsi'         => 'required|min:1'
        ]);

        //get product by ID
        $barang_masuk = BarangMasuk::findOrFail($id);

        //check if image is uploaded


            //upload new image
            $barang_masuk->update([
                'Nama_barang'         => $request->Nama_barang,
                'Jenis'   => $request->Jenis,
                'Jumlah'         => $request->Jumlah,
                'Deskripsi'         => $request->Deskripsi
                ]);

        //redirect to index
        return redirect()->route('barang_masuks.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $barang_masuk = BarangMasuk::findOrFail($id);


        //delete product
        $barang_masuk->delete();

        //redirect to index
        return redirect()->route('barang_masuks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}