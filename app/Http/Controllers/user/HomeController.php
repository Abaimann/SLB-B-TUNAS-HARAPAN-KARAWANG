<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Prestasi;
use App\Models\Kegiatan;
use App\Models\Lokasi;
use App\Models\HeroSlide;
use App\Models\Sambutan;

class HomeController extends Controller
{
    public function index()
    {
        // Slider Hero
        $sliders = HeroSlide::orderBy('id')->take(5)->get();

        // Sambutan Kepala Sekolah
        $sambutan = Sambutan::first();

        // Data lainnya (dinamis)
        $berita = Berita::latest()->take(3)->get();
        $galeri = Galeri::latest()->take(6)->get();
        $prestasi = Prestasi::latest()->take(3)->get();
        $kegiatan = Kegiatan::latest()->take(4)->get();

        // Lokasi Sekolah
        $lokasi = Lokasi::first();

        return view('user.home', compact(
            'sliders',
            'sambutan',
            'berita',
            'galeri',
            'prestasi',
            'kegiatan',
            'lokasi'
        ));
    }
}
