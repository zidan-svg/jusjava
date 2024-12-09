<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    public function index(): View
    {
        $transaksis = Transaksi::latest()->paginate(10);
        return view('transaksis.index', compact('transaksis'));
    }

    public function bayar($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        

        // Parameter pembayaran
        $params = [
            'transaction_details' => [
                'order_id' => 'T-' . $transaksi->id, // ID transaksi
                'gross_amount' => $transaksi->Total_pembayaran, // Total pembayaran
            ],
            'customer_details' => [
                'first_name' => $transaksi->Nama_pembeli, // Nama pembeli
            ],
        ];

        try {
            // Generate Snap Token dari Midtrans
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Render view pembayaran
            return view('transaksis.payment', compact('snapToken', 'transaksi'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function midtransCallback(Request $request)
    {
        try {
            // Membaca notifikasi dari Midtrans
            $notification = new \Midtrans\Notification();

            // Temukan transaksi berdasarkan order_id
            $orderId = str_replace('T-', '', $notification->order_id);
            $transaksi = Transaksi::findOrFail($orderId);

            // Memeriksa status transaksi
            $status = $notification->transaction_status;

            if ($status == 'settlement') {
                $transaksi->status = 'completed'; // Pembayaran berhasil
            } elseif ($status == 'pending') {
                $transaksi->status = 'pending'; // Pembayaran tertunda
            } else {
                $transaksi->status = 'failed'; // Pembayaran gagal/dibatalkan
            }

            // Simpan status transaksi
            $transaksi->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
