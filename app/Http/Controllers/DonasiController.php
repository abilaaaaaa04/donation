<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataDonasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DonasiController extends Controller
{
    public function index()
    {
        $donasi = DataDonasi::all();
        return view('admin.donasi.index', compact('donasi'));
    }

    public function create()
    {
        return view('admin.donasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_donasi' => 'required',
            'kategori_donasi' => 'required',
            'target_donasi' => 'required|numeric',
            'masa_donasi' => 'required|date',
            'tgl_donasi' => 'required|date',
            'deskripsi_donasi' => 'nullable',
            'img1' => 'image',
            'img2' => 'image',
        ]);

        // dd($validated);
        if ($request->hasFile('img1')) {
            $validated['img1'] = $request->file('img1')->store('donasi', 'public');
        }
        if ($request->hasFile('img2')) {
             $validated['img2'] = $request->file('img2')->store('donasi', 'public');
        }
        
        $validated['masa_aktif'] = $validated['masa_donasi'];
        $donasi = DataDonasi::create($validated);

        return redirect()->route('admin.donasi.index')->with('success', 'Data donasi berhasil ditambahkan.');
    }

    public function destroy(Request $request, $id)
    {
        // dd($id);
        // if ($donasi->img1) Storage::delete($donasi->img1);
        // if ($donasi->img2) Storage::delete($donasi->img2);
        // $donasi->delete();
         DB::delete('DELETE FROM data_donasi WHERE id_donasi = ?', [$id]);

        return redirect()->route('admin.donasi.index')->with('success', 'Data donasi berhasil dihapus.');
    }
}
