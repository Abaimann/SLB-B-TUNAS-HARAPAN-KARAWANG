<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function beritas()
    {
        return $this->hasMany(Berita::class);
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }

    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }

    public function ekskuls()
    {
        return $this->hasMany(Ekskul::class);
    }

    public function prestasis()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function lokasi()
    {
        return $this->hasMany(Lokasi::class);
    }

    public function ppdb()
    {
        return $this->hasMany(Ppdb::class);
    }


}
