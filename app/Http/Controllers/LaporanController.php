<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Donatur;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
       $transaksi = Donatur::where('bayar', 'dibayar')->orderBy('tgl_transaksi', 'desc')->get();
        $total = $transaksi->sum('jumlah_donasi');
        return view('admin.laporan.index', compact('transaksi', 'total'));
    }

    public function print()
    {
      $transaksi = Donatur::where('bayar', 'dibayar')->orderBy('tgl_transaksi', 'desc')->get();
        $total = $transaksi->sum('jumlah_donasi');
        return view('admin.laporan.print', compact('transaksi', 'total'));
    }
}
