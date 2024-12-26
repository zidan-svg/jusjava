<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LaporanController extends Controller
{
    /**
     * Menampilkan semua laporan transaksi.
     *
     * @return View
     */
    public function index(): View
    {
        // Ambil semua data transaksi dengan paginasi
        $laporans = Transaksi::latest()->paginate(10);

        // Tampilkan halaman index laporan
        return view('laporans.index', compact('laporans'));
    }
/**
 * Menampilkan form untuk membuat laporan baru.
 *
 * @return View
 */
public function create(): View
{
    // Tampilkan halaman form untuk membuat laporan
    return view('laporans.create');
}

/**
 * Menyimpan laporan baru ke database.
 *
 * @param  Request $request
 * @return RedirectResponse
 */
public function store(Request $request): RedirectResponse
{
    // Validasi input form
    $request->validate([
        'product_id'          => 'required|exists:products,id',
        'Tanggal_transaksi'   => 'required|date',
        'Nama_pembeli'        => 'required|string|max:255',
        'Jumlah_barang'       => 'required|integer|min:1',
        'Total_pembayaran'    => 'required|numeric|min:0',
    ]);

    // Simpan data ke dalam database
    Transaksi::create([
        'product_id'          => $request->product_id,
        'Tanggal_transaksi'   => $request->Tanggal_transaksi,
        'Nama_pembeli'        => $request->Nama_pembeli,
        'Jumlah_barang'       => $request->Jumlah_barang,
        'Total_pembayaran'    => $request->Total_pembayaran,
        'status'              => 'pending', // Set status default
    ]);

    // Redirect ke halaman laporan dengan pesan sukses
    return redirect()->route('laporans.index')->with('success', 'Laporan berhasil ditambahkan.');
}

    /**
     * Menampilkan laporan berdasarkan ID.
     *
     * @param  string $id
     * @return View
     */
    public function show(string $id): View
    {
        // Ambil laporan transaksi berdasarkan ID atau gagal jika tidak ditemukan
        $laporan = Transaksi::findOrFail($id);

        // Tampilkan halaman detail laporan
        return view('laporans.show', compact('laporan'));
    }

    /**
     * Menampilkan form untuk filter laporan.
     *
     * @return View
     */
    public function filter(): View
    {
        // Tampilkan halaman filter laporan
        return view('laporans.filter');
    }

    /**
     * Memproses filter laporan berdasarkan rentang tanggal.
     *
     * @param  Request $request
     * @return View
     */
    public function processFilter(Request $request): View
    {
        // Validasi input tanggal
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        // Ambil data transaksi dalam rentang tanggal yang diberikan
        $laporans = Transaksi::whereBetween('Tanggal_transaksi', [$request->start_date, $request->end_date])
            ->latest()
            ->get();

        // Tampilkan halaman index laporan dengan hasil filter
        return view('laporans.index', compact('laporans'))->with('success', 'Filter berhasil diterapkan.');
    }

    /**
     * Menghapus laporan berdasarkan ID.
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        // Cari laporan berdasarkan ID atau gagal jika tidak ditemukan
        $laporan = Transaksi::findOrFail($id);

        // Hapus laporan dari database
        $laporan->delete();

        // Redirect ke halaman index laporan dengan pesan sukses
        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
