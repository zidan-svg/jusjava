<?php

namespace App\Http\Controllers;

use App\Models\transaksi; 
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

        return view('transaksis.index', compact('transaksis'));
    }
    public function create()
    {
        $products = Product::all(); // Ambil semua produk
        return view('transaksis.create', compact('products'));
    }
    
public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'Tanggal_transaksi' => 'required|date',
        'Nama_pembeli' => 'required|string',
        'Jumlah_barang' => 'required|integer|min:1',
    ]);

    // Ambil produk berdasarkan ID
    $product = Product::findOrFail($request->product_id);

    // Cek apakah stok cukup
    if ($product->stock < $request->Jumlah_barang) {
        return redirect()->back()->with('error', 'Stok produk tidak mencukupi');
    }

    // Hitung total pembayaran
    $total_payment = $product->price * $request->Jumlah_barang;

    // Buat transaksi
     Transaksi::create([
        'product_id' => $request->product_id,
        'Tanggal_transaksi' => $request->Tanggal_transaksi,
        'Nama_pembeli' => $request->Nama_pembeli,
        'Jumlah_barang' => $request->Jumlah_barang,
        'Total_pembayaran' => $total_payment,
    ]);

    // Kurangi stok produk
    $product->stock -= $request->Jumlah_barang;
    $product->save();

    // Redirect dengan pesan sukses
    return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dibuat dan stok produk telah diperbarui.');
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
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
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
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
 * batal
 *
 * @param  mixed $id
 * @return RedirectResponse
 */
public function batal($id): RedirectResponse
{
    // Ambil transaksi berdasarkan ID
    $transaksi = transaksi::findOrFail($id);

    // Ambil produk terkait transaksi
    $product = Product::findOrFail($transaksi->product_id);

    // Tambahkan kembali jumlah barang ke stok produk
    $product->stock += $transaksi->Jumlah_barang;
    $product->save();

    // Hapus transaksi
    $transaksi->delete();

    // Redirect ke halaman transaksi dengan pesan sukses
    return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dibatalkan dan stok produk telah diperbarui.');
}

}