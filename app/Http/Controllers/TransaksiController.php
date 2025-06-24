<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataDonasi;
use App\Models\Donatur;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    /**
     * Tampilkan halaman data transaksi.
     */
    public function index()
    {
        $transaksi = Donatur::with('donasi')->paginate(10);
        return view('admin.DataTransaksi.index', compact('transaksi'));
    }

    /**
     * Tampilkan form edit transaksi.
     */
    public function edit($id)
    {
        $transaksi = Donatur::findOrFail($id);
        return view('admin.transaksi.edit', compact('transaksi'));
    }

    /**
     * Proses update transaksi.
     */
    public function update(Request $request, $id)
    {
        $transaksi = Donatur::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('admin.transaksi.index')->with('success', 'Data transaksi berhasil diperbarui.');
    }

    /**
     * Hapus transaksi.
     */
    public function destroy($id)
    {
        $transaksi = Donatur::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('admin.transaksi.index')->with('success', 'Data transaksi berhasil dihapus.');
    }

    /**
     * Ubah status pembayaran.
     */
    public function editBayar($id)
    {
        $transaksi = Donatur::findOrFail($id);

        // Toggle status bayar
        if (is_null($transaksi->bayar)) {
            $transaksi->bayar = 'dibayar';
        } else {
            $transaksi->bayar = 0;
        }

        $transaksi->save();

        return redirect()->route('admin.transaksi.index')->with('success', 'Status pembayaran diperbarui.');
    }
}
