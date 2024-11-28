<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailInformationController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function () {
    Route::get('{id}', [UserController::class, 'show'])->name('users.show');

    Route::middleware('auth')->group(function () {
        Route::prefix('{id}')->group(function () {
            Route::get('edit', [UserController::class, 'edit'])->name('users.edit');
            Route::patch('', [UserController::class, 'update'])->name('users.update');
            Route::delete('', [UserController::class, 'destroy'])->name('users.destroy');
            Route::patch('details', [UserDetailInformationController::class, 'update'])->name('users.userDetailInformation.update');
            Route::post('works', [WorkController::class, 'store'])->name('users.works.store');
        });

        Route::prefix('works')->group(function () {
            Route::get('{id}/edit', [WorkController::class, 'edit'])->name('works.edit');
            Route::put('{id}', [WorkController::class, 'update'])->name('works.update');
            Route::delete('{id}', [WorkController::class, 'destroy'])->name('works.destroy');
        });
    });
});

require __DIR__.'/auth.php';