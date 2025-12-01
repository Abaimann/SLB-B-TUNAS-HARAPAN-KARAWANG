<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'mapel',
        'foto',
        'email',
        'no_hp',
        'keterangan',
    ];    


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function home()
    {
        return $this->hasOne(Home::class, 'kepala_guru_id');
    }

}
