<?php

use App\Http\Controllers\EkitaldiaController;
use App\Http\Controllers\ProfileController;
use App\Models\Ekitaldia;
use Illuminate\Support\Facades\Route;

// Vista principal: Carga los 3 eventos más próximos en fecha y hora
Route::get('/', function () {
    $ekitaldiak = Ekitaldia::where('ekitaldi_data', '>=', now()->toDateString())
        ->orderBy('ekitaldi_data', 'asc')
        ->orderBy('ordua', 'asc')
        ->take(3)
        ->get();

    return view('welcome', compact('ekitaldiak'));
});

// 1. Cartelera PÚBLICA (usa resources/views/dashboard.blade.php)
Route::get('/dashboard', [EkitaldiaController::class, 'kartelera'])->name('dashboard');

// Detalle PÚBLICO del evento (usa resources/views/ekitaldiak/show-public.blade.php)
Route::get('/ekitaldiak/ikusi/{id}', [EkitaldiaController::class, 'showPublikoa'])->name('ekitaldiak.publikoa.show');

Route::middleware('auth')->group(function () {
    // Rutas de Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 2. Módulo CRUD Ekitaldiak ADMIN (usa resources/views/ekitaldiak/dashboard.blade.php en index)
    Route::get('/ekitaldiak', [EkitaldiaController::class, 'index'])->name('ekitaldiak.index');
    Route::get('/ekitaldiak/create', [EkitaldiaController::class, 'create'])->name('ekitaldiak.create');
    Route::post('/ekitaldiak', [EkitaldiaController::class, 'store'])->name('ekitaldiak.store');
    Route::get('/ekitaldiak/{id}', [EkitaldiaController::class, 'show'])->name('ekitaldiak.show');
    Route::get('/ekitaldiak/{id}/edit', [EkitaldiaController::class, 'edit'])->name('ekitaldiak.edit');
    Route::put('/ekitaldiak/{id}', [EkitaldiaController::class, 'update'])->name('ekitaldiak.update');
    Route::delete('/ekitaldiak/{id}/delete', [EkitaldiaController::class, 'delete'])->name('ekitaldiak.delete');
});

require __DIR__.'/auth.php';