<?php

use App\Http\Controllers\EkitaldiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard general de Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas de Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Módulo CRUD Ekitaldiak
    Route::get('/ekitaldiak', [EkitaldiaController::class, 'index'])->name('ekitaldiak.index');
    Route::get('/ekitaldiak/create', [EkitaldiaController::class, 'create'])->name('ekitaldiak.create');
    Route::post('/ekitaldiak', [EkitaldiaController::class, 'store'])->name('ekitaldiak.store');
    Route::get('/ekitaldiak/{id}', [EkitaldiaController::class, 'show'])->name('ekitaldiak.show');
    Route::get('/ekitaldiak/{id}/edit', [EkitaldiaController::class, 'edit'])->name('ekitaldiak.edit');
    Route::put('/ekitaldiak/{id}', [EkitaldiaController::class, 'update'])->name('ekitaldiak.update');
    Route::delete('/ekitaldiak/{id}/delete', [EkitaldiaController::class, 'delete'])->name('ekitaldiak.delete');
});

require __DIR__.'/auth.php';