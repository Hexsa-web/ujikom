<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // Simpan pesan dari user (frontend)
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Kontak::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    // Tampilkan daftar pesan di backend
    public function index()
    {
        $kontaks = Kontak::latest()->paginate(10);
        return view('backend.kontak.index', compact('kontaks'));
    }

    // Hapus pesan
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('backend.kontak.index')->with('success', 'Pesan berhasil dihapus!');
    }
}
