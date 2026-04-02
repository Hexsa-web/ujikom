<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    // INDEX - Daftar semua resep (termasuk pending)
    public function index()
    {
        $reseps = Resep::with('kategori')->latest()->get();
        return view('backend.resep.index', compact('reseps'));
    }

    // CREATE - Form tambah resep oleh admin
    public function create()
    {
        $kategoris = Kategori::all();
        return view('backend.resep.create', compact('kategoris'));
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto'        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul'       => 'required|string|max:255',
            'penerbit'    => 'required|string|max:100',
            'deskripsi'   => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'bahan'       => 'required|array|min:1',
            'bahan.*.nama'   => 'required|string|max:255',
            'bahan.*.jumlah' => 'nullable|string|max:100',
            'langkah'     => 'required|array|min:1',
            'langkah.*'   => 'required|string',
        ]);

        $foto = $request->file('foto')->store('resep', 'public');

        Resep::create([
            'foto'        => $foto,
            'judul'       => $request->judul,
            'penerbit'    => $request->penerbit,
            'deskripsi'   => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'bahan'       => $request->bahan,
            'langkah'     => $request->langkah,
            'status'      => 'approved',   // Admin langsung approved
        ]);

        return redirect()->route('backend.resep.index')
            ->with('success', 'Resep berhasil ditambahkan');
    }

    // SHOW
    public function show(Resep $resep)
    {
        $resep->load('kategori');
        return view('backend.resep.show', compact('resep'));
    }

    // EDIT
    public function edit(Resep $resep)
    {
        $kategoris = Kategori::all();
        return view('backend.resep.edit', compact('resep', 'kategoris'));
    }

    // UPDATE
    public function update(Request $request, Resep $resep)
    {
        $validated = $request->validate([
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul'       => 'required|string|max:255',
            'penerbit'    => 'required|string|max:100',
            'deskripsi'   => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'bahan'       => 'required|array|min:1',
            'bahan.*.nama'   => 'required|string|max:255',
            'bahan.*.jumlah' => 'nullable|string|max:100',
            'langkah'     => 'required|array|min:1',
            'langkah.*'   => 'required|string',
        ]);

        $data = $request->only(['judul', 'penerbit', 'deskripsi', 'kategori_id', 'bahan', 'langkah']);

        if ($request->hasFile('foto')) {
            if ($resep->foto) {
                Storage::disk('public')->delete($resep->foto);
            }
            $data['foto'] = $request->file('foto')->store('resep', 'public');
        }

        $resep->update($data);

        return redirect()->route('backend.resep.index')
            ->with('success', 'Resep berhasil diperbarui');
    }

    // DESTROY
    public function destroy(Resep $resep)
    {
        if ($resep->foto) {
            Storage::disk('public')->delete($resep->foto);
        }
        $resep->delete();

        return redirect()->route('backend.resep.index')
            ->with('success', 'Resep berhasil dihapus');
    }

    // ================== FITUR APPROVE & REJECT ==================

    /**
     * Approve resep dari user
     */
    public function approve(Resep $resep)
    {
        $resep->update(['status' => 'approved']);

        return redirect()->route('backend.resep.index')
            ->with('success', 'Resep berhasil disetujui dan dipublikasikan.');
    }

    /**
     * Reject resep dari user
     */
    public function reject(Resep $resep)
    {
        $resep->update(['status' => 'rejected']);

        return redirect()->route('backend.resep.index')
            ->with('success', 'Resep telah ditolak.');
    }
}