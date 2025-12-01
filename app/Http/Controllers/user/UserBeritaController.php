<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class UserBeritaController extends Controller
{
    public function index()
    {
        // Memuat relasi galeri
        $beritas = Berita::with('galeri')
            ->latest()
            ->paginate(8);

        return view('user.berita', compact('beritas'));
    }

    public function show($slug)
    {
        // Berita + relasi galeri
        $berita = Berita::with('galeri')
            ->where('slug', $slug)
            ->firstOrFail();

        // Berita lainnya + relasi galeri
        $beritaLainnya = Berita::with('galeri')
            ->where('slug', '!=', $slug)
            ->latest()
            ->take(5)
            ->get();

        return view('user.single-berita', compact('berita', 'beritaLainnya'));
    }
}
