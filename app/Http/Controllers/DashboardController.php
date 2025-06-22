<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataTransaksi;
use App\Models\Donatur;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDonasi = DB::table('data_donasi')->count();
        $totalTransaksi = DB::table('data_transaksi')->count();

        return view('admin.dashboard', compact('totalDonasi', 'totalTransaksi'));
    }
}
