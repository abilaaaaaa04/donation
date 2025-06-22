<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Masjid')</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- layout CSS --}}
    <link rel="stylesheet" href="{{ asset('asset/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/et-line-font/et-line-font.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/admin/font-awesome/css/font-awesome.min.css') }}" />

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- CSS tambahan --}}
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Poppins', sans-serif;">
    <div class="wrapper">

        {{-- Navbar --}}
        @include('layoutsAdmin.header')

        {{-- Sidebar --}}
        @include('layoutsAdmin.sidebar')

        {{-- Konten --}}
        <div class="content-wrapper py-4">
            @yield('content')
        </div>
        {{-- Footer --}}
    </div>
    @include('layoutsAdmin.footer')
    {{-- JS --}}
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
