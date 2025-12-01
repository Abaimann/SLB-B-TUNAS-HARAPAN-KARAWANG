@extends('layouts-public.all')

@section('title', 'Beranda')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="hero-slider">

        @foreach($sliders as $index => $item)
        <div class="slide {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/' . $item->image) }}" 
                alt="{{ $item->title }}" 
                class="slide-bg">

            <div class="slide-content">
                <div class="value-label">Dedikasi Kami</div>
                <h1 class="value-title">{{ strtoupper($item->title) }}</h1>
                <p class="value-description">{{ $item->subtitle }}</p>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Slider Dots -->
    <div class="slider-dots">
        @foreach($sliders as $index => $dot)
            <span class="dot {{ $index == 0 ? 'active' : '' }}" data-slide="{{ $index }}"></span>
        @endforeach
    </div>
</section>


<!-- Sambutan Kepala Sekolah -->
<section class="welcome-section">
    <div class="welcome-container">

        <div class="welcome-content">

            <h2 class="welcome-title">Sambutan Kepala Sekolah</h2>

            {!! $sambutan->sambutan_kepala !!}

            <div class="principal-info">

                <h3 class="principal-name">
                    {{ $sambutan->kepalaGuru?->nama ?? 'Nama Kepala Sekolah' }}
                </h3>

                <p class="principal-title">
                    {{ $sambutan->kepalaGuru?->jabatan ?? 'Kepala Sekolah' }}
                </p>

            </div>
        </div>

        <div class="welcome-image">
            <div class="image-wrapper">

                <img src="{{ asset('storage/' . ($sambutan->fotoKepala?->foto ?? 'default.jpg')) }}"
                    alt="Foto Kepala Sekolah"
                    class="principal-img">

            </div>
        </div>

    </div>
</section>



<!-- ====================== BERITA DINAMIS ====================== -->
<section class="news-section" id="berita">
    <div class="news-container">

        <div class="section-header">
            <h2 class="section-title">Info Terbaru</h2>
            <p class="section-subtitle">Informasi terkini seputar kegiatan dan pencapaian sekolah</p>
        </div>

        <div class="news-grid">

            @forelse($berita as $item)
            <div class="news-card">
                <div class="news-image-wrapper">
                <img 
                    src="{{ $item->galeri?->gambar ? asset('storage/' . $item->galeri->gambar) : asset('default.jpg') }}"
                    alt="{{ $item->judul }}" 
                    class="news-image">
                </div>
                <div class="news-content">
                    <h3 class="news-title">{{ $item->judul }}</h3>
                    <p class="news-description">
                        {{ Str::limit(strip_tags($item->konten), 120) }}
                    </p>
                    <div class="news-footer">
                        <a href="{{ route('user.single-berita', $item->slug) }}" class="read-more">
                            READ MORE
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <p style="grid-column:1/-1;text-align:center">Belum ada berita.</p>
            @endforelse

        </div>

    </div>
</section>



<!-- Ekstrakurikuler Section (STATIS) -->
<section class="ekskul-section" id="ekskul">
    <div class="ekskul-container">

        <div class="section-header">
            <h2 class="section-title">Ekstrakurikuler</h2>
            <p class="section-subtitle">Kembangkan bakat dan minat siswa melalui berbagai kegiatan ekstrakurikuler</p>
        </div>

        <div class="ekskul-grid">
            
            <div class="ekskul-card">
                <div class="ekskul-icon">⚽</div>
                <span class="ekskul-badge">Olahraga</span>
                <h3 class="ekskul-title">Futsal & Sepak Bola</h3>
                <p class="ekskul-description">
                    Melatih kerjasama tim, sportivitas, dan kebugaran jasmani dengan pembina berpengalaman.
                </p>
            </div>

            <div class="ekskul-card">
                <div class="ekskul-icon">🎨</div>
                <span class="ekskul-badge">Seni</span>
                <h3 class="ekskul-title">Seni & Budaya</h3>
                <p class="ekskul-description">
                    Mengasah kreativitas melalui tari, teater, dan seni rupa.
                </p>
            </div>

            <div class="ekskul-card">
                <div class="ekskul-icon">🚩</div>
                <span class="ekskul-badge">Akademik</span>
                <h3 class="ekskul-title">Pramuka & Paksibra</h3>
                <p class="ekskul-description">
                    Mengembangkan kemampuan riset ilmiah dan teknologi robotika.
                </p>
            </div>

        </div>
    </div>
</section>



<!-- ====================== GALERI DINAMIS ====================== -->
<section class="galeri-section" id="galeri">
    <div class="galeri-container">

        <div class="section-header">
            <h2 class="section-title">Galeri Kami</h2>
            <p class="section-subtitle">Dokumentasi kegiatan dan momen berharga di sekolah</p>
        </div>

        <div class="galeri-grid">

            @forelse($galeri as $item)
            <div class="galeri-card">
                <img src="{{ asset('storage/' . $item->gambar) }}" 
                        alt="{{ $item->judul }}" 
                        class="galeri-image">
                <div class="galeri-overlay">
                    <h3 class="galeri-title">{{ $item->judul }}</h3>
                    <p class="galeri-date">{{ $item->created_at->format('d F Y') }}</p>
                </div>
            </div>
            @empty
                <p style="grid-column:1/-1;text-align:center">Belum ada foto galeri.</p>
            @endforelse

        </div>
    </div>
</section>

@endsection
