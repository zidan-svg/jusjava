<?php

namespace App\Http\Controllers;

use App\Models\Barang_keluar; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class BarangkeluarController extends Controller
{
    public function index() : View
    {
        $barangkeluars = Barang_keluar::latest()->paginate(10);

        return view('barangkeluars.index', compact('barangkeluars'));
    }
    public function create(): View
    {
        return view('barangkeluars.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Nama_barang'        => 'required|min:1',
            'Jenis'              => 'required|min:1',
            'Jumlah'             => 'required|numeric',
            'Deskripsi'          => 'required|min:1'
        ]);

        //create product
        Barang_keluar::create([
            'Nama_barang'                  => $request->Nama_barang,
            'Jenis'                        => $request->Jenis,
            'Jumlah'                => $request->Jumlah,
            'Deskripsi'             => $request->Deskripsi
        ]);

        return redirect()->route('barangkeluars.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $barangkeluar = Barang_keluar::findOrFail($id);

        //render view with product
        return view('barangkeluars.show', compact('barangkeluar'));
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
        $barangkeluar = Barang_keluar::findOrFail($id);

        //render view with product
        return view('barangkeluars.edit', compact('barangkeluar'));
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
            'Nama_barang'        => 'required|min:1',
            'Jenis'              => 'required|min:1',
            'Jumlah'             => 'required|numeric',
            'Deskripsi'          => 'required|min:1'
        ]);

        //get product by ID
        $barangkeluar = Barang_keluar::findOrFail($id);

        if ($request) {


            $barangkeluar->update([
                'Nama_barang'                  => $request->Nama_barang,
                'Jenis'                        => $request->Jenis,
                'Jumlah'                => $request->Jumlah,
                'Deskripsi'             => $request->Deskripsi
                            ]);

        } else {

            $barangkeluar->update([
                'Nama_barang'                  => $request->Nama_barang,
                'Jenis'                        => $request->Jenis,
                'Jumlah'                => $request->Jumlah,
                'Deskripsi'             => $request->Deskripsi
                            ]);
        }

        //redirect to index
        return redirect()->route('barangkeluars.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $barangkeluar = Barang_keluar::findOrFail($id);

        //delete laporan
        $barangkeluar->delete();

        //redirect to index
        return redirect()->route('barangkeluars.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}