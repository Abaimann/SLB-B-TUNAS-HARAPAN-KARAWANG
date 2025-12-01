@extends('layouts-public.all')

@section('title', 'Daftar Guru')

@section('content')

<section class="guru-section">

    <div class="guru-grid">

        @forelse ($gurus as $guru)
        <div class="guru-card">

            {{-- BADGE MENGGUNAKAN KETERANGAN --}}
            @if ($guru->keterangan)
                <div class="guru-badge">
                    {{ strtoupper($guru->keterangan) }}
                </div>
            @endif

            {{-- FOTO --}}
            <div class="guru-image-wrapper">
                @if($guru->foto)
                    <img src="{{ asset('storage/' . $guru->foto) }}"
                         alt="{{ $guru->nama }}"
                         class="guru-image">
                @endif
            </div>

            {{-- ISI --}}
            <div class="guru-content">

                {{-- NAMA --}}
                <h3 class="guru-name">{{ $guru->nama }}</h3>

                {{-- MAPEL --}}
                <p class="guru-mapel">{{ $guru->mapel }}</p>

            </div>

        </div>
        @empty

        <p style="grid-column:1/-1; text-align:center;">Belum ada guru.</p>

        @endforelse

    </div>

</section>

@endsection
