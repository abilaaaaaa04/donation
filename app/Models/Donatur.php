<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'data_transaksi'; // Nama tabel di database
    protected $primaryKey = 'id_transaksi'; // Primary key kustom

    public $timestamps = false; // Karena tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'id_donasi',
        'nama_donatur',
        'no_telp_donatur',
        'pesan_donatur',
        'jumlah_donasi',
        'kode_transaksi',
        'tgl_transaksi',
        'bayar'
    ];

    // Relasi ke tabel data_donasi
    public function donasi()
    {
        return $this->belongsTo(DataDonasi::class, 'id_donasi', 'id_donasi');
    }
}

