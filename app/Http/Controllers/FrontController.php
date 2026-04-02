<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Homepage
     */
    public function index()
    {
        $kategoris = Kategori::latest()->get();

        // Hanya tampilkan resep yang sudah di-approve oleh admin
        $reseps = Resep::with('kategori')
                       ->approved()           // Scope dari model Resep
                       ->latest()
                       ->paginate(8);

        return view('welcome', compact('kategoris', 'reseps'));
    }

    /**
     * Halaman daftar resep berdasarkan kategori
     */
    public function kategori($id)
    {
        $kategori = Kategori::findOrFail($id);

        // Hanya tampilkan resep approved di kategori ini
        $reseps = Resep::where('kategori_id', $id)
            ->with('kategori')
            ->approved()
            ->latest()
            ->paginate(12);

        return view('front.kategori', compact('kategori', 'reseps'));
    }

    /**
     * Detail resep (route lama)
     */
    public function show($id)
    {
        $resep = Resep::with('kategori')->findOrFail($id);

        // Opsional: Cek apakah resep sudah approved (keamanan)
        if ($resep->status !== 'approved' && !auth()->user()?->isAdmin()) {
            abort(403, 'Resep ini belum disetujui oleh admin.');
        }

        return view('front.resep.show', compact('resep'));
    }

    /**
     * Detail resep menggunakan view show.blade.php (di root views/)
     */
    public function detail($id)
    {
        $resep = Resep::with('kategori')->findOrFail($id);

        if ($resep->status !== 'approved' && !auth()->user()?->isAdmin()) {
            abort(403, 'Resep ini belum disetujui oleh admin.');
        }

        return view('show', compact('resep'));
    }

    /**
     * Ambil semua resep yang sudah di-approve (untuk keperluan AJAX jika dibutuhkan)
     */
    public function allResep()
    {
        $reseps = Resep::with('kategori')
                       ->approved()
                       ->latest()
                       ->get();

        return response()->json($reseps);
    }
}