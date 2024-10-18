<?php

namespace App\Http\Controllers;

use App\Models\laporan; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index() : View
    {
        $laporans = laporan::latest()->paginate(10);

        return view('laporans.index', compact('laporans'));
    }
    public function create(): View
    {
        return view('laporans.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Tanggal'         => 'required|date',
            'Pendapatan'      => 'required|numeric',
            'Jumlah_barang'   => 'required|numeric'
        ]);

        //create product
        laporan::create([
            'Tanggal'            => $request->Tanggal,
            'Pendapatan'         => $request->Pendapatan,
            'Jumlah_barang'      => $request->Jumlah_barang
        ]);

        return redirect()->route('laporans.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $laporan = laporan::findOrFail($id);

        //render view with product
        return view('laporans.show', compact('laporan'));
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
        $laporan = laporan::findOrFail($id);

        //render view with product
        return view('laporans.edit', compact('laporan'));
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
            'Tanggal'         => 'required|date',
            'Pendapatan'      => 'required|numeric',
            'Jumlah_barang'   => 'required|numeric'
        ]);

        //get product by ID
        $laporan = laporan::findOrFail($id);

        //check if image is uploaded
        if ($request) {


            $laporan->update([
                'Tanggal'            => $request->Tanggal,
                'Pendapatan'         => $request->Pendapatan,
                'Jumlah_barang'      => $request->Jumlah_barang
                ]);

        } else {

            $laporan->update([
                'Tanggal'            => $request->Tanggal,
                'Pendapatan'         => $request->Pendapatan,
                'Jumlah_barang'      => $request->Jumlah_barang
                ]);
        }

        //redirect to index
        return redirect()->route('laporans.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $laporan = laporan::findOrFail($id);

        //delete laporan
        $laporan->delete();

        //redirect to index
        return redirect()->route('laporans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}