<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;

class UserPrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::latest()->paginate(6);

        return view('user.prestasi', compact('prestasis'));
    }

    public function show($id)
    {
        // Prestasi utama
        $prestasi = Prestasi::findOrFail($id);

        // Sidebar (prestasi lain, kecuali yang sedang dibuka)
        $prestasiLainnya = Prestasi::where('id', '!=', $id)
            ->latest()
            ->limit(4)
            ->get();

        return view('user.single-prestasi', compact('prestasi', 'prestasiLainnya'));
    }
}
