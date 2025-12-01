<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\Galeri;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::with('galeri')->latest()->get();

        return view('admin.prestasi.index', [
            'title' => 'Prestasi Sekolah',
            'prestasis' => $prestasis,
        ]);
    }

    public function create()
    {
        return view('admin.prestasi.create', [
            'title' => 'Tambah Prestasi',
            'galeris' => Galeri::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tingkat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
            'galeri_id' => 'nullable|exists:galeris,id',
        ]);

        $validated['user_id'] = auth()->id();

        Prestasi::create($validated);

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', [
            'title' => 'Edit Prestasi',
            'prestasi' => $prestasi,
            'galeris' => \App\Models\Galeri::latest()->get(),
        ]);
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tingkat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
            'galeri_id' => 'nullable|exists:galeris,id',
        ]);

        $prestasi->update($validated);

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }
}
