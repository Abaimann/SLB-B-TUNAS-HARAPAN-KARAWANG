<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'galeri_id',
        'judul_kegiatan',
        'deskripsi',
        'tanggal',
    ];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
