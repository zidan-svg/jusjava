<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->date('Tanggal');
            $table->decimal('Pendapatan', 15, 2); // Maksimal 15 digit, 2 desimal
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}