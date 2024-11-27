<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailInformationController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CanEditUser;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function () {
    Route::get('{id}', [UserController::class, 'show'])->name('users.show');

    Route::middleware('auth')->group(function () {
        Route::get('works/{id}/edit', [WorkController::class, 'edit'])->name('works.edit')->middleware(CanEditUser::class);
        Route::put('works/{id}', [WorkController::class, 'update'])->name('works.update');
        Route::delete('works/{id}', [WorkController::class, 'destroy'])->name('works.destroy');
        Route::prefix('{id}')->group(function () {
            Route::post('works', [WorkController::class, 'store'])->name('users.works.store');
            Route::get('edit', [UserController::class, 'edit'])->name('users.edit')->middleware(CanEditUser::class);
            Route::patch('', [UserController::class, 'update'])->name('users.update')->middleware(CanEditUser::class);
            Route::delete('', [UserController::class, 'destroy'])->name('users.destroy')->middleware(CanEditUser::class);
            Route::patch('details', [UserDetailInformationController::class, 'update'])->name('users.userDetailInformation.update')->middleware(CanEditUser::class);
        });
    });
});

require __DIR__.'/auth.php';