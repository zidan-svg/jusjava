<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BarangKeluarController extends Controller
{
    public function index() : View
    {
        $barangKeluars = Barangkeluar::latest()->paginate(10);

        return view('barangkeluars.index', compact('barangKeluars'));
    }
    public function create(): View
    {
        return view('barangkeluars.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_barang'   => 'required|min:1',
            'jumlah_keluar' => 'required|integer|min:0',
            'tanggal_keluar'=> 'required|date'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/barangkeluars', $image->hashName());

        //create barang keluar
        Barangkeluar::create([
            'image'         => $image->hashName(),
            'nama_barang'   => $request->nama_barang,
            'jumlah_keluar' => $request->jumlah_keluar,
            'tanggal_keluar'=> $request->tanggal_keluar
        ]);

        return redirect()->route('barangkeluars.index')->with(['success' => 'Data Barang Keluar Berhasil Disimpan!']);
    }
    
    public function show(string $id): View
    {
        $barangKeluar = Barangkeluar::findOrFail($id);

        return view('barangkeluars.show', compact('barangKeluar'));
    }
    
    public function edit(string $id): View
    {
        $barangKeluar = Barangkeluar::findOrFail($id);

        return view('barangkeluars.edit', compact('barangKeluar'));
    }
        
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama_barang'   => 'required|min:1',
            'jumlah_keluar' => 'required|integer|min:0',
            'tanggal_keluar'=> 'required|date'
        ]);

        $barangKeluar = Barangkeluar::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/barangkeluars', $image->hashName());

            Storage::delete('public/barangkeluars/'.$barangKeluar->image);

            $barangKeluar->update([
                'image'         => $image->hashName(),
                'nama_barang'   => $request->nama_barang,
                'jumlah_keluar' => $request->jumlah_keluar,
                'tanggal_keluar'=> $request->tanggal_keluar
            ]);

        } else {
            $barangKeluar->update([
                'nama_barang'   => $request->nama_barang,
                'jumlah_keluar' => $request->jumlah_keluar,
                'tanggal_keluar'=> $request->tanggal_keluar
            ]);
        }

        return redirect()->route('barangkeluars.index')->with(['success' => 'Data Barang Keluar Berhasil Disimpan!']);
    }
    
    public function destroy($id): RedirectResponse
    {
        $barangKeluar = Barangkeluar::findOrFail($id);

        Storage::delete('public/barangkeluars/'. $barangKeluar->image);

        $barangKeluar->delete();

        return redirect()->route('barangkeluars.index')->with(['success' => 'Data Barang Keluar Berhasil Dihapus!']);
    }
}
