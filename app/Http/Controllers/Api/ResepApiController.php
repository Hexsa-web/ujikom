<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use Illuminate\Http\Request;
use App\Http\Resources\ResepResource;

class ResepApiController extends Controller
{
    // List semua resep yang sudah approved (untuk public)
    public function index()
    {
        $reseps = Resep::with('kategori')
                    ->approved()
                    ->latest()
                    ->paginate(12);

        return response()->json([
            'success' => true,
            'message' => 'Daftar resep berhasil diambil',
            'data'    => ResepResource::collection($reseps)
        ]);
    }

    // Detail satu resep
    public function show($id)
    {
        $resep = Resep::with('kategori')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $resep
        ]);
    }

    // List semua kategori
    public function kategori()
    {
        $kategoris = \App\Models\Kategori::all();

        return response()->json([
            'success' => true,
            'data'    => $kategoris
        ]);
    }

    // Resep milik user yang sedang login (semua status)
    public function myReseps()
    {
        $reseps = auth()->user()->reseps()
                    ->with('kategori')
                    ->latest()
                    ->get();

        return response()->json([
            'success' => true,
            'message' => 'Resep saya berhasil diambil',
            'data'    => $reseps
        ]);
    }
}