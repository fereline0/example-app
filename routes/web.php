<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailInformationController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\VacancyUserController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function () {
    Route::prefix('{id}')->group(function () {
        Route::get('', [UserController::class, 'show'])->name('users.show');

        Route::middleware('auth')->group(function () {
            Route::get('edit', [UserController::class, 'edit'])->name('users.edit');
            Route::patch('', [UserController::class, 'update'])->name('users.update');
            Route::delete('', [UserController::class, 'destroy'])->name('users.destroy');

            Route::prefix('details')->group(function () {
                Route::patch('', [UserDetailInformationController::class, 'update'])->name('users.userDetailInformation.update');
                Route::delete('resume', [UserDetailInformationController::class, 'deleteResume'])->name('users.userDetailInformation.deleteResume');
            });

            Route::prefix('reviews')->group(function () {
                Route::post('', [ReviewController::class, 'store'])->name('users.reviews.store');
            });
        });
    });
});

Route::prefix('vacancies')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('create', [VacancyController::class, 'create'])->name('vacancies.create');
        Route::post('', [VacancyController::class, 'store'])->name('vacancies.store');
    });

    Route::prefix('{id}')->group(function () {
        Route::get('', [VacancyController::class, 'show'])->name('vacancies.show');
        Route::get('edit', [VacancyController::class, 'edit'])->name('vacancies.edit');
        Route::patch('', [VacancyController::class, 'update'])->name('vacancies.update');
        Route::delete('', [VacancyController::class, 'destroy'])->name('vacancies.destroy');

        Route::prefix('applys')->group(function () {
            Route::middleware('auth')->group(function () {
                Route::get('', [VacancyUserController::class, 'show'])->name('vacancies.applys.show');
                Route::post('', [VacancyUserController::class, 'store'])->name('vacancies.applys.store');
                Route::delete('', [VacancyUserController::class, 'destroy'])->name('vacancies.applys.destroy');
            });
        });
    });
});

Route::prefix('reviews')->group(function () {
    Route::prefix('{id}')->group(function () {
        Route::get('edit', [ReviewController::class, 'edit'])->name('reviews.edit');
        Route::patch('', [ReviewController::class, 'update'])->name('reviews.update');
        Route::delete('', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    });
});

require __DIR__ . '/auth.php';
