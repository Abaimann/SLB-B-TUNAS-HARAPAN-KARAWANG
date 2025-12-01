<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    protected $table = 'sambutans';

    protected $fillable = [
        'kepala_guru_id',
        'foto_kepala_id',
        'sambutan_kepala',
    ];

    public function kepalaGuru()
    {
        return $this->belongsTo(Guru::class, 'kepala_guru_id');
    }

    public function fotoKepala()
    {
        return $this->belongsTo(Guru::class, 'foto_kepala_id');
    }
}
