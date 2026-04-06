<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ResepApiController;
use App\Http\Controllers\Api\FavoriteApiController;

// API Routes - Diberi prefix jelas agar tidak konflik dengan web routes
Route::prefix('api/v1')->group(function () {

    // Auth API
    Route::post('/register', [AuthController::class, 'register'])->name('api.register');
    Route::post('/login',    [AuthController::class, 'login'])->name('api.login');
    Route::post('/logout',   [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('api.logout');

    // Resep Public
    Route::get('/resep',     [ResepApiController::class, 'index'])->name('api.resep.index');
    Route::get('/resep/{id}', [ResepApiController::class, 'show'])->name('api.resep.show');

    // Protected Routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/my-reseps', [ResepApiController::class, 'myReseps'])->name('api.my-reseps');
        Route::post('/resep/{resep}/favorite', [FavoriteApiController::class, 'toggle'])->name('api.favorite.toggle');
        Route::get('/my-favorites', [FavoriteApiController::class, 'index'])->name('api.my-favorites');
    });
});