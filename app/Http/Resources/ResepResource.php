<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResepResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'judul'       => $this->judul,
            'penerbit'    => $this->penerbit,
            'deskripsi'   => $this->deskripsi,
            'kategori'    => $this->kategori?->nama,   // contoh
            'bahan'       => $this->bahan,
            'langkah'     => $this->langkah,
            'status'      => $this->status,
            'foto'        => $this->foto,
            'foto_url'    => $this->foto_url,          // Full URL
            'created_at'  => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}