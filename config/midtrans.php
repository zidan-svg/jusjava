<?php

return [
    // Server Key Midtrans, diambil dari file .env
    'serverKey' => env('MIDTRANS_SERVER_KEY'),

    // Apakah menggunakan mode produksi (true) atau sandbox (false)
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),

    // Sanitasi data untuk mencegah data berbahaya
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),

    // Aktifkan 3D Secure untuk transaksi kartu kredit
    'is3ds' => env('MIDTRANS_IS_3DS', true),
];
