<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profiles/{id}', [UserController::class, 'show'])->name('profiles.show');
Route::middleware('auth')->group(function () {
    Route::get('/profiles/{id}', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::patch('/profiles/{id}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::delete('/profiles/{id}', [ProfileController::class, 'destroy'])->name('profiles.destroy');
});

require __DIR__.'/auth.php';