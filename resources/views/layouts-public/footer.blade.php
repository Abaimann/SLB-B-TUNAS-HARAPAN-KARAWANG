<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">

            {{-- About Section --}}
            <div class="footer-section footer-about">
                <div class="footer-logo">
                    <div class="footer-logo-circle">
                        <img 
                            src="{{ $lokasi->logo ? asset('storage/' . $lokasi->logo) : asset('assets/img/logo-satap.png') }}" 
                            alt="Logo">
                    </div>
                    <div class="footer-logo-text">
                        {{ $lokasi->nama_sekolah ?? 'Nama Sekolah' }}
                    </div>
                </div>

                <p class="footer-description">
                    {{ $lokasi->deskripsi_singkat ?? 'Sekolah unggulan yang berkomitmen mencetak generasi terbaik.' }}
                </p>

                <div class="social-media">
                    <a href="https://www.facebook.com/share/1ABUtox2uG/" class="social-link-facebook" target="_blank" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.tiktok.com/@slb.b.thk?_r=1&_t=ZS-91fXY1ZUEFN" class="social-link-tiktok" target="_blank" title="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://www.instagram.com/slbbtunasharapan?igsh=MWZla3gwZjJ1czU0cA==" class="social-link-instagram" target="_blank" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="footer-section">
                <h3>Menu Cepat</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('user.berita') }}">Berita</a></li>
                    <li><a href="{{ route('user.galeri') }}">Galeri</a></li>
                    <li><a href="{{ route('user.prestasi') }}">Prestasi</a></li>
                    <li><a href="{{ route('user.ekskul') }}">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('user.kegiatan') }}">Kegiatan</a></li>
                </ul>
            </div>

            {{-- Information --}}
            <div class="footer-section">
                <h3>Informasi</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('user.sejarah') }}">Sejarah</a></li>
                    <li><a href="{{ route('user.guru') }}">Guru & Staff</a></li>
                    <li><a href="{{ route('user.lokasi') }}">Lokasi</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="footer-section">
                <h3>Hubungi Kami</h3>
                <ul class="footer-contact">

                    <li>
                        <span class="icon">📍</span>
                        <span>{{ $lokasi->alamat ?? 'Alamat belum diisi' }}</span>
                    </li>

                    <li>
                        <span class="icon">📞</span>
                        <span>{{ $lokasi->nomor_telpon ?? '-' }}</span>
                    </li>

                    <li>
                        <span class="icon">✉️</span>
                        <span>{{ $lokasi->email ?? '-' }}</span>
                    </li>

                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; {{ date('Y') }} <a href="#">{{ $lokasi->nama_sekolah ?? 'Nama Sekolah' }}</a>. All Rights Reserved.
            </div>
        </div>

    </div>
</footer>
