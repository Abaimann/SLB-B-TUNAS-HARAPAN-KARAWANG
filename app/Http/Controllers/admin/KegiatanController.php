<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Galeri;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with(['user', 'galeri'])->latest()->paginate(10);

        return view('admin.kegiatan.index', [
            'title' => 'Kegiatan Sekolah',
            'kegiatans' => $kegiatans,
        ]);
    }

    public function create()
    {
        return view('admin.kegiatan.create', [
            'title' => 'Tambah Kegiatan',
            'galeris' => Galeri::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'galeri_id' => 'nullable|exists:galeris,id',
        ]);

        $validated['user_id'] = auth()->id();

        Kegiatan::create($validated);

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', [
            'title'     => 'Edit Kegiatan',
            'kegiatan'  => $kegiatan,
            'galeris'   => Galeri::all(),
        ]);
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'galeri_id' => 'nullable|exists:galeris,id',
        ]);

        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}
