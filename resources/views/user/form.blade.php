@extends('layouts.app')

@section('title', 'Form Donasi - Masjid Jami Albarokah')

@push('styles')
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #1d9242;
            --text-color: #333;
            --light-color: rgb(248, 215, 0);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            color: var(--text-color);
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('{{ asset('assets/front/images/logo_albarokah.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 100px 0;
            color: white;
        }

        .form-section {
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 15px;
            margin-top: -80px;
            position: relative;
            z-index: 2;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 20px;
        }

        .step.active .step-icon {
            background-color: var(--primary-color);
            color: white;
        }

        .step::after {
            content: '';
            position: absolute;
            top: 25px;
            right: -50%;
            height: 3px;
            width: 100%;
            background-color: #dee2e6;
            z-index: -1;
        }

        .step:last-child::after {
            content: none;
        }

        .step.active::after {
            background-color: var(--primary-color);
        }

        .btn-donation {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .btn-donation:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }

        .donation-title {
            color: var(--primary-color);
            font-weight: 700;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }

        .invalid-feedback {
            display: block;
        }
    </style>
@endpush

@section('content')
    <div class="hero-section text-center">
        <h1 class="display-4 font-weight-bold mb-4">Bergabunglah Dalam Kebaikan</h1>
        <p class="lead">Setiap donasi Anda membawa perubahan berarti bagi sesama</p>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-section">
                    {{-- Step Progress --}}
                    <div class="progress-steps">
                        <div class="step active">
                            <div class="step-icon"><i class="fas fa-user"></i></div>
                            <div>Data Diri</div>
                        </div>
                        <div class="step">
                            <div class="step-icon"><i class="fas fa-money-bill-wave"></i></div>
                            <div>Pembayaran</div>
                        </div>
                        <div class="step">
                            <div class="step-icon"><i class="fas fa-check"></i></div>
                            <div>Konfirmasi</div>
                        </div>
                    </div>

                    <h3 class="text-center mb-4">Silakan Masukkan Data Anda</h3>

                    <form method="POST" action="{{ route('donasi.simpan') }}" id="donasiForm">
                        @csrf
                        <input type="hidden" name="id_donasi" value="{{ $donasi->id_donasi }}">

                        {{-- Nominal Donasi --}}
                        <div class="mb-3">
                            <label for="jumlah_donasi" class="form-label">Jumlah Donasi</label>
                            <input type="number" name="jumlah_donasi" id="jumlah_donasi"
                                class="form-control @error('jumlah_donasi') is-invalid @enderror"
                                placeholder="Contoh: 10000" min="1000" required value="{{ old('jumlah_donasi') }}">
                            @error('jumlah_donasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Data Diri --}}
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Informasi Pribadi</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_donatur"
                                        class="form-control @error('nama_donatur') is-invalid @enderror"
                                        placeholder="Masukkan nama lengkap" required>
                                    @error('nama_donatur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>No Telepon (WhatsApp)</label>
                                    <input type="text" name="no_telp_donatur"
                                        class="form-control @error('no_telp_donatur') is-invalid @enderror"
                                        placeholder="Masukkan nomor WhatsApp" required>
                                    @error('no_telp_donatur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Pesan / Doa</label>
                                    <textarea name="pesan_donatur" class="form-control @error('pesan_donatur') is-invalid @enderror" rows="3"
                                        placeholder="Tulis pesan (opsional)"></textarea>
                                    @error('pesan_donatur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-donation btn-lg">
                                <i class="fas fa-arrow-right"></i> Lanjut ke Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskMoney/3.0.2/jquery.maskMoney.min.js"></script>
@endpush
