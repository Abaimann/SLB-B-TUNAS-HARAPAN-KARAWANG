<nav class="sidebar d-flex flex-column p-3 text-white">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-5 fw-bold">Admin SLB B</span>
  </a>

  <hr>

  <ul class="nav nav-pills flex-column mb-auto">

    {{-- Dashboard --}}
    <li class="nav-item">
      <a href="{{ route('dashboard') }}"
         class="nav-link {{ request()->routeIs('dashboard') ? 'active' : 'text-white' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>
    </li>

    <li><hr></li>

    {{-- Hero --}}
    <li>
      <a href="{{ route('admin.hero.index') }}"
        class="nav-link {{ request()->routeIs('admin.hero.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-images me-2"></i> Hero
      </a>
    </li>

    {{-- Sambutan --}}
    <li>
      <a href="{{ route('admin.sambutan.index') }}"
        class="nav-link {{ request()->routeIs('admin.sambutan.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-person-video3 me-2"></i> Sambutan Kepsek
      </a>
    </li>

    {{-- Berita --}}
    <li>
      <a href="{{ route('admin.berita.index') }}"
         class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-newspaper me-2"></i> Berita
      </a>
    </li>

    {{-- Galeri --}}
    <li>
      <a href="{{ route('admin.galeri.index') }}"
         class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-images me-2"></i> Galeri
      </a>
    </li>

    {{-- PPDB --}}
    <li>
      <a href="{{ route('admin.ppdb.index') }}"
         class="nav-link {{ request()->routeIs('admin.ppdb.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-people me-2"></i> PPDB
      </a>
    </li>

    {{-- Kegiatan --}}
    <li>
      <a href="{{ route('admin.kegiatan.index') }}"
         class="nav-link {{ request()->routeIs('admin.kegiatan.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-calendar-event me-2"></i> Kegiatan
      </a>
    </li>

    {{-- Ekskul --}}
    <li>
      <a href="{{ route('admin.ekskul.index') }}"
         class="nav-link {{ request()->routeIs('admin.ekskul.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-trophy me-2"></i> Ekskul
      </a>
    </li>

    {{-- Prestasi --}}
    <li>
      <a href="{{ route('admin.prestasi.index') }}"
         class="nav-link {{ request()->routeIs('admin.prestasi.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-star me-2"></i> Prestasi
      </a>
    </li>

    {{-- Guru --}}
    <li>
      <a href="{{ route('admin.guru.index') }}"
         class="nav-link {{ request()->routeIs('admin.guru.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-person-badge me-2"></i> Guru
      </a>
    </li>

    {{-- Lokasi --}}
    <li>
      <a href="{{ route('admin.lokasi.index') }}"
         class="nav-link {{ request()->routeIs('admin.lokasi.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-geo-alt me-2"></i> Lokasi
      </a>
    </li>

    <li><hr></li>

    {{-- Users (Kelola Admin) --}}
    <li>
      <a href="{{ route('admin.users.index') }}"
         class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : 'text-white' }}">
        <i class="bi bi-person-gear me-2"></i> Users
      </a>
    </li>

    <li><hr></li>

    {{-- Logout --}}
    <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link text-white border-0 w-100 text-start">
          <i class="bi bi-box-arrow-right me-2"></i> Log out
        </button>
      </form>
    </li>

  </ul>
</nav>
