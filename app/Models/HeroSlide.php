<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $table = 'hero_slides';

    protected $fillable = [
        'judul',
        'deskripsi',
        'label',
        'foto',
        'urutan',
    ];

    public $timestamps = true;
}
