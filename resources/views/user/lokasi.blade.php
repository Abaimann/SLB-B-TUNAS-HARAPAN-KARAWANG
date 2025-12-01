@extends('layouts-public.all')

@section('title', 'Lokasi Sekolah')

@section('content')

<div class="lokasi-container">
    <div class="lokasi-content">

        <!-- Info Section -->
        <div class="lokasi-info">

            <div class="lokasi-logo-section">
                <div class="lokasi-logo-circle">
                    @if($lokasi->logo)
                        <img src="{{ asset('storage/' . $lokasi->logo) }}" 
                             alt="{{ $lokasi->nama_sekolah }}">
                    @endif
                </div>

                <div class="lokasi-school-name">
                    <h2 class="lokasi-school-title">{{ $lokasi->nama_sekolah }}</h2>
                </div>
            </div>

            <!-- Detail Lokasi -->
            <div class="lokasi-details">

                <div class="lokasi-detail-item">
                    <div class="lokasi-icon">📍</div>
                    <div class="lokasi-detail-content">
                        <div class="lokasi-detail-label">Alamat Lengkap</div>
                        <div class="lokasi-detail-text">
                            {{ $lokasi->alamat }}
                        </div>
                    </div>
                </div>

                <div class="lokasi-detail-item">
                    <div class="lokasi-icon">📞</div>
                    <div class="lokasi-detail-content">
                        <div class="lokasi-detail-label">Telepon</div>
                        <div class="lokasi-detail-text">
                            {{ $lokasi->nomor_telpon }}
                        </div>
                    </div>
                </div>

                @if($lokasi->email)
                <div class="lokasi-detail-item">
                    <div class="lokasi-icon">✉️</div>
                    <div class="lokasi-detail-content">
                        <div class="lokasi-detail-label">Email</div>
                        <div class="lokasi-detail-text">
                            {{ $lokasi->email }}
                        </div>
                    </div>
                </div>
                @endif

            </div>

            <div class="lokasi-action-buttons">

                <!-- Tombol Buka di Maps -->
                <a href="https://maps.app.goo.gl/CZuwqYD9Zry139uz7" 
                   target="_blank" 
                   class="lokasi-btn lokasi-btn-primary">
                    🗺️ Buka di Maps
                </a>

                <!-- Tombol Hubungi via WhatsApp -->
                @if($lokasi->nomor_telpon)
                    <a href="https://wa.me/62{{ substr($lokasi->nomor_telpon, 1) }}?text=Halo%20{{ urlencode($lokasi->nama_sekolah) }}" 
                       target="_blank" 
                       class="lokasi-btn lokasi-btn-secondary">
                        💬 Hubungi Kami
                    </a>
                @endif
            </div>

        </div>

        <!-- Map Section -->
        <div class="lokasi-map">

            <!-- IFRAME GOOGLE MAPS -->
            @if($lokasi->gmaps_embed)
                <div class="lokasi-map-frame">
                    {!! $lokasi->gmaps_embed !!}
                </div>
            @endif

            <div class="lokasi-map-overlay">
                <div class="lokasi-map-title">📍 Lokasi Strategis</div>
                <p class="lokasi-map-address">
                    Mudah dijangkau dari pusat kota dengan akses transportasi umum yang lengkap
                </p>
            </div>

        </div>
    </div>
</div>

@endsection
