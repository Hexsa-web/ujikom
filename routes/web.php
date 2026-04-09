<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\KontakController;

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\ResepController;

// ✅ TAMBAHAN (USER RESEP)
use App\Http\Controllers\ResepUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;

use App\Http\Middleware\Admin;
use App\Models\Galeri;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* ================= FRONTEND ================= */

// Homepage
Route::get('/', [FrontController::class, 'index'])->name('front.index');

// Daftar resep berdasarkan kategori
Route::get('/kategori/{id}', [FrontController::class, 'kategori'])->name('front.kategori');

// Detail resep (route lama)
Route::get('/resep/{id}', [FrontController::class, 'show'])->name('front.resep.show');

// Route baru untuk detail resep
Route::get('/resep/detail/{id}', [FrontController::class, 'detail'])->name('resep.detail');

// Berita statis
Route::get('/sberita/{id}', function ($id) {
    return view('sberita', compact('id'));
})->name('sberita');

// Galeri
Route::get('/galeri', function () {
    return view('galeri');
})->name('front.galeri');

// Tentang
Route::get('/tentang', function () {
    return view('tentang');
})->name('front.tentang');

//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});


// ================= TAMBAH RESEP USER =================

// FORM TAMBAH RESEP
Route::get('/tambah-resep', function () {
    $kategoris = \App\Models\Kategori::all();
    return view('tambah', compact('kategoris'));
})->name('user.resep.create');

// ✅ SIMPAN RESEP (INI YANG DITAMBAHKAN)
Route::post('/tambah-resep', [ResepUserController::class, 'store'])
    ->middleware('auth')
    ->name('user.resep.store');

// Profile & Resep User
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // Tambah Resep
    Route::get('/tambah-resep', function () {
        $kategoris = \App\Models\Kategori::all();
        return view('tambah', compact('kategoris'));
    })->name('user.resep.create');

    Route::post('/tambah-resep', [ResepUserController::class, 'store'])->name('user.resep.store');

    // Hapus Resep (baru)
    Route::delete('/resep/{resep}', [ResepUserController::class, 'destroy'])
        ->name('user.resep.destroy');

        // Favorite
Route::post('/resep/{resep}/favorite', [FavoriteController::class, 'toggle'])
    ->name('resep.favorite.toggle')
    ->middleware('auth');

});

/* ================= AUTH ================= */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* ================= BACKEND (ADMIN) ================= */

// Approve & Reject Resep (route ini tetap di luar group karena tidak perlu prefix)
Route::patch('/resep/{resep}/approve', [ResepController::class, 'approve'])
    ->name('backend.resep.approve');

Route::patch('/resep/{resep}/reject', [ResepController::class, 'reject'])
    ->name('backend.resep.reject');

// === BACKEND GROUP (PAKAI STRING 'admin') ===
Route::group([
    'prefix' => 'backend',
    'as' => 'backend.',
    'middleware' => ['auth', 'admin'],   // ← Pakai string 'admin' (bukan Admin::class)
], function () {

    // Dashboard
    Route::get('/', [BackendController::class, 'index'])->name('dashboard');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Resep (full CRUD)
    Route::resource('resep', ResepController::class);
});