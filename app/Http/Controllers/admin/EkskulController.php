<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskuls = Ekskul::latest()->get();

        return view('admin.ekskul.index', [
            'title' => 'Ekskul',
            'ekskuls' => $ekskuls,
        ]);
    }

    public function create()
    {
        return view('admin.ekskul.create', [
            'title' => 'Tambah Ekskul',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'jadwal' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('ekskul', 'public');
        }

        Ekskul::create($validated);

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekskul berhasil ditambahkan.');
    }

    public function edit(Ekskul $ekskul)
    {
        return view('admin.ekskul.edit', [
            'title' => 'Edit Ekskul',
            'ekskul' => $ekskul,
        ]);
    }

    public function update(Request $request, Ekskul $ekskul)
    {
        $validated = $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'jadwal' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($ekskul->gambar) {
                Storage::delete('public/' . $ekskul->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('ekskul', 'public');
        }

        $ekskul->update($validated);

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekskul berhasil diperbarui.');
    }

    public function destroy(Ekskul $ekskul)
    {
        if ($ekskul->gambar) {
            Storage::delete('public/' . $ekskul->gambar);
        }

        $ekskul->delete();

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekskul berhasil dihapus.');
    }
}
