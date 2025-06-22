
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        #footer {
            background: linear-gradient(135deg, #0d6832 0%, #158547 100%);
            padding: 50px 0 20px;
            color: #ffffff;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }

        .section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .font-bold {
            font-weight: 600;
        }

        .font-lg {
            font-size: 20px;
            margin-bottom: 1rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .font-sm {
            font-size: 13px;
        }

        .font-medium {
            font-weight: 500;
        }

        .line {
            width: 80px;
            height: 3px;
            background: #ffffff;
            margin-bottom: 1.2rem;
            border-radius: 2px;
            position: relative;
        }

        .line::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #d4af37;
            border-radius: 2px;
        }

        .text-center {
            text-align: center;
        }

        .txt-right {
            text-align: right;
        }

        .pb-3 {
            padding-bottom: 1rem;
        }

        .col-md-5, .col-md-7, .col-md-12 {
            width: 100%;
            margin-bottom: 1.5rem;
        }

        .contact-info p {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .contact-info i {
            width: 32px;
            height: 32px;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 10px;
            font-size: 14px;
        }

        .social-media {
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            margin-top: 1.2rem;
        }

        .follow {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .follow:hover {
            background-color: #d4af37;
            color: #0d6832;
            transform: translateY(-3px);
        }

        .copyright-bar {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            font-size: 13px;
        }

        @media (min-width: 768px) {
            .col-md-5 {
                width: 41.666667%;
                float: left;
            }

            .col-md-7 {
                width: 58.333333%;
                float: left;
            }

            .col-md-12 {
                width: 100%;
                clear: both;
            }
        }

        @media (max-width: 768px) {
            .txt-right {
                text-align: left;
            }

            .social-media {
                justify-content: flex-start;
            }
        }
    </style>
<body>
    <div class="row" id="footer">
        <div class="section">
            <div class="col-md-5">
                <h2 class="font-bold font-lg">AL - BAROKAH</h2>
                <section class="line"></section>
                <div class="contact-info">
                    <p class="font-sm font-medium"><i class="fa fa-map-marker-alt"></i> Masjid Jami Al-Barokah <br>Jl. Ampera Poncol Babakan, Setu Tangsel</p>
                    <p class="font-sm font-medium"><i class="fa fa-phone-alt"></i> 0812 9885 0904</p>
                    <p class="font-sm font-medium"><i class="fab fa-whatsapp"></i> 0812 9885 0904</p>
                    <p class="font-sm font-medium"><i class="fa fa-envelope"></i> albarokahtangsel@gmail.com</p>
                </div>
            </div>
            <div class="col-md-7 txt-right">
                <h2 class="font-bold font-lg pb-3">KUNJUNGI SOSIAL MEDIA KAMI</h2>
                <section class="line" style="margin-left: auto;"></section>
                <div class="social-media">
                    <a href="https://www.instagram.com/jamialbarokahtangsel/" class="follow"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/JamiAlBarokahOfficial/?locale=id_ID" class="follow"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/albarokah" class="follow"><i class="fab fa-twitter"></i></a>
                    <a href="https://youtu.be/Ghn3p4wepXc?si=_4mKPS7sQdr1SrDJ" class="follow"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="copyright-bar">
                    <b>Masjid Jami Al-Barokah - 2025</b>
                </div>
            </div>
        </div>
    </div>
</body>
