<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::patch('/profiles', [ProfileController::class, 'update'])->name('profiles.update');
    Route::delete('/profiles', [ProfileController::class, 'destroy'])->name('profiles.destroy');
});

require __DIR__.'/auth.php';