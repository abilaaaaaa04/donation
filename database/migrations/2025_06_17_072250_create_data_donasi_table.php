<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDonasiTable extends Migration
{
    
    public function up(): void
    {
        Schema::create('data_donasi', function (Blueprint $table) {
            $table->id('id_donasi'); // PRIMARY KEY dan AUTO_INCREMENT
            $table->text('nama_donasi');
            $table->text('kategori_donasi');
            $table->text('target_donasi');
            $table->bigint('perolehan_donasi');
            $table->date('masa_donasi');
            $table->text('deskripsi_donasi');
            $table->date('tgl_donasi');
            $table->date('masa_aktif');
            $table->text('img1');
            $table->text('img2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_donasi');
    }
}

