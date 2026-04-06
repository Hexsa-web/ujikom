<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    /**
     * Cek apakah user adalah Admin
     */
    public function isAdmin(): bool
    {
        return $this->is_admin === 1 || $this->is_admin === true;
    }

    // Relasi: User punya banyak Resep (karena penerbit pakai name)
    public function reseps()
    {
        return $this->hasMany(Resep::class, 'penerbit', 'name');
    }

    // Relasi Favorite
    public function favorites()
    {
        return $this->belongsToMany(Resep::class, 'favorites', 'user_id', 'resep_id')
                    ->withTimestamps();
    }
}