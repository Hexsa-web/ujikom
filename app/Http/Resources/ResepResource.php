<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResepResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'penerbit' => $this->penerbit,
            'deskripsi' => $this->deskripsi,

            'foto' => $this->foto,

            // 🔥 FIX UTAMA DI SINI
            'foto_url' => url('storage/' . $this->foto),

            'kategori' => [
                'id' => $this->kategori->id ?? null,
                'nama' => $this->kategori->nama ?? null,
            ],

            'bahan' => $this->bahan,
            'langkah' => $this->langkah,
        ];
    }
}