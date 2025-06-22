@extends('layoutsAdmin.app')

@section('title', 'Laporan Donasi')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between mb-3">
            <h4>Laporan Pemasukan Donasi</h4>
            <a href="{{ route('admin.laporan.print') }}" class="btn btn-success" target="_blank">
                <i class="fa fa-print"></i> Cetak Laporan
            </a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Donatur</th>
                    <th>Nama Donasi</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $i => $row)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $row->nama_donatur }}</td>
                        <td>{{ $row->donasi->nama_donasi ?? '-' }}</td>
                        <td>Rp {{ number_format($row->jumlah_donasi, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->tgl_transaksi)->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="table-light fw-bold">
                    <td colspan="3" class="text-end">Total</td>
                    <td colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
