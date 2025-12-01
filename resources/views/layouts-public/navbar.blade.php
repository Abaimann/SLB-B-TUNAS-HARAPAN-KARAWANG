<header class="header">
    <div class="nav-container">

        {{-- LOGO --}}
        <div class="logo">
            <div class="logo-circle">
                <img 
                    src="{{ $lokasi->logo ? asset('storage/' . $lokasi->logo) : asset('assets/img/Logo-Satap.png') }}" 
                    alt="{{ $lokasi->nama_sekolah ?? 'Logo Sekolah' }}" 
                    class="logo-img">
            </div>

            <span class="logo-text">
                {{ $lokasi->nama_sekolah ?? 'Nama Sekolah' }}
            </span>
        </div>

        {{-- MOBILE TOGGLE --}}
        <button class="menu-toggle" onclick="toggleMenu()">
            ☰
        </button>

        {{-- NAVIGATION --}}
        <nav id="navMenu">
            <ul class="nav-menu">

                {{-- HOME --}}
                <li><a class="menu-gw" href="{{ route('home') }}">Beranda</a></li>

                {{-- DROPDOWN INFORMASI --}}
                <li class="dropdown">
                    <a href="#" class="menu-gw dropdown-toggle" onclick="toggleDropdown(event)">
                        <span>Informasi</span>
                        <span class="arrow">▼</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="menu-gw" href="{{ route('user.sejarah') }}">SEJARAH</a></li>
                        <li><a class="menu-gw" href="{{ route('user.guru') }}">GURU</a></li>
                        <li><a class="menu-gw" href="{{ route('user.lokasi') }}">LOKASI</a></li>
                    </ul>
                </li>

                {{-- PAGES --}}
                <li><a class="menu-gw" href="{{ route('user.berita') }}">Berita</a></li>
                <li><a class="menu-gw" href="{{ route('user.galeri') }}">Galeri</a></li>
                <li><a class="menu-gw" href="{{ route('user.prestasi') }}">Prestasi</a></li>
                <li><a class="menu-gw" href="{{ route('user.kegiatan') }}">Kegiatan</a></li>
                <li><a class="menu-gw" href="{{ route('user.ekskul') }}">Ekskul</a></li>
                <li><a class="menu-gw" href="{{ route('user.ppdb') }}">PPDB</a></li>

                {{-- LOGIN --}}
                <div class="nav-actions">
                    <a href="{{ route('login') }}" class="login-btn">LOGIN ADMIN</a>
                </div>

            </ul>
        </nav>

    </div>
</header>
