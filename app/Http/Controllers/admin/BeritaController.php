<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with(['user', 'galeri'])->latest()->paginate(10); // mengambil data dari model berita sekalian relasi nya

        return view('admin.berita.index', [
            'title' => 'Berita', // membuat variabel judul
            'beritas' => $beritas, // membuat variabel beritas yang isinya data dari migration model
        ]);
    }

    public function create()
    {
        $galeris = Galeri::all(); // mengambil data dari galeri

        return view('admin.berita.create', [
            'title' => 'Tambah Berita',
            'galeris' => $galeris, // membuat variabel beritas yang isinya data dari migration model
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([ // validasi  isi form
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'galeri_id' => 'required|exists:galeris,id',
        ]);

        $validated['slug'] = Str::slug($validated['judul']); // membuat slug otomatis dan menghilangkan character aneh
        $validated['user_id'] = auth()->id(); // otomatis memasukan user id yang membuat berita tersebut
        $validated['tanggal'] = now()->format('Y-m-d'); // membuat otomatis tanggal dan mengatur format tanggal

        Berita::create($validated); // memasukan semua data yang di store ke db

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $beritum)
    {
        $galeris = Galeri::all();

        return view('admin.berita.edit', [
            'title' => 'Edit Berita',
            'berita' => $beritum, 
            'galeris' => $galeris, 
        ]);
    }

    public function update(Request $request, Berita $beritum)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'galeri_id' => 'nullable|exists:galeris,id',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['tanggal'] = now()->format('Y-m-d');

        $beritum->update($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $beritum)
    {
        $beritum->delete(); // delete dari index

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
