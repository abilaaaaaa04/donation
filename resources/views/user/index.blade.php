@extends('layouts.app')

@section('title', 'Home - Masjid Jami Albarokah')
<style>
    :root {
        --primary-color: #2E7D32;
        --secondary-color: #4CAF50;
        --accent-color: #8BC34A;
        --dark-color: #1B5E20;
        --light-color: #E8F5E9;
        --text-dark: #212121;
        --text-light: #FAFAFA;
        --card-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--text-dark);
        background-color: #FAFAFA;
        overflow-x: hidden;
        line-height: 1.6;
    }

    /* Header styles */
    .navbar {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px 0;
        transition: var(--transition);
    }

    .navbar.scrolled {
        padding: 8px 0;
    }

    /* Reset dan style dasar */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
    }

    /* Hero Slider Styles */
    .hero-slider {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 60vh;
        max-height: 500px;
    }

    .carousel,
    .carousel-inner,
    .carousel-item {
        height: 100%;
    }

    .carousel-item {
        background-size: cover;
        background-position: center;
        transition: transform 1.2s ease-in-out;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        /* Lebih gelap dari sebelumnya */
        background: rgba(0, 0, 0, 0.65);
        display: flex;
        justify-content: center;
        align-items: flex-end;
        /* Ubah ke bawah dulu */
        text-align: center;
        padding-bottom: 120px;
        /* Naikin posisinya */
        z-index: 1;
    }

    .carousel-content {
        color: #fff;
        padding: 0 20px;
        max-width: 800px;
        animation: fadeIn 1s ease-in-out;
        z-index: 2;
    }

    .carousel-content h1 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .carousel-content p {
        font-size: 1rem;
        margin-bottom: 15px;
    }

    .hero-btn {
        display: inline-block;
        background: #00692c;
        color: #fff;
        padding: 10px 22px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid #129b4b;
    }

    .hero-btn:hover {
        background: transparent;
        color: #fff;
        border-color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    /* Carousel Indicators */
    .carousel-indicators {
        bottom: 20px;
        z-index: 15;
    }

    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.7);
        margin: 0 5px;
        transition: all 0.3s ease;
    }

    .carousel-indicators .active {
        width: 12px;
        height: 12px;
        background-color: #2ecc71;
        border-color: #098a3e;
    }

    /* Carousel Controls */
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        z-index: 10;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        background-size: 100% 100%;
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }

    /* Hover control visibility */
    .hero-slider:hover .carousel-control-prev,
    .hero-slider:hover .carousel-control-next {
        opacity: 1;
        transition: opacity 0.3s;
    }

    .carousel-control-prev,
    .carousel-control-next {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Responsive tweaks */
    @media (max-width: 767px) {
        .hero-slider {
            height: 50vh;
        }

        .carousel-overlay {
            padding-bottom: 80px;
        }

        .carousel-content h1 {
            font-size: 1.4rem;
        }

        .carousel-content p {
            font-size: 0.9rem;
        }

        .hero-btn {
            padding: 8px 18px;
            font-size: 0.9rem;
        }
    }

    /* Video section */
    .video-section {
        padding: 60px 0;
        background-color: #fdfdfd;
        text-align: center;
    }

    .video-container {
        max-width: 800px;
        margin: 0 auto;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 Aspect Ratio */
        height: 0;
        background: #000;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 12px;
    }

    .video-title {
        margin-bottom: 20px;
        font-size: 2.6rem;
        font-weight: 600;
        color: #25303a;
        /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
    }

    .video-description {
        max-width: 600px;
        margin: 20px auto 0;
        font-size: 0.95rem;
        color: #666;
        line-height: 1.6;
    }


    /* Section titles */
    .section-title {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }

    .section-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 15px;
    }

    .section-title p {
        font-size: 1.1rem;
        color: #666;
        max-width: 700px;
        margin: 0 auto;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 70px;
        height: 3px;
        background-color: var(--primary-color);
        margin: 20px auto 0;
    }

    /* Donation cards */
    .donation-section {
        padding: 80px 0;
        background-color: var(--light-color);
    }

    .donation-card {
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
    }


    .donation-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
    }

    .donation-img {
        width: 100%;
        height: 220px;
        overflow: hidden;
    }

    .donation-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .donation-card:hover .donation-img img {
        transform: scale(1.05);
    }

    .donation-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .donation-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--primary-color);
    }

    .donation-category {
        background-color: var(--secondary-color);
        color: white;
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        display: inline-block;
        margin-bottom: 10px;
    }

    .donation-description {
        font-size: 0.95rem;
        color: #666;
        flex-grow: 1;
    }

    .donation-progress {
        margin: 15px 0 10px;
    }


    .progress {
        height: 8px;
        border-radius: 10px;
        background-color: #e9e9e9;
        margin-bottom: 10px;
        overflow: hidden;
    }

    .progress-bar {
        background-color: var(--primary-color);
        height: 100%;
    }

    .donation-footer {
        border-top: 1px solid #eee;
        padding-top: 10px;
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .donation-footer small {
        font-size: 0.9rem;
        color: #444;
    }

    .donation-btn {
        margin-top: 15px;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 30px;
        padding: 8px 20px;
        font-size: 0.9rem;
        font-weight: 600;
        transition: var(--transition);
        text-align: center;
        text-decoration: none;
    }

    .donation-btn:hover {
        background-color: var(--dark-color);
        transform: translateY(-2px);
    }

    .donation-stat {
        text-align: center;
    }

    .stat-value {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .stat-label {
        font-size: 0.85rem;
        color: #777;
    }

    .donatur-table-section {
        margin-top: 60px;
        margin-bottom: 60px;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f8f9fa;
        /* optional biar beda dari section lain */
    }


    /* About section */
    .about-section {
        padding: 80px 0;
        background: linear-gradient(#198754, #166921);
        /* ganti path ini sesuai gambarmu */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #f1f1f1;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .about-content {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .about-section h2 {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 25px;
        color: #ffffff;
    }

    .about-section p {
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 15px;
        color: #dddddd;
    }


    /* Partner section */
    .partner-section {
        padding: 80px 0;
        background-color: white;
    }

    .partner-card {
        text-align: center;
        padding: 20px;
        transition: var(--transition);
        margin-bottom: 20px;
    }

    .partner-card:hover {
        transform: translateY(-5px);
    }

    .partner-logo {
        width: 120px;
        height: 120px;
        object-fit: contain;
        margin-bottom: 15px;
        filter: grayscale(70%);
        transition: var(--transition);
    }

    .partner-card:hover .partner-logo {
        filter: grayscale(0%);
    }

    .partner-name {
        font-weight: 600;
        color: #555;
    }

    /* Footer */
    footer {
        background-color: #1B5E20;
        color: white;
        padding-top: 50px;
    }

    .footer-top {
        margin-bottom: 30px;
    }

    .footer-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 2px;
        background-color: var(--accent-color);
    }

    .footer-contact li {
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
    }

    .footer-contact i {
        margin-right: 10px;
        color: var(--accent-color);
    }

    .social-links a {
        display: inline-block;
        width: 36px;
        height: 36px;
        background-color: rgba(255, 255, 255, 0.1);
        text-align: center;
        line-height: 36px;
        border-radius: 50%;
        margin-right: 10px;
        transition: var(--transition);
    }

    .social-links a:hover {
        background-color: var(--accent-color);
        transform: translateY(-3px);
    }

    .footer-bottom {
        background-color: rgba(0, 0, 0, 0.2);
        padding: 15px 0;
        margin-top: 30px;
        text-align: center;
    }

    /* Back to top button */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 44px;
        height: 44px;
        background-color: var(--primary-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
        z-index: 99;
    }

    .back-to-top.active {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top:hover {
        background-color: var(--dark-color);
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .carousel-content h1 {
            font-size: 2.5rem;
        }

        .hero-slider {
            height: 70vh;
        }

        .video-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 768px) {
        .carousel-content h1 {
            font-size: 2rem;
        }

        .section-title h2 {
            font-size: 2rem;
        }

        .hero-slider {
            height: 60vh;
            margin-top: 60px;
        }

        .video-title {
            font-size: 1.8rem;
        }

        .video-section {
            padding: 60px 0;
        }
    }

    @media (max-width: 576px) {
        .carousel-content h1 {
            font-size: 1.8rem;
        }

        .hero-btn {
            padding: 10px 20px;
            font-size: 0.85rem;
        }

        .hero-slider {
            height: 30vh;
        }

        .video-title {
            font-size: 1.6rem;
        }

        .video-section {
            padding: 40px 0;
        }
    }
</style>
@section('content')

    <div class="hero-slider">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('asset/images/home 1.jpg') }}"class="d-block w-100" alt="...">
                    <div class="carousel-overlay">
                        <div class="carousel-content">
                            <h1>Membangun Masa Depan Bersama</h1>
                            <p>Dukung program-program pemberdayaan masyarakat kami</p>
                            <a href="#donation" class="hero-btn">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img src="{{ asset('asset/images/home 2.jpg') }}"class="d-block w-100" alt="...">
                    <div class="carousel-overlay">
                        <div class="carousel-content">
                            <h1>Membangun Masa Depan Bersama</h1>
                            <p>Dukung program-program pemberdayaan masyarakat kami</p>
                            <a href="#donation" class="hero-btn">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Tombol navigasi -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
    </div>


    <!-- Video Section -->
    <section class="video-section" id="video">
        <div class="container">
            <h2 class="video-title">Tebar Kebaikan Bersama LMI</h2>
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/Ghn3p4wepXc" title="Tebar Kebaikan Bersama LMI"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <p class="video-description">Mari bergabung dalam misi kemanusiaan kami untuk membantu sesama dan menyebarkan
                kebaikan di seluruh Indonesia.</p>
        </div>
    </section>

    <!-- Donation Section -->
    <section class="donation-section py-5" id="donation">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="fw-bold text-success">Tebar Kemuliaan Bersama Kami</h2>
                <p class="text-muted">Pilih program donasi yang sesuai dengan keinginan Anda untuk membantu mereka yang
                    membutuhkan.</p>
            </div>

            @php use Carbon\Carbon; @endphp

            <div class="row">
                @forelse ($donasi as $item)
                    <div class="col-md-4 mb-4">
                        <div class="donation-card">
                            <div class="donation-img">
                                <img src="{{ asset('storage/' . $item->img1) }}" alt="{{ $item->nama_donasi }}">
                            </div>
                            <div class="donation-body">
                                <h5 class="donation-title">{{ $item->nama_donasi }}</h5>
                                <span class="donation-category">{{ $item->kategori_donasi }}</span>
                                <p class="donation-description">{!! Str::limit(strip_tags($item->deskripsi_donasi), 80) !!}</p>

                                @php
                                    $perolehan = $item->perolehan_donasi ?? 0;
                                    $target = $item->target_donasi ?? 0;

                                    $persen = $target > 0 ? round(($perolehan / $target) * 100) : 0;
                                    $hariTersisa = Carbon::now()->diffInDays(Carbon::parse($item->masa_aktif), false);
                                    $warnaBar =
                                        $persen >= 100 ? 'bg-primary' : ($persen >= 50 ? 'bg-success' : 'bg-warning');
                                @endphp


                                <div class="donation-footer d-flex justify-content-between">
                                    <small>
                                        @if ($hariTersisa > 0)
                                            {{ $hariTersisa }} Hari Tersisa
                                        @else
                                            Donasi Ditutup
                                        @endif
                                    </small>
                                </div>


                                <a href="{{ route('user.detail', $item->id_donasi) }}"class="donation-btn mt-3">Donasi
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada data donasi.</p>
                @endforelse
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <h2 class="about-title">Sekilas LMI</h2>
                <div class="row">
                    <div class="col-md-6 about-text">
                        <p>
                            Lembaga Manajemen Infaq (LMI) adalah lembaga filantropi profesional yang berkhidmat mengangkat
                            harkat martabat masyarakat dhuafa (masyarakat kurang mampu) melalui penghimpunan dana ZISWAF
                            (zakat, infaq, sedekah, dan wakaf) masyarakat dan dana corporate social responsibility
                            perusahaan.
                        </p>
                    </div>
                    <div class="col-md-6 about-text">
                        <p>
                            Program-program sosial dan pemberdayaan masyarakat tidak mampu yang digulirkan telah menjadikan
                            dana masyarakat yang dihimpun LMI memiliki nilai tambah dan manfaat yang berlipat ganda bagi
                            masyarakat kurang mampu. Karena LMI berusaha senantiasa menumbuhkan iklim transparansi dan
                            profesionalitas untuk mengawal amanah masyarakat yang demikian besar.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- table transaksi --}}
    <section class="mt-5" id="transaksi">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2>Transaksi Donasi Terbaru</h2>
                <p>Berikut adalah daftar donasi terbaru dari para donatur</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="table-success text-white" style="background-color: #198754;">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Donatur</th>
                                            <th>Program Donasi</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transaksi as $t)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $t->nama_donatur }}</td>
                                                <td>{{ $t->donasi->nama_donasi ?? '-' }}</td>
                                                <td class="text-success fw-bold">Rp.
                                                    {{ number_format($t->jumlah_donasi, 0, ',', '.') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($t->tgl_transaksi)->format('d-m-Y') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">Belum ada transaksi masuk.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </section>


    <!-- Partner Section -->
    <section class="partner-section" id="partner">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2>Partner Bank</h2>
                <p>Lembaga Manajemen Infaq bekerjasama dengan bank-bank terpercaya</p>
            </div>
            <div class="row justify-content-center">
                @foreach ([
            'syariah.jpg' => 'Mandiri Syariah',
            'muamalat.jpg' => 'Muamalat',
            'mandiri.jpg' => 'Mandiri',
            'bca.jpg' => 'BCA',
        ] as $img => $name)
                    <div class="col-md-3 col-sm-6 col-6 mb-4 d-flex justify-content-center">
                        <div class="partner-card text-center">
                            <img class="partner-logo mb-3" src="{{ asset('asset/images/' . $img) }}"
                                alt="{{ $name }}">
                            <h5 class="partner-name">{{ $name }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Back to top button -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi Progress Bar
            document.querySelectorAll('.progress-bar').forEach(bar => {
                const target = parseInt(bar.getAttribute('data-target'));
                let width = 0;

                const interval = setInterval(() => {
                    if (width >= target) {
                        clearInterval(interval);
                    } else {
                        width++;
                        bar.style.width = width + '%';
                        bar.querySelector('.progress-text').textContent = width + '%';
                    }
                }, 10); // makin kecil makin cepat
            });

            // Animasi Jumlah Donasi
            document.querySelectorAll('.donation-amount').forEach(amountEl => {
                const targetAmount = parseInt(amountEl.getAttribute('data-amount'));
                let current = 0;

                const increment = Math.ceil(targetAmount / 100); // percepat animasi jika besar

                const interval = setInterval(() => {
                    if (current >= targetAmount) {
                        clearInterval(interval);
                        amountEl.textContent = 'Rp ' + numberFormat(targetAmount);
                    } else {
                        current += increment;
                        amountEl.textContent = 'Rp ' + numberFormat(current);
                    }
                }, 15);
            });

            function numberFormat(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
        });
    </script>
@endpush
