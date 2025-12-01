<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Import semua model
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Kegiatan;
use App\Models\Prestasi;
use App\Models\Ekskul;
use App\Models\Ppdb;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'beritaCount'    => Berita::count(),
            'galeriCount'    => Galeri::count(),
            'guruCount'      => Guru::count(),
            'kegiatanCount'  => Kegiatan::count(),
            'prestasiCount'  => Prestasi::count(),
            'ekskulCount'    => Ekskul::count(),
            'ppdbCount'      => Ppdb::count(),
        ]);
    }
}
