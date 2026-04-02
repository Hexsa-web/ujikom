<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $myReseps = $user->reseps()
                         ->where('status', 'approved')   // Hanya yang sudah approved
                         ->latest()
                         ->paginate(6);

        $favorites = $user->favorites()
                          ->with('kategori')
                          ->latest()
                          ->paginate(6);

        return view('profile.index', compact('user', 'myReseps', 'favorites'));
    }
}