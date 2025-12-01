<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Guru;
use App\Models\Lokasi;
use App\Models\Galeri;
use App\Models\Ppdb;


class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function berita()
    {
        // Jika ingin tampilkan list berita di halaman /berita
        $berita = Berita::latest()->paginate(6);

        return view('user.berita', compact('berita'));
    }

    public function galeri()
    {
        $galeris = Galeri::latest()->paginate(9);
        return view('user.galeri', compact('galeris'));
    }


    public function prestasi()
    {
        return view('user.prestasi');
    }

    public function guru()
    {
        $gurus = Guru::latest()->get();
        return view('user.guru', compact('gurus'));
    }

    public function kegiatan()
    {
        return view('user.kegiatan');
    }

    public function ppdb()
    {
        return view('user.ppdb');
    }

    public function sejarah()
    {
        return view('user.sejarah');
    }

    public function ekskul()
    {
        $ekskuls = Ekskul::latest()->paginate(6);
        return view('user.ekskul', compact('ekskuls'));
    }

    public function lokasi()
    {
        $lokasi = Lokasi::first();
        return view('user.lokasi', compact('lokasi'));
    }
}
