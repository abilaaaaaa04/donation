<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTransaksiTable extends Migration
{
    
    public function up(): void
    {
        Schema::create('data_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi'); // AUTO_INCREMENT dan primary key
            $table->integer('id_donasi');
            $table->text('nama_donatur');
            $table->text('no_telp_donatur');
            $table->text('pesan_donatur');
            $table->integer('jumlah_donasi');
            $table->text('kode_transaksi');
            $table->date('tgl_transaksi');
            $table->tinyInteger('bayar')->default(0); // bisa dikasih default 0 jika belum bayar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_transaksi');
    }
}
