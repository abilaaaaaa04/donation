<?php

namespace App\Http\Controllers;

use App\Models\DataDonasi;
use App\Models\Donatur;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class DonasiUserController extends Controller
{
    /**
     * Tampilkan semua program donasi di halaman utama
     */
    public function index()
    {
        $donasi = DataDonasi::all();
        return view('user.index', compact('donasi'));
    }

    /**
     * Tampilkan detail salah satu donasi
     */
    public function show($id)
    {
        $donasi = DataDonasi::findOrFail($id);
        $hariTersisa = Carbon::now()->diffInDays(Carbon::parse($donasi->masa_donasi), false);
        return view('user.detail', compact('donasi', 'hariTersisa'));
    }

     public function register($id_donasi)
    {
        $donasi = DataDonasi::where('id_donasi', $id_donasi)->firstOrFail();
        return view('user.form', compact('donasi'));
    }

    public function storeDonatur(Request $request)
    {
        //  dd($request->all());
        $validated = $request->validate([
            'id_donasi' => 'required|exists:data_donasi,id_donasi',
            'nama_donatur' => 'required|string|max:255',
            'no_telp_donatur' => 'required|string|max:20',
            'pesan_donatur' => 'nullable|string|max:255',
            'jumlah_donasi' => 'required|numeric|min:100',
        ]);

        $donatur = Donatur::create([
            'id_donasi'        => $validated['id_donasi'],
            'nama_donatur'     => $validated['nama_donatur'],
            'no_telp_donatur'  => $validated['no_telp_donatur'],
            'pesan_donatur'    => $validated['pesan_donatur'],
            'jumlah_donasi'    => $validated['jumlah_donasi'],
            'kode_transaksi'   => 'LMI-' . strtoupper(Str::random(8)),
            'tgl_transaksi'    => Carbon::now(),
        ]);

        return redirect()->route('donasi.konfirmasi', $donatur->id_transaksi);
    }

    public function konfirmasiDonasi($id)
    {
        $donatur = Donatur::findOrFail($id);

        $banks = [
            [
                'nama' => 'Bank Syariah Mandiri',
                'no_rek' => '708 2604 191',
                'pemilik' => 'LEMBAGA MANAJEMEN INFAQ'
            ],
            [
                'nama' => 'Bank Muamalat',
                'no_rek' => '701 0055 055',
                'pemilik' => 'LEMBAGA MANAJEMEN INFAQ'
            ],
            [
                'nama' => 'Bank Mandiri',
                'no_rek' => '142 000 6977 291',
                'pemilik' => 'LEMBAGA MANAJEMEN INFAQ'
            ],
            [
                'nama' => 'Bank BCA',
                'no_rek' => '5200 242 400',
                'pemilik' => 'LEMBAGA MANAJEMEN INFAQ'
            ],
        ];

        return view('user.transaksi', compact('donatur', 'banks'));

    }

}
