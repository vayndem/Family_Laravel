<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KenanganKeluargaController;


Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/kenangan/create', [KenanganKeluargaController::class, 'create'])->name('kenangan.create');
    Route::post('/kenangan', [KenanganKeluargaController::class, 'store'])->name('kenangan.store');
    Route::get('/kenangan/{kenangan}/edit', [KenanganKeluargaController::class, 'edit'])->name('kenangan.edit');
    Route::put('/kenangan/{kenangan}', [KenanganKeluargaController::class, 'update'])->name('kenangan.update');
    Route::delete('/kenangan/destroy-all', [KenanganKeluargaController::class, 'destroyAll'])->name('kenangan.destroyAll');
});

require __DIR__.'/auth.php';
