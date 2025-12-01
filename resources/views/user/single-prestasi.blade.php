@extends('layouts-public.all')

@section('title', $prestasi->judul_prestasi)

@section('content')

<div class="single-prestasi-container">

    {{-- Main Content --}}
    <div class="single-prestasi-main">
        <div class="single-prestasi-card">

            {{-- GAMBAR UTAMA --}}
            @if ($prestasi->galeri?->gambar)
                <img src="{{ asset('storage/' . $prestasi->galeri->gambar) }}"
                     alt="{{ $prestasi->judul_prestasi }}"
                     class="single-prestasi-image">
            @else
                <img src="/no-image.png" class="single-prestasi-image">
            @endif

            <div class="single-prestasi-content">

                <h1 class="single-prestasi-title">{{ $prestasi->judul_prestasi }}</h1>

                <div class="single-prestasi-meta">
                    Dipublikasikan {{ \Carbon\Carbon::parse($prestasi->tanggal)->format('d M Y') }}
                    • Oleh {{ $prestasi->user->name ?? 'Admin' }}
                </div>

                <div class="single-prestasi-text">
                    {!! $prestasi->deskripsi !!}
                </div>

            </div>
        </div>
    </div>

    {{-- Sidebar --}}
    <aside class="single-prestasi-sidebar">
        <div class="single-prestasi-sidebar-section">

            <h3 class="single-prestasi-sidebar-title">PRESTASI LAINNYA</h3>

            <div class="single-prestasi-sidebar-posts">

                @foreach ($prestasiLainnya as $item)
                <a href="{{ route('user.single-prestasi', $item->id) }}"
                   class="single-prestasi-sidebar-item">

                    {{-- GAMBAR SIDEBAR --}}
                    @if($item->galeri?->gambar)
                        <img src="{{ asset('storage/' . $item->galeri->gambar) }}"
                             alt="{{ $item->judul_prestasi }}"
                             class="single-prestasi-sidebar-item-image">
                    @else
                        <img src="/no-image.png" class="single-prestasi-sidebar-item-image">
                    @endif

                    <div class="single-prestasi-sidebar-item-content">

                        <div class="single-prestasi-sidebar-item-date">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </div>

                        <h4 class="single-prestasi-sidebar-item-title">
                            {{ $item->judul_prestasi }}
                        </h4>

                        <p class="single-prestasi-sidebar-item-excerpt">
                            {{ Str::limit(strip_tags($item->deskripsi), 60) }}
                        </p>

                    </div>

                </a>
                @endforeach

            </div>

        </div>
    </aside>

</div>

@endsection
