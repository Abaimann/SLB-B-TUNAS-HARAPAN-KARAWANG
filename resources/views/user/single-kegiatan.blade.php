@extends('layouts-public.all')

@section('title', $kegiatan->judul_kegiatan)

@section('content')

<div class="single-kegiatan-container">

    <div class="single-kegiatan-main">
        <div class="single-kegiatan-card">

            @if ($kegiatan->galeri && $kegiatan->galeri->gambar)
                <img src="{{ asset('storage/' . $kegiatan->galeri->gambar) }}"
                     alt="{{ $kegiatan->judul_kegiatan }}"
                     class="single-kegiatan-image">
            @endif

            <div class="single-kegiatan-content">

                <h1 class="single-kegiatan-title">{{ $kegiatan->judul_kegiatan }}</h1>

                <div class="single-kegiatan-meta">
                    Dipublikasikan {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}
                    • Oleh {{ $kegiatan->user->name ?? 'Admin' }}
                </div>

                <div class="single-kegiatan-text">
                    {!! $kegiatan->deskripsi !!}
                </div>

            </div>
        </div>
    </div>

    <aside class="single-kegiatan-sidebar">
        <div class="single-kegiatan-sidebar-section">

            <h3 class="single-kegiatan-sidebar-title">KEGIATAN LAINNYA</h3>

            <div class="single-kegiatan-sidebar-posts">

                @foreach ($kegiatanLainnya as $item)
                <a href="{{ route('user.single-kegiatan', $item->id) }}"
                   class="single-kegiatan-sidebar-item">

                    @if($item->galeri && $item->galeri->gambar)
                    <img src="{{ asset('storage/' . $item->galeri->gambar) }}"
                         alt="{{ $item->judul_kegiatan }}"
                         class="single-kegiatan-sidebar-item-image">
                    @endif

                    <div class="single-kegiatan-sidebar-item-content">

                        <div class="single-kegiatan-sidebar-item-date">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </div>

                        <h4 class="single-kegiatan-sidebar-item-title">
                            {{ $item->judul_kegiatan }}
                        </h4>

                        <p class="single-kegiatan-sidebar-item-excerpt">
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
