<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resep;
use Illuminate\Http\Request;

class FavoriteApiController extends Controller
{
    // Toggle Favorite
    public function toggle(Resep $resep)
    {
        $user = auth()->user();

        if ($resep->isFavoritedBy($user)) {
            $user->favorites()->detach($resep->id);
            $message = 'Resep dihapus dari favorit';
            $status = 'removed';
        } else {
            $user->favorites()->attach($resep->id);
            $message = 'Resep ditambahkan ke favorit';
            $status = 'added';
        }

        return response()->json([
            'success' => true,
            'status'  => $status,
            'message' => $message
        ]);
    }

    // List favorit user
    public function index()
    {
        $favorites = auth()->user()->favorites()
                        ->with('kategori')
                        ->latest()
                        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar favorit berhasil diambil',
            'data'    => $favorites
        ]);
    }
}