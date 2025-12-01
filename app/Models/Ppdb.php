<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;

    protected $table = 'ppdb';

    protected $fillable = [
        'user_id',

        // DATA PRIBADI
        'nama_lengkap',
        'nama_panggilan',
        'tempat_tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_hp',
        'alamat_rumah',

        // DATA PENDIDIKAN
        'asal_sekolah',
        'alamat_sekolah',

        // AYAH
        'nama_ayah',
        'telepon_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',

        // IBU
        'nama_ibu',
        'telepon_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',

        // WALI
        'nama_wali',
        'telepon_wali',
        'alamat_wali',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
