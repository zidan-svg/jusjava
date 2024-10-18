<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'Tanggal_transaksi',
        'Nama_pembeli',
        'Jumlah_barang',
        'Total_pembayaran'
    ];

}
