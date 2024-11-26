<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailInformationController; // Добавьте этот импорт
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function () {
    Route::get('{id}', [UserController::class, 'show'])->name('users.show');

    Route::middleware('auth')->group(function () {
        Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('{id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::patch('{id}/details', [UserDetailInformationController::class, 'update'])->name('users.userDetailInformation.update');
    });
});

require __DIR__.'/auth.php';