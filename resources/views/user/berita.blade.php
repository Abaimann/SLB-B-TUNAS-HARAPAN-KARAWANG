@extends('layouts-public.all')

@section('title', 'Daftar Berita')

@section('content')

<section class="berita-list-section">

    <div class="berita-list-grid">

        @forelse ($beritas as $item)
        <div class="berita-list-card">

            <div class="berita-list-image-wrapper">
                @if($item->galeri && $item->galeri->gambar)
                <img src="{{ asset('storage/' . $item->galeri->gambar) }}" 
                     alt="{{ $item->judul }}" 
                     class="berita-list-image">
                @endif
            </div>

            <div class="berita-list-content">

                <div class="berita-list-date">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                </div>

                <h3 class="berita-list-title">{{ $item->judul }}</h3>

                <p class="berita-list-description">
                    {{ Str::limit(strip_tags($item->konten), 120) }}
                </p>

                <a href="{{ route('user.single-berita', $item->slug) }}" 
                   class="berita-list-read-more">
                    Baca
                </a>

            </div>

        </div>
        @empty

        <p style="grid-column:1/-1; text-align:center;">Belum ada berita.</p>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    @if ($beritas->hasPages())
    <div class="pagination">

        {{-- Sebelumnya --}}
        @if ($beritas->onFirstPage())
            <span class="pagination-text disabled">Sebelumnya</span>
        @else
            <a href="{{ $beritas->previousPageUrl() }}" class="pagination-text">Sebelumnya</a>
        @endif

        {{-- Nomor --}}
        @for ($i = 1; $i <= $beritas->lastPage(); $i++)
            @if($i == $beritas->currentPage())
                <button class="pagination-btn active">{{ $i }}</button>
            @else
                <a href="{{ $beritas->url($i) }}">
                    <button class="pagination-btn">{{ $i }}</button>
                </a>
            @endif
        @endfor

        {{-- Selanjutnya --}}
        @if ($beritas->hasMorePages())
            <a href="{{ $beritas->nextPageUrl() }}" class="pagination-more">Selanjutnya</a>
        @else
            <span class="pagination-more disabled">Selanjutnya</span>
        @endif

    </div>
    @endif

</section>

@endsection
