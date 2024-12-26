<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLaporansTableAddDefaultToJumlahBarang extends Migration
{
    public function up()
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->integer('Jumlah_barang')->default(0)->change(); // Menambahkan default value 0
        });
    }

    public function down()
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->integer('Jumlah_barang')->change(); // Menghapus default value jika rollback
        });
    }
}

