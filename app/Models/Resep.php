<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto', 'judul', 'penerbit', 'deskripsi', 'kategori_id', 
        'bahan', 'langkah', 'status'
    ];

    protected $casts = [
        'bahan'   => 'array',
        'langkah' => 'array',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'penerbit', 'name');
    }

    // Cek apakah resep ini milik user tertentu
    public function isOwnedBy($user)
    {
        if (!$user) return false;
        return $this->penerbit === $user->name;
    }

    // Cek apakah resep ini sudah difavoritkan oleh user tertentu
    public function isFavoritedBy($user)
    {
        if (!$user) return false;
        return $this->favoritedBy()->where('user_id', $user->id)->exists();
    }

    // Scope: Hanya tampilkan resep yang sudah di-approve
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Relasi Favorite
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'resep_id', 'user_id')
                    ->withTimestamps();
    }
}