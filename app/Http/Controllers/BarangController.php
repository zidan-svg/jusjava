<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    // Tampilkan semua barang
    public function index(): View
    {
        $barangs = Barang::latest()->paginate(10); // Pagination
        return view('barangs.index', compact('barangs'));
    }

    // Tampilkan form untuk menambahkan barang baru
    public function create(): View
    {
        return view('barangs.create');
    }

    // Simpan data barang baru
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Nama_barang' => 'required|string|max:255',
            'Jenis'       => 'required|string|max:255',
            'Jumlah'      => 'required|integer|min:1',
            'Deskripsi'   => 'required|string|max:500',
        ]);

        Barang::create($request->all());

        return redirect()->route('barangs.index')->with('success', 'Data Barang Berhasil Disimpan!');
    }

    // Tampilkan detail barang
    public function show(string $id): View
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.show', compact('barang'));
    }

    // Tampilkan form untuk mengedit barang
    public function edit(string $id): View
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.edit', compact('barang'));
    }

    // Update data barang
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'Nama_barang' => 'required|string|max:255',
            'Jenis'       => 'required|string|max:255',
            'Jumlah'      => 'required|integer|min:1',
            'Deskripsi'   => 'required|string|max:500',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Data Barang Berhasil Diubah!');
    }

    // Hapus barang
    public function destroy(string $id): RedirectResponse
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Data Barang Berhasil Dihapus!');
    }
}
