<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;

    protected $table = 'layouts';

    protected $fillable = [
        'logo',
        'nama_sekolah',
        'deskripsi',
        'email',
        'jadwal_sekolah',
        'lokasi_id',
    ];


    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
