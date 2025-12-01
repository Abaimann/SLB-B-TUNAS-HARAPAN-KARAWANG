@extends('layouts-public.all')

@section('title', $berita->judul)

@section('content')

<div class="post-detail-container">

    <!-- Main Content -->
    <div class="post-detail-main">
        <div class="post-detail-card">

            @if ($berita->galeri && $berita->galeri->gambar)
                <img src="{{ asset('storage/' . $berita->galeri->gambar) }}" 
                     alt="{{ $berita->judul }}"
                     class="post-detail-image">
            @endif

            <div class="post-detail-content">

                <h1 class="post-detail-title">{{ $berita->judul }}</h1>

                <div class="post-detail-meta">
                    Dipublikasikan {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                    • Oleh {{ $berita->user->name ?? 'Admin' }}
                </div>

                <div class="post-detail-text">
                    {!! $berita->konten !!}
                </div>

            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <aside class="post-detail-sidebar">
        <div class="post-detail-sidebar-section">

            <h3 class="post-detail-sidebar-title">BERITA LAINNYA</h3>

            <div class="post-detail-sidebar-posts">

                @foreach ($beritaLainnya as $item)
                <a href="{{ route('user.single-berita', $item->slug) }}" 
                   class="post-detail-sidebar-item">

                    @if($item->galeri && $item->galeri->gambar)
                    <img src="{{ asset('storage/' . $item->galeri->gambar) }}" 
                         alt="{{ $item->judul }}"
                         class="post-detail-sidebar-item-image">
                    @endif

                    <div class="post-detail-sidebar-item-content">

                        <div class="post-detail-sidebar-item-date">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </div>

                        <h4 class="post-detail-sidebar-item-title">
                            {{ $item->judul }}
                        </h4>

                        <p class="post-detail-sidebar-item-excerpt">
                            {{ Str::limit(strip_tags($item->konten), 60) }}
                        </p>

                    </div>

                </a>
                @endforeach

            </div>

        </div>
    </aside>

</div>

@endsection
