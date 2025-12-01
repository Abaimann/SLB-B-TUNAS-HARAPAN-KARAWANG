<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::latest()->get();

        return view('admin.lokasi.index', [
            'title' => 'Lokasi Sekolah',
            'lokasis' => $lokasis,
        ]);
    }

    public function create()
    {
        return view('admin.lokasi.create', [
            'title' => 'Tambah Lokasi Sekolah',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'alamat' => 'required|string',
            'nomor_telpon' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'gmaps_embed' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('lokasi', 'public');
        }

        $validated['user_id'] = auth()->id();

        Lokasi::create($validated);

        return redirect()->route('admin.lokasi.index')->with('success', 'Data lokasi berhasil ditambahkan.');
    }

    public function edit(Lokasi $lokasi)
    {
        return view('admin.lokasi.edit', [
            'title' => 'Edit Lokasi Sekolah',
            'lokasi' => $lokasi,
        ]);
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'alamat' => 'required|string',
            'nomor_telpon' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'gmaps_embed' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($lokasi->logo) {
                Storage::disk('public')->delete($lokasi->logo);
            }
            $validated['logo'] = $request->file('logo')->store('lokasi', 'public');
        }

        $lokasi->update($validated);

        return redirect()->route('admin.lokasi.index')->with('success', 'Data lokasi berhasil diperbarui.');
    }

    public function destroy(Lokasi $lokasi)
    {
        if ($lokasi->logo) {
            Storage::disk('public')->delete($lokasi->logo);
        }

        $lokasi->delete();

        return redirect()->route('admin.lokasi.index')->with('success', 'Data lokasi berhasil dihapus.');
    }
}
