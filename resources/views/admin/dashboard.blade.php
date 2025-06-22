@extends('layoutsAdmin.app')

@section('title', 'Dashboard | Lembaga Manajemen Infaq')

@push('styles')
<style>
    .info-card {
        border-radius: 10px;
        padding: 20px;
        color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .info-card i {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .bg-purple {
        background-color: #6a1b9a;
    }

    .bg-cyan {
        background-color: #00acc1;
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">
    <h1 class="mb-3">Dashboard</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><i class="fa fa-home"></i> Beranda</li>
        </ol>
    </nav>

    <div class="alert alert-danger">
        <strong>Perhatian:</strong> Jika <b>selesai</b>, mohon segera <b>logout</b>.
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="mb-0">SELAMAT DATANG | Lembaga Manajemen Infaq</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 mb-3">
            <div class="info-card bg-purple text-white text-center">
                <i class="fa fa-bar-chart"></i>
                <h5 class="mt-2">Total Donasi</h5>
                <h3>{{ $totalDonasi }}</h3>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <div class="info-card bg-cyan text-white text-center">
                <i class="fa fa-wallet"></i>
                <h5 class="mt-2">Total Transaksi</h5>
                <h3>{{ $totalTransaksi }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
