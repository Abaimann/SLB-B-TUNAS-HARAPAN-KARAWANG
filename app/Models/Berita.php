<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'konten',
        'galeri_id',
        'tanggal',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'galeri_id');
    }
}
