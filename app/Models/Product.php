<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function orders()
{
    return $this->hasMany(Order::class);
}

    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'price',
        'stock',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

}
