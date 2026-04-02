<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use Illuminate\Support\Facades\Storage;

class ResepUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'foto'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'bahan'       => 'required|string',
            'langkah'     => 'required|string',
        ]);

        $bahanArray  = array_filter(explode("\n", trim($request->bahan)));
        $langkahArray = array_filter(explode("\n", trim($request->langkah)));

        $fotoPath = $request->file('foto')->store('resep', 'public');

        Resep::create([
            'foto'        => $fotoPath,
            'judul'       => $request->judul,
            'penerbit'    => auth()->user()->name,
            'deskripsi'   => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'bahan'       => $bahanArray,
            'langkah'     => $langkahArray,
            'status'      => 'pending',           // ← Penting!
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Resep berhasil dikirim! Menunggu persetujuan admin.');
    }

    public function destroy(Resep $resep)
    {
        if (!$resep->isOwnedBy(auth()->user())) {
            abort(403, 'Anda tidak berhak menghapus resep ini.');
        }

        if ($resep->foto) {
            Storage::disk('public')->delete($resep->foto);
        }

        $resep->delete();

        return redirect()->route('profile.index')
            ->with('success', 'Resep berhasil dihapus.');
    }
}