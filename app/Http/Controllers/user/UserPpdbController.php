<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPpdbController extends Controller
{
    public function store(Request $request)
    {
        // VALIDASI
        $validated = $request->validate([
            // DATA DIRI
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:20',
            'agama' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'alamat_rumah' => 'required|string',
        
            // DATA SEKOLAH
            'asal_sekolah' => 'required|string|max:255',
            'alamat_sekolah' => 'required|string|max:255',
        
            // AYAH
            'nama_ayah' => 'required|string|max:255',
            'telepon_ayah' => 'required|string|max:20',
            'pekerjaan_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',
        
            // IBU
            'nama_ibu' => 'required|string|max:255',
            'telepon_ibu' => 'required|string|max:20',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',
        
            // WALI (TIDAK WAJIB)
            'nama_wali' => 'nullable|string|max:255',
            'telepon_wali' => 'nullable|string|max:20',
            'alamat_wali' => 'nullable|string',
        ]);        

        // TAMBAH user_id otomatis
        $validated['user_id'] = Auth::id() ?? 1;

        // SIMPAN
        Ppdb::create($validated);

        return redirect()->back()->with('success', 'Formulir PPDB berhasil dikirim!');
    }
}
