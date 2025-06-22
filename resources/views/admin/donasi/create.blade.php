@extends('layoutsAdmin.app')

@section('title', 'Tambah Donasi | Lembaga Manajemen Infaq')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Donasi Baru</h1>

    <form action="{{ route('admin.donasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_donasi" class="form-label">Nama Donasi</label>
            <input type="text" class="form-control" name="nama_donasi" required>
        </div>

        <div class="mb-3">
            <label for="kategori_donasi" class="form-label">Kategori Donasi</label>
            <select class="form-select" name="kategori_donasi" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Makanan Berkah">Makanan Berkah</option>
                <option value="Gizi Santri">Gizi Santri</option>
                <option value="Pembangunan Masjid">Pembangunan Masjid</option>
                <!-- tambah sesuai kebutuhan -->
            </select>
        </div>

        <div class="mb-3">
            <label for="target_donasi" class="form-label">Target Donasi (Rp)</label>
            <input type="number" class="form-control" name="target_donasi" required>
        </div>

        <div class="mb-3">
            <label for="masa_donasi" class="form-label">Durasi Donasi (hari)</label>
            <input type="date" class="form-control" name="masa_donasi" required>
        </div>

        <div class="mb-3">
            <label for="tgl_donasi" class="form-label">Tanggal Mulai Donasi</label>
            <input type="date" class="form-control" name="tgl_donasi" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi_donasi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi_donasi" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label for="img1" class="form-label">Gambar Utama</label>
            <input type="file" class="form-control" name="img1" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="img2" class="form-label">Gambar Tambahan</label>
            <input type="file" class="form-control" name="img2" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.donasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
