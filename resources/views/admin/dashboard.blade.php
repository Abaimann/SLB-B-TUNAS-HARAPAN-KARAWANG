@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container mt-4">


    {{-- PANEL INFORMASI --}}
    <div class="mt-4 mb-4 card shadow-sm border-0">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Informasi</h5>
            <p>Gunakan menu di sidebar untuk mengelola semua data sekolah mulai dari berita, guru, kegiatan, galeri, dan lainnya.</p>
        </div>
    </div>

    {{-- JUDUL --}}
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard Admin</h2>
        <p class="text-muted">Selamat datang kembali 👋</p>
    </div>

    {{-- STATISTIK --}}
    <div class="row g-3">

        {{-- Berita --}}
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white" style="background:#0d6efd;">
                <div class="card-body">
                    <h6 class="text-uppercase">Berita</h6>
                    <h3 class="fw-bold">{{ $beritaCount }}</h3>
                </div>
            </div>
        </div>

        {{-- Galeri --}}
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white" style="background:#dc3545;">
                <div class="card-body">
                    <h6 class="text-uppercase">Galeri</h6>
                    <h3 class="fw-bold">{{ $galeriCount }}</h3>
                </div>
            </div>
        </div>

        {{-- Guru --}}
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white" style="background:#198754;">
                <div class="card-body">
                    <h6 class="text-uppercase">Guru</h6>
                    <h3 class="fw-bold">{{ $guruCount }}</h3>
                </div>
            </div>
        </div>

        {{-- Kegiatan --}}
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white" style="background:#fd7e14;">
                <div class="card-body">
                    <h6 class="text-uppercase">Kegiatan</h6>
                    <h3 class="fw-bold">{{ $kegiatanCount }}</h3>
                </div>
            </div>
        </div>

        {{-- Prestasi --}}
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white" style="background:#6f42c1;">
                <div class="card-body">
                    <h6 class="text-uppercase">Prestasi</h6>
                    <h3 class="fw-bold">{{ $prestasiCount }}</h3>
                </div>
            </div>
        </div>

        {{-- Ekskul --}}
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white" style="background:#0dcaf0;">
                <div class="card-body">
                    <h6 class="text-uppercase">Ekskul</h6>
                    <h3 class="fw-bold">{{ $ekskulCount }}</h3>
                </div>
            </div>
        </div>

        {{-- PPDB --}}
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white" style="background:#6610f2;">
                <div class="card-body">
                    <h6 class="text-uppercase">PPDB</h6>
                    <h3 class="fw-bold">{{ $ppdbCount }}</h3>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
