<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'nama_barang',
        'jumlah',
        'keterangan',
    ];

}