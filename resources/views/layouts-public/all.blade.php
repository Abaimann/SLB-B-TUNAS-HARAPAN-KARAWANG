<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Icon.png') }}">
    <title>SLB-B Tunas Harapan Karawang</title>

    {{-- CSS Global --}}
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/berita.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/galeri.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/single-berita.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/single-kegiatan.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/single-prestasi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ekskul.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kegiatan.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/guru.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lokasi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sejarah.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/prestasi.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ppdb.css') }}">

    {{-- BOOTSTRAP ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


    @stack('styles')
</head>
<body>

    {{-- NAVBAR --}}
    @include('layouts-public.navbar')

    {{-- MAIN CONTENT --}}
    <main class="content-wrapper">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts-public.footer')

    {{-- JS Global --}}
    <script src="{{ asset('assets/js/all.js') }}"></script>
    <script src="{{ asset('assets/js/galeri.js') }}"></script>

    @stack('scripts')
</body>
</html>
