<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';

    protected $fillable = [
        'user_id',
        'nama_sekolah',
        'deskripsi_singkat',
        'alamat',
        'nomor_telpon',
        'email',
        'gmaps_embed',
        'logo',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
