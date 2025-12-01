<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class UserKegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with(['galeri', 'user'])
            ->latest()
            ->paginate(9);

        return view('user.kegiatan', compact('kegiatans'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with(['galeri', 'user'])->findOrFail($id);

        $kegiatanLainnya = Kegiatan::with('galeri')
            ->where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get();

        return view('user.single-kegiatan', compact('kegiatan', 'kegiatanLainnya'));
    }
}
