@extends('layouts-public.all')

@section('title', 'Galeri')

@section('content')

<section class="galeri-main-section">

    <div class="galeri-grid-container">

        @forelse($galeris as $item)
        <div class="galeri-item-card"
             {{-- Panggil openLightbox dengan data dinamis --}}
             onclick="openLightbox('{{ asset('storage/' . $item->gambar) }}',
                                   '{{ $item->judul }}',
                                   '{{ $item->created_at->format('d M Y') }}')">

            <div class="galeri-image-wrapper">
                <img src="{{ asset('storage/' . $item->gambar) }}"
                    alt="{{ $item->judul }}"
                    class="galeri-item-image">

                <div class="galeri-image-overlay">
                    <div class="galeri-zoom-icon">🔍</div>
                </div>
            </div>

            <div class="galeri-item-content">
                <h3 class="galeri-item-title">{{ $item->judul }}</h3>

                <div class="galeri-item-date">
                    {{ $item->created_at->format('d M Y') }}
                </div>

                <p class="galeri-item-description">
                    {{ $item->deskripsi }}
                </p>
            </div>

        </div>
        @empty

        <p style="grid-column: 1 / -1; text-align:center;">
            Belum ada galeri.
        </p>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    @if ($galeris->hasPages())
    <div class="pagination">

        {{-- Tombol Sebelumnya --}}
        @if ($galeris->onFirstPage())
            <span class="pagination-text disabled">Sebelumnya</span>
        @else
            <a href="{{ $galeris->previousPageUrl() }}" class="pagination-text">Sebelumnya</a>
        @endif


        {{-- Nomor Halaman --}}
        @for ($i = 1; $i <= $galeris->lastPage(); $i++)
            @if($i == $galeris->currentPage())
                <button class="pagination-btn active">{{ $i }}</button>
            @else
                <a href="{{ $galeris->url($i) }}">
                    <button class="pagination-btn">{{ $i }}</button>
                </a>
            @endif
        @endfor


        {{-- Tombol Selanjutnya --}}
        @if ($galeris->hasMorePages())
            <a href="{{ $galeris->nextPageUrl() }}" class="pagination-more">Selanjutnya</a>
        @else
            <span class="pagination-more disabled">Selanjutnya</span>
        @endif

    </div>
    @endif

</section>


{{-- Lightbox --}}
<div class="galeri-lightbox-modal" id="lightbox">
    <button class="galeri-lightbox-close" onclick="closeLightbox()">×</button>
    {{-- Tombol navigasi (‹ dan ›) dihapus --}}

    <div class="galeri-lightbox-content">
        {{-- Atribut src dan alt dikosongkan, akan diisi oleh JavaScript --}}
        <img id="lightboxImage" src="" alt="" class="galeri-lightbox-image"> 

        <div class="galeri-lightbox-info">
            <h3 class="galeri-lightbox-title" id="lightboxTitle"></h3>
            <p class="galeri-lightbox-date" id="lightboxDate"></p>
        </div>
    </div>
</div>

@endsection

{{-- PENTING: Jika Anda menggunakan Blade, Anda bisa meletakkan kode JS di bagian ini,
    atau di file terpisah yang di-load setelah konten ini. --}}
@push('scripts')
<script>
// (Letakkan kode JS lengkap di bawah ini, atau load dari file terpisah)
// Lihat bagian 2 di bawah untuk kode JavaScript lengkapnya.
</script>
@endpush