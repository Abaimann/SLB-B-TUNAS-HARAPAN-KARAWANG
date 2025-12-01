@extends('layouts-public.all')

@section('title', 'Prestasi')

@section('content')

<div class="prestasi-container">

    <div class="prestasi-grid">

        @forelse ($prestasis as $item)
        <div class="prestasi-card">

            {{-- GAMBAR PRESTASI --}}
            @if ($item->galeri?->gambar)
                <img src="{{ asset('storage/' . $item->galeri->gambar) }}"
                     alt="{{ $item->nama_prestasi }}"
                     class="prestasi-image">
            @else
                <img src="/no-image.png" class="prestasi-image">
            @endif

            <div class="prestasi-content">

                <span class="prestasi-badge tingkat">{{ $item->tingkat }}</span>
                <span class="prestasi-badge kategori">{{ $item->kategori }}</span>

                <h3 class="prestasi-title">{{ $item->nama_prestasi }}</h3>

                <div class="prestasi-date">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                </div>

                <p class="prestasi-description">
                    {{ Str::limit(strip_tags($item->deskripsi), 120) }}
                </p>

                <a href="{{ route('user.single-prestasi', $item->id) }}" class="btn-more">
                    Lihat Selengkapnya
                </a>

            </div>
        </div>
        @empty
            <p style="grid-column:1/-1; text-align:center;">Belum ada prestasi.</p>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    @if ($prestasis->hasPages())
    <div class="pagination">

        {{-- Tombol Sebelumnya --}}
        @if ($prestasis->onFirstPage())
            <span class="pagination-text disabled">Sebelumnya</span>
        @else
            <a href="{{ $prestasis->previousPageUrl() }}" class="pagination-text">Sebelumnya</a>
        @endif

        {{-- Nomor Halaman --}}
        @for ($i = 1; $i <= $prestasis->lastPage(); $i++)
            @if($i == $prestasis->currentPage())
                <button class="pagination-btn active">{{ $i }}</button>
            @else
                <a href="{{ $prestasis->url($i) }}">
                    <button class="pagination-btn">{{ $i }}</button>
                </a>
            @endif
        @endfor

        {{-- Tombol Selanjutnya --}}
        @if ($prestasis->hasMorePages())
            <a href="{{ $prestasis->nextPageUrl() }}" class="pagination-more">Selanjutnya</a>
        @else
            <span class="pagination-more disabled">Selanjutnya</span>
        @endif

    </div>
    @endif

</div>

@endsection
