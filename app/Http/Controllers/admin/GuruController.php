<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $gurus = Guru::when($search, function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('admin.guru.index', [
            'title' => 'Data Guru',
            'gurus' => $gurus,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('admin.guru.create', [
            'title' => 'Tambah Guru',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'email' => 'required|email|unique:gurus,email',
            'no_hp' => 'nullable|string|max:20',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($validated);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', [
            'title' => 'Edit Guru',
            'guru' => $guru,
        ]);
    }

    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'email' => 'required|email|unique:gurus,email,' . $guru->id,
            'no_hp' => 'nullable|string|max:20',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                Storage::delete('public/' . $guru->foto);
            }
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($validated);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::delete('public/' . $guru->foto);
        }

        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
