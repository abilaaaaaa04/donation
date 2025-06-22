@extends('layouts.app')

@section('title', 'Pembayaran Donasi')

@push('styles')
    <style>
        :root {
            --green: #28a745;
            --green-dark: #1e7e34;
            --yellow: #ffc107;
            --yellow-dark: #e0a800;
            --light: #f8f9fa;
            --gray: #6c757d;
            --text: #343a40;
            --shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        }

        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            color: var(--text);
        }

        .header-thanks {
            background-color: var(--green);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .card-section {
            background: white;
            padding: 1.25rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            box-shadow: var(--shadow);
        }

        .step-list {
            list-style: none;
            padding-left: 0;
        }

        .step-list li {
            display: flex;
            align-items: start;
            gap: 10px;
            margin-bottom: 12px;
        }

        .step-icon {
            background-color: var(--green);
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            text-align: center;
            font-size: 0.85rem;
            line-height: 24px;
            font-weight: bold;
        }

        .whatsapp-button {
            background-color: #25D366;
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            font-weight: 500;
            transition: background 0.3s;
        }

        .whatsapp-button:hover {
            background-color: #128C7E;
        }

        .bank-account {
            background-color: var(--light);
            padding: 1rem;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
            box-shadow: var(--shadow);
        }

        .copy-btn {
            background-color: var(--yellow);
            border: none;
            padding: 6px 14px;
            border-radius: 5px;
            font-weight: 500;
            font-size: 0.85rem;
            transition: background 0.2s;
        }

        .copy-btn:hover {
            background-color: var(--yellow-dark);
        }

        .detail-box {
            background-color: #fffbea;
            border-left: 4px solid var(--yellow-dark);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .detail-box i {
            color: var(--green);
            margin-right: 6px;
        }

        .contact-box a {
            text-decoration: none;
        }

        .email-box {
            background: white;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
    </style>
@endpush

@section('content')
<div class="card-section text-center">
    <h5><i class="bi bi-qr-code-scan"></i> Scan QRIS</h5>
    <img src="{{ asset('asset/images/qris.jpg') }}" alt="QRIS" style="max-width: 200px;" class="img-fluid mb-2">
    <p class="text-muted">Gunakan aplikasi e-wallet atau m-banking Anda untuk scan QR ini.</p>
</div>
    <div class="container">
        <div class="header-thanks">
            Terima kasih atas donasi Anda kepada <strong>Lembaga Manajemen Infaq</strong>
        </div>


        <div class="row">
            {{-- Kolom kiri --}}
            <div class="col-md-7">
                <div class="card-section">
                    <h5><i class="bi bi-list-ul"></i> Tata Cara Pembayaran</h5>
                    <ul class="step-list">
                        <li><span class="step-icon">1</span> Mohon melakukan pembayaran sesuai Nominal Donasi yang tertera
                            pada detail donasi</li>
                        <li><span class="step-icon">2</span> Setelah melakukan transfer, konfirmasi segera dengan
                            mencantumkan bukti Foto & Kode Transaksi</li>
                        <li><span class="step-icon">3</span> Kirim konfirmasi melalui WhatsApp ke nomor yang tertera</li>
                    </ul>
                    <a href="https://wa.me/6282230000909" class="whatsapp-button">
                        <i class="fab fa-whatsapp"></i> Konfirmasi via WhatsApp
                    </a>
                </div>

                <div class="card-section">
                    <h5><i class="bi bi-bank"></i> Daftar Rekening Bank</h5>
                    @foreach ($banks as $bank)
                        <div class="bank-account">
                            <div>
                                <strong>{{ $bank['nama'] }}</strong><br>
                                <small>{{ $bank['no_rek'] }} ({{ $bank['pemilik'] }})</small>
                            </div>
                            <button class="copy-btn" onclick="copyToClipboard('{{ $bank['no_rek'] }}')">Salin</button>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Kolom kanan --}}
            <div class="col-md-5">
                <div class="card-section">
                    <h5><i class="bi bi-receipt"></i> Detail Donasi</h5>
                    <div class="detail-box">
                        <p><i class="bi bi-person-fill"></i> Nama: {{ $donatur->nama_donatur }}</p>
                        <p><i class="bi bi-cash-stack"></i> Nominal Donasi: <strong>Rp
                                {{ number_format($donatur->jumlah_donasi, 0, ',', '.') }}</strong></p>
                        <p><i class="bi bi-key"></i> Kode Transaksi: {{ $donatur->kode_transaksi }}</p>
                        <button class="copy-btn mt-2" onclick="copyToClipboard('{{ $donatur->kode_transaksi }}')">Salin
                            Kode</button>
                    </div>
                </div>

                <div class="card-section contact-box">
                    <h5><i class="bi bi-question-circle"></i> Butuh Bantuan?</h5>
                    <p>Jika Anda mengalami kesulitan dalam proses pembayaran, silakan hubungi tim kami melalui:</p>
                    <a href="https://wa.me/6282230000909" class="whatsapp-button d-block mb-2">
                        <i class="fab fa-whatsapp"></i> WhatsApp: 0822 3000 0909
                    </a>
                    <div class="email-box">
                        <i class="bi bi-envelope-fill"></i>
                        <span>Email: <a href="mailto:info@lmi.or.id">info@lmi.or.id</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text)
                .then(() => alert("Teks berhasil disalin"))
                .catch(() => alert("Gagal menyalin teks"));
        }
    </script>
@endpush
