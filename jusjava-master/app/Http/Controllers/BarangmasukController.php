<?php

namespace App\Http\Controllers;

use App\Models\Barang_masuk; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class BarangmasukController extends Controller
{
    public function index() : View
    {
        $barangmasuks = Barang_masuk::latest()->paginate(10);

        return view('barangmasuks.index', compact('barangmasuks'));
    }
    public function create(): View
    {
        return view('barangmasuks.create');
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
        Barang_masuk::create([
            'Nama_barang'                  => $request->Nama_barang,
            'Jenis'                        => $request->Jenis,
            'Jumlah'                => $request->Jumlah,
            'Deskripsi'             => $request->Deskripsi
        ]);

        return redirect()->route('barangmasuks.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $barangmasuk = Barang_masuk::findOrFail($id);

        //render view with product
        return view('barangmasuks.show', compact('barangmasuk'));
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
        $barangmasuk = Barang_masuk::findOrFail($id);

        //render view with product
        return view('barangmasuks.edit', compact('barangmasuk'));
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
        $barangmasuk = Barang_masuk::findOrFail($id);

        if ($request) {


            $barangmasuk->update([
                'Nama_barang'                  => $request->Nama_barang,
                'Jenis'                        => $request->Jenis,
                'Jumlah'                => $request->Jumlah,
                'Deskripsi'             => $request->Deskripsi
                            ]);

        } else {

            $barangmasuk->update([
                'Nama_barang'                  => $request->Nama_barang,
                'Jenis'                        => $request->Jenis,
                'Jumlah'                => $request->Jumlah,
                'Deskripsi'             => $request->Deskripsi
                            ]);
        }

        //redirect to index
        return redirect()->route('barangmasuks.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $barangmasuk = Barang_masuk::findOrFail($id);

        //delete laporan
        $barangmasuk->delete();

        //redirect to index
        return redirect()->route('barangs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}