<?php

namespace App\Http\Controllers;

use App\Models\Barang; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index() : View
    {
        $barangs = barang::latest()->paginate(10);

        return view('barangs.index', compact('barangs'));
    }
    public function create(): View
    {
        return view('barangs.create');
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
        barang::create([
            'Nama_barang'                  => $request->Nama_barang,
            'Jenis'                        => $request->Jenis,
            'Jumlah'                => $request->Jumlah,
            'Deskripsi'             => $request->Deskripsi
        ]);

        return redirect()->route('barangs.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $barang = barang::findOrFail($id);

        //render view with product
        return view('barangs.show', compact('barang'));
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
        $barang = barang::findOrFail($id);

        //render view with product
        return view('barangs.edit', compact('barang'));
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
        $barang = barang::findOrFail($id);

        if ($request) {


            $barang->update([
                'Nama_barang'                  => $request->Nama_barang,
                'Jenis'                        => $request->Jenis,
                'Jumlah'                => $request->Jumlah,
                'Deskripsi'             => $request->Deskripsi
                            ]);

        } else {

            $barang->update([
                'Nama_barang'                  => $request->Nama_barang,
                'Jenis'                        => $request->Jenis,
                'Jumlah'                => $request->Jumlah,
                'Deskripsi'             => $request->Deskripsi
                            ]);
        }

        //redirect to index
        return redirect()->route('barangs.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $barang = barang::findOrFail($id);

        //delete laporan
        $barang->delete();

        //redirect to index
        return redirect()->route('barangs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}