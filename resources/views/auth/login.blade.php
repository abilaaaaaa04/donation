<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #89cfae, #408650, #57e0a0);
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .logo-container {
            background: white;
            padding: 15px;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin: 0 auto 15px auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .form-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #198754;
        }

        .form-input {
            padding-left: 40px;
        }

        .footer-text {
            font-size: 13px;
            color: #ccc;
        }

        .footer-text a {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center">
        <div class="logo-container">
            <img src="{{ asset('asset/images/logo.jpg') }}"alt="Logo Masjid" class="img-fluid">
        </div>
        <h4 class="fw-bold text-success"><i class="fas fa-mosque me-1"></i> Masjid Jami Al-Barokah</h4>
        <p class="text-muted">Silahkan masuk ke akun admin anda</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="mb-3 position-relative">
            <i class="fas fa-user form-icon"></i>
            <input type="text" name="email" class="form-control form-input" placeholder="Masukkan username anda" required autofocus>
        </div>

        <div class="mb-3 position-relative">
            <i class="fas fa-lock form-icon"></i>
            <input type="password" name="password" class="form-control form-input" placeholder="Masukkan password anda" required>
        </div>

        <button type="submit" class="btn btn-success w-100 rounded-pill">
            <i class="fas fa-sign-in-alt me-1"></i> Masuk
        </button>
    </form>

    <div class="text-center mt-3 footer-text">
        © 2025 Masjid Jami Al-Barokah | <a href="#">Lupa Password?</a>
    </div>
</div>

</body>
</html>
