@extends('layoutsAdmin.app')

@section('title', 'Data Donasi | Lembaga Manajemen Infaq')

@push('styles')
    <style>
        :root {
            --primary: #0E9F6E;
            --primary-light: #DEF7EC;
            --primary-dark: #057A55;
            --secondary: #F3F4F6;
            --text-dark: #1F2937;
            --text-light: #6B7280;
            --danger: #F05252;
            --success: #0E9F6E;
            --warning: rgb(249, 244, 230);
            --white: #FFFFFF;
        }

        .content-header {
            padding: 15px 0;
        }

        .content-header h1 {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 15px;
        }

        .breadcrumb li,
        .breadcrumb li a {
            color: var(--text-light);
            font-size: 14px;
        }

        .breadcrumb li.active {
            color: var(--primary);
        }

        .chart-box {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .chart-box:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .chart-box h4 {
            color: var(--text-dark);
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-container {
            display: flex;
            margin-bottom: 20px;
        }

        .search-container input {
            border-radius: 8px 0 0 8px;
            border: 1px solid #E5E7EB;
            padding: 10px 15px;
            height: 42px;
        }

        .search-container button {
            border-radius: 0 8px 8px 0;
            background-color: var(--primary);
            border: none;
            color: white;
            padding: 10px 20px;
            height: 42px;
            transition: all 0.2s ease;
        }

        .search-container button:hover {
            background-color: var(--primary-dark);
        }

        .table th {
            background-color: var(--primary-light);
            color: white;
            font-weight: 600;
            padding: 14px 12px;
            text-align: left;
            font-size: 14px;
            white-space: nowrap;
        }

        .table td {
            padding: 14px 12px;
            border-bottom: 1px solid #E5E7EB;
            font-size: 14px;
            vertical-align: middle;
        }

        .lable-tag {
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
        }

        .tag-unpaid {
            background-color: #fff4e3;
            color: #ffffff;
        }

        .tag-success {
            background-color: var(--primary-light);
            color: var(--primary-dark);
        }

        .action-buttons a {
            margin: 0 5px;
            color: var(--text-light);
        }

        .action-buttons a:hover {
            color: var(--primary-dark);
        }

        .stat-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 10px;
            padding: 20px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 4px 6px rgba(14, 159, 110, 0.2);
            flex: 1;
        }

        .stat-card h3 {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .stat-card .number {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-card .trend {
            font-size: 13px;
            display: flex;
            align-items: center;
        }

        .stat-card .trend i {
            margin-right: 5px;
        }

        .stat-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .stat-row {
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')
    <section class="content-header">
        <h1>Manajemen Transaksi</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-credit-card"></i> Transaksi</a></li>
            <li class="active"><i class="fa fa-dashboard"></i> Data</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row stat-row">
            <div class="stat-card">
                <h3>Total Transaksi</h3>
                <div class="number">{{ count($transaksi) }}</div>
                <div class="trend">
                    <i class="fa fa-arrow-up"></i> Total Transaksi Yang masuk 
                </div>
            </div>
            <div class="stat-card">
                <h3>Total Donasi</h3>
                <div class="number">
                    Rp. {{ number_format($transaksi->where('bayar', 'dibayar')->sum('jumlah_donasi'), 0, ',', '.') }}
                </div>
                <div class="trend">
                    <i class="fa fa-arrow-up"></i>Total Keseluruhan Donasi Yang Masuk
                </div>
            </div>
            <div class="stat-card">
                <h3>Menunggu Pembayaran</h3>
                <div class="number">{{ $transaksi->where('bayar', 'belum dibayar')->count() }}</div>
                <div class="trend">
                    <i class="fa fa-clock-o"></i> Perlu dikonfirmasi
                </div>
            </div>
        </div>

        <div class="chart-box">
            <h4>Data Transaksi</h4>

            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Donasi</th>
                            <th>Nama Donatur</th>
                            <th>Jumlah</th>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $index => $rows)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $rows->donasi->nama_donasi ?? '-' }}</td>
                                <td>{{ $rows->nama_donatur }}</td>
                                <td>Rp. {{ number_format($rows->jumlah_donasi, 0, ',', '.') }}</td>
                                <td>{{ $rows->kode_transaksi }}</td>
                                <td>{{ \Carbon\Carbon::parse($rows->tgl_transaksi)->translatedFormat('d M Y') }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @if (is_null($rows->bayar))
                                            <a href="{{ route('admin.transaksi.editBayar', $rows->id_transaksi) }}"
                                                class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1"
                                                onclick="return confirm('Konfirmasi pembayaran untuk transaksi ini?')">
                                                <i class="bi bi-check-circle"></i> Tandai Dibayar
                                            </a>
                                        @else
                                            <span class="badge bg-success px-3 py-1">
                                                <i class="bi bi-patch-check-fill me-1"></i> Dibayar
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td class="action-buttons">
                                    <a href="{{ route('admin.transaksi.delete', $rows->id_transaksi) }}"
                                        class="text-danger" title="Hapus"
                                        onclick="return confirm('Apakah anda yakin akan menghapus data transaksi ini?');">
                                        <i class="fa fa-trash fa-lg"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
