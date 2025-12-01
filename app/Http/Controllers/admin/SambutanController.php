<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sambutan;
use App\Models\Guru;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    // tampilkan sambutan (jika ada)
    public function index()
    {
        $sambutan = Sambutan::with(['kepalaGuru', 'fotoKepala'])->first();
        return view('admin.sambutan.index', compact('sambutan'));
    }

    // form create (jika belum ada)
    public function create()
    {
        if (Sambutan::exists()) {
            return redirect()->route('admin.sambutan.index')->with('info', 'Sambutan sudah ada. Silakan edit.');
        }
        $gurus = Guru::all();
        return view('admin.sambutan.create', compact('gurus'));
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'kepala_guru_id' => 'nullable|exists:gurus,id',
            'foto_kepala_id' => 'nullable|exists:gurus,id',
            'sambutan_kepala' => 'nullable|string',
        ]);

        Sambutan::create($request->only(['kepala_guru_id', 'foto_kepala_id', 'sambutan_kepala']));

        return redirect()->route('admin.sambutan.index')->with('success', 'Sambutan disimpan.');
    }

    // edit
    public function edit(Sambutan $sambutan)
    {
        $gurus = Guru::all();
        return view('admin.sambutan.edit', compact('sambutan', 'gurus'));
    }

    // update
    public function update(Request $request, Sambutan $sambutan)
    {
        $request->validate([
            'kepala_guru_id' => 'nullable|exists:gurus,id',
            'foto_kepala_id' => 'nullable|exists:gurus,id',
            'sambutan_kepala' => 'nullable|string',
        ]);

        $sambutan->update($request->only(['kepala_guru_id', 'foto_kepala_id', 'sambutan_kepala']));

        return redirect()->route('admin.sambutan.index')->with('success', 'Sambutan diperbarui.');
    }
}
