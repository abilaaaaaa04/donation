@extends('layouts.app')

@section('title', 'Donasi - Masjid Jami Albarokah')
<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    color: #343a40;
    line-height: 1.5;
    font-size: 14px;
}

.donasi-container {
    padding: 1rem;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    margin: 1.5rem auto;
    max-width: 900px;
}

.title-section {
    padding-top: 60px;
    margin-bottom: 1rem;
}

.donasi-title {
    font-weight: 600;
    color: #2d3748;
    font-size: 2rem;
    margin-bottom: 1rem;
    position: relative;
    padding-bottom: 8px;
}

.donasi-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: #28a745;
}

.image-gallery {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-bottom: 1rem;
}

.gallery-image {
    border-radius: 6px;
    object-fit: cover;
    width: 100%;
    height: 150px;
    transition: transform 0.3s;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
}

.gallery-image:hover {
    transform: scale(1.02);
}

.gallery-image-full {
    grid-column: span 2;
    height: 190px;
}

.donasi-info {
    background-color: #f8f9fa;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}

.info-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.8rem;
    padding-bottom: 0.4rem;
    border-bottom: 1px solid #e9ecef;
}

.info-label {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 500;
}

.info-value {
    font-size: 1rem;
    font-weight: 600;
    color: #212529;
}

.progress-bar-container {
    margin: 1rem 0;
}

.progress {
    height: 8px;
    border-radius: 6px;
    background-color: #e9ecef;
    overflow: hidden;
}

.progress-bar {
    background-color: #28a745;
    border-radius: 6px;
}

.percent-text {
    font-size: 0.95rem;
    font-weight: 500;
    text-align: right;
    margin-top: 0.3rem;
}

.remaining-days {
    color: #dc3545;
    font-weight: 600;
}

.donasi-button {
    background-color: #28a745;
    border: none;
    border-radius: 30px;
    padding: 10px 20px;
    font-weight: 600;
    font-size: 0.95rem;
    margin-top: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: 0.3s ease;
}

.donasi-button:hover {
    background-color: #218838;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
}

.donasi-description {
    background-color: #fff;
    padding: 1rem;
    border-radius: 10px;
    margin-top: 1.5rem;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    font-size: 0.95rem;
    line-height: 1.7;
}

.donasi-description h4 {
    font-size: 1.05rem;
    font-weight: 600;
    margin-bottom: 0.8rem;
}

.card-info {
    display: inline-block;
    margin-right: 6px;
    color: #6c757d;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .donasi-container {
        padding: 0.8rem;
    }

    .donasi-title {
        font-size: 1.6rem;
    }

    .image-gallery {
        grid-template-columns: 1fr;
    }

    .gallery-image-full {
        grid-column: span 1;
        height: 160px;
    }

    .info-label,
    .info-value {
        font-size: 0.9rem;
    }

    .donasi-button {
        font-size: 0.9rem;
        padding: 9px 18px;
    }

    .percent-text {
        font-size: 0.9rem;
    }
}
</style>
@section('content')
    <div class="container-fluid">
        <div class="donasi-container">
            <div class="row title-section">
                <div class="col-md-12 text-center">
                    <h1 class="donasi-title">{{ $donasi->nama_donasi }}</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="image-gallery">
                        @if ($donasi->img1)
                            <div class="gallery-image-full">
                                <img src="{{ asset('storage/' . $donasi->img1) }}" class="gallery-image gallery-image-full"
                                    alt="Gambar Donasi 1">
                            </div>
                        @endif

                        @foreach (range(2, 5) as $i)
                            @php $img = 'img' . $i; @endphp
                            @if ($donasi->$img)
                                <div>
                                    <img src="{{ asset('storage/' . $donasi->$img) }}" class="gallery-image"
                                        alt="Gambar Donasi {{ $i }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="donasi-info">
                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-tag mr-2"></i> Kategori:</span>
                            <span class="info-value">{{ $donasi->kategori_donasi }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-chart-line mr-2"></i> Tercapai:</span>
                            <span class="info-value">Rp
                                {{ number_format($donasi->perolehan_donasi, 0, ',', '.') }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-bullseye mr-2"></i> Target:</span>
                            <span class="info-value">Rp {{ number_format($donasi->target_donasi, 0, ',', '.') }}</span>
                        </div>

                        @php
                            $percentage =
                                $donasi->target_donasi > 0
                                    ? ($donasi->perolehan_donasi / $donasi->target_donasi) * 100
                                    : 0;
                            $percentage = min($percentage, 100);
                        @endphp

                        <div class="progress-bar-container">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%"
                                    aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="text-right mt-2">
                                <span class="percent-text">{{ round($percentage, 1) }}% tercapai</span>
                            </div>
                        </div>

                        <div class="info-row">
                            <span class="info-label"><i class="far fa-calendar-alt mr-2"></i> Berakhir:</span>
                            <span
                                class="info-value">{{ \Carbon\Carbon::parse($donasi->masa_donasi)->format('d M Y') }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label"><i class="fas fa-hourglass-half mr-2"></i> Sisa Hari:</span>
                            <span class="info-value remaining-days">{{ $hariTersisa }} Hari</span>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('donasi.register', ['id' => $donasi->id_donasi]) }}"
                                class="btn btn-success btn-lg donasi-button" role="button">
                                <i class="fas fa-heart mr-2"></i> Donasi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="donasi-description">
                        <h4 class="mb-3"><i class="fas fa-info-circle mr-2"></i> Deskripsi Program</h4>
                        <p>{!! $donasi->deskripsi_donasi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/ovio.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/charts/code/modules/exporting.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/charts/chart-functions.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/charts/code/highcharts.js') }}"></script>
</body>

</html>
