<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // INDEX
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('backend.kategori.index', compact('kategoris'));
    }

    // CREATE
    public function create()
    {
        return view('backend.kategori.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        Kategori::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('backend.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // DELETE
    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();

        return redirect()->route('backend.kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
