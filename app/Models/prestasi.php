<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'user_id',
        'galeri_id',
        'kategori',
        'nama_prestasi',
        'tingkat',
        'tanggal',
        'deskripsi',
    ];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class);
    }
}
