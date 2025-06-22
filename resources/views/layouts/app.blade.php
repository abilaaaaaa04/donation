<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MTs Al-Barokah')</title>
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="{{ asset('asset/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/et-line-font/et-line-font.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/admin/font-awesome/css/font-awesome.min.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
      @stack('styles')
</head>
<body>
    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Konten Halaman --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="{{asset('asset/admin/js/jquery.min.js') }}"></script>
    <script src="{{asset('asset/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/admin/js/ovio.js')}}"></script>

    <!-- charts -->
    <script src="{{asset('asset/admin/plugins/charts/code/modules/exporting.js')}}"></script>
    <script src="{{asset('asset/admin/plugins/charts/chart-functions.js')}}"></script>
    <script src="{{asset('asset/admin/plugins/charts/code/highcharts.js')}}"></script>

    {{-- Script tambahan --}}
    @stack('scripts')
</body>
</html>
