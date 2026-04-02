<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;

class FavoriteController extends Controller
{
    public function toggle(Resep $resep)
    {
        $user = auth()->user();

        if ($resep->isFavoritedBy($user)) {
            // Hapus dari favorite
            $user->favorites()->detach($resep->id);
            return response()->json(['status' => 'removed']);
        } else {
            // Tambah ke favorite
            $user->favorites()->attach($resep->id);
            return response()->json(['status' => 'added']);
        }
    }
}