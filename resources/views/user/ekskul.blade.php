@extends('layouts-public.all')

@section('title', 'Daftar Ekstrakurikuler')

@section('content')

<div class="ekskulpage-container">

    <div class="ekskulpage-grid">

        @forelse ($ekskuls as $item)
        <div class="ekskulpage-card">

            <div class="ekskulpage-image-wrapper">

                @if ($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                         alt="{{ $item->nama_ekskul }}"
                         class="ekskulpage-image">
                @else
                    <img src="https://via.placeholder.com/800x450?text=No+Image"
                         alt="Default"
                         class="ekskulpage-image">
                @endif

                {{-- Badge kategori (opsional jika kamu menambah field kategori) --}}
            </div>


            <div class="ekskulpage-content">

                {{-- Nama ekskul --}}
                <h3 class="ekskulpage-card-title">{{ $item->nama_ekskul }}</h3>

                {{-- Opsional kalau kamu punya deskripsi di database --}}
                @if (!empty($item->deskripsi))
                    <p class="ekskulpage-description">
                        {{ Str::limit(strip_tags($item->deskripsi), 150) }}
                    </p>
                @endif

                {{-- Jadwal ekskul --}}
                <div class="ekskulpage-meta">
                    <div class="ekskulpage-jadwal">
                        <span class="ekskulpage-jadwal-icon">📅</span>
                        <span>{{ $item->jadwal }}</span>
                    </div>
                </div>

                {{-- Pembina --}}
                <div class="ekskulpage-meta" style="border-top: none; padding-top: 10px; margin-top: 0;">
                    <div class="ekskulpage-pembina">
                        <span class="ekskulpage-pembina-icon">👤</span>
                        <span>{{ $item->pembina }}</span>
                    </div>
                </div>

            </div>

        </div>
        @empty

        {{-- EMPTY STATE --}}
        <div class="ekskul-empty">
            <div class="ekskul-empty-icon">📭</div>
            <p class="ekskul-empty-text">
                Belum ada ekstrakurikuler yang tersedia saat ini.<br>
                Pantau terus untuk update kegiatan terbaru!
            </p>
            <a href="{{ route('home') }}" class="ekskul-btn">Kembali ke Beranda</a>
        </div>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    @if ($ekskuls->hasPages())
    <div class="pagination">

        {{-- Tombol Previous --}}
        @if ($ekskuls->onFirstPage())
            <span class="pagination-text disabled">Sebelumnya</span>
        @else
            <a href="{{ $ekskuls->previousPageUrl() }}" class="pagination-text">Sebelumnya</a>
        @endif


        {{-- Nomor halaman --}}
        @for ($i = 1; $i <= $ekskuls->lastPage(); $i++)
            @if ($i == $ekskuls->currentPage())
                <button class="pagination-btn active">{{ $i }}</button>
            @else
                <a href="{{ $ekskuls->url($i) }}">
                    <button class="pagination-btn">{{ $i }}</button>
                </a>
            @endif
        @endfor


        {{-- Tombol Next --}}
        @if ($ekskuls->hasMorePages())
            <a href="{{ $ekskuls->nextPageUrl() }}" class="pagination-more">Selanjutnya</a>
        @else
            <span class="pagination-more disabled">Selanjutnya</span>
        @endif

    </div>
    @endif

</div>

@endsection
