@extends('layoutsAdmin.app')

@section('title', 'Data Donasi | Lembaga Manajemen Infaq')

@section('content')
<section class="content-header">
    <h1>Data Donasi</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-hand-holding-heart"></i> Donasi</a></li>
        <li class="active"><i class="fa fa-dashboard"></i> Data Donasi</li>
    </ol>
</section>

<div class="container">
    <a href="{{ route('admin.donasi.create') }}" class="btn btn-success mb-3">+ Tambah Donasi</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($donasi as $d)
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $d->img1) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $d->nama_donasi }}</h5>
                    <span class="badge bg-success">{{ $d->kategori_donasi }}</span>
                    <div class="progress mt-2 mb-1">
                        @php
                            $persen = $d->target_donasi > 0 ? min(100, ($d->perolehan_donasi / $d->target_donasi) * 100) : 100;
                        @endphp
                        <div class="progress-bar" style="width: {{ $persen }}%"></div>
                    </div>
                    <small>{{ number_format($persen, 0) }}% terpenuhi</small>
                    <div class="d-flex justify-content-between mt-2">
                        <small>{{ $d->masa_aktif }} Hari Tersisa</small>
                        <small>Rp {{ number_format($d->perolehan_donasi) }}</small>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- <a href="{{ route('donasi.edit', $d->id_donasi) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                    <form action="{{ route('admin.donasi.destroy', $d->id_donasi) }}" method="POST">
                        @csrf @method('DELETE')
                        <input type="hidden" value="{{ $d->id_donasi }}">
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
