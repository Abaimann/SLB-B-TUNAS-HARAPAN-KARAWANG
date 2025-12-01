@extends('layouts-public.all')

@section('title', 'Daftar Kegiatan')

@section('content')

<div class="kegiatanpage-body">

    <div class="kegiatanpage-container">

        <div class="kegiatanpage-grid">

            @forelse($kegiatans as $item)

                <div class="kegiatanpage-card">

                    {{-- FOTO --}}
                    <div class="kegiatanpage-image-wrapper">
                        @if($item->galeri && $item->galeri->gambar)
                            <img src="{{ asset('storage/' . $item->galeri->gambar) }}"
                                 class="kegiatanpage-image"
                                 alt="{{ $item->judul_kegiatan }}">
                        @else
                            <img src="/no-image.png" class="kegiatanpage-image" alt="No Image">
                        @endif
                    </div>

                    {{-- CONTENT --}}
                    <div class="kegiatanpage-content">

                        <h3 class="kegiatanpage-card-title">
                            {{ $item->judul_kegiatan }}
                        </h3>

                        <p class="kegiatanpage-description">
                            {{ Str::limit(strip_tags($item->deskripsi), 150) }}
                        </p>

                        <div class="kegiatanpage-meta">

                            <div class="kegiatanpage-date">
                                <i>🗓️</i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </div>

                            <div class="kegiatanpage-author">
                                <i>👤</i>
                                {{ $item->user?->name ?? 'Admin' }}
                            </div>

                        </div>

                        <div class="kegiatanpage-footer">
                            <a href="{{ route('user.single-kegiatan', $item->id) }}"
                               class="kegiatanpage-read-more">
                                Baca Selengkapnya
                            </a>
                        </div>

                    </div>

                </div>

            @empty

                <div class="kegiatanpage-empty">
                    <div class="kegiatanpage-empty-icon">📭</div>
                    <div class="kegiatanpage-empty-text">
                        Belum ada kegiatan yang tersedia saat ini.
                    </div>
                </div>

            @endforelse

        </div>

        {{-- PAGINATION --}}
        @if ($kegiatans->hasPages())
        <div class="pagination" style="margin-top: 40px; text-align:center;">

            @if ($kegiatans->onFirstPage())
                <span class="pagination-text disabled">Sebelumnya</span>
            @else
                <a href="{{ $kegiatans->previousPageUrl() }}" class="pagination-text">Sebelumnya</a>
            @endif

            @for ($i = 1; $i <= $kegiatans->lastPage(); $i++)
                @if ($i == $kegiatans->currentPage())
                    <button class="pagination-btn active">{{ $i }}</button>
                @else
                    <a href="{{ $kegiatans->url($i) }}">
                        <button class="pagination-btn">{{ $i }}</button>
                    </a>
                @endif
            @endfor

            @if ($kegiatans->hasMorePages())
                <a href="{{ $kegiatans->nextPageUrl() }}" class="pagination-more">Selanjutnya</a>
            @else
                <span class="pagination-more disabled">Selanjutnya</span>
            @endif

        </div>
        @endif

    </div>

</div>

@endsection
