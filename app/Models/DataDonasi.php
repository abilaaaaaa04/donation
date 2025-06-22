<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDonasi extends Model
{
    protected $table = 'data_donasi';
    protected $primaryKey = 'id_donasi';

    public $timestamps = false;

    protected $fillable = [
        'nama_donasi',
        'kategori_donasi',
        'target_donasi',
        'perolehan_donasi',
        'masa_donasi',
        'deskripsi_donasi',
        'tgl_donasi',
        'masa_aktif',
        'img1',
        'img2'
    ];

    // Relasi ke transaksi (satu donasi bisa punya banyak transaksi)
    public function transaksi()
    {
        return $this->hasMany(Donatur::class, 'id_donasi', 'id_donasi');
    }
}
