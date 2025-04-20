<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::prefix('/tenant')->group(function () {
    Route::middleware(['throttle:api', 'guest:web', 'throttle:login'])->group(function () {
//        Route::prefix('/auth')->group(function () {
//            Route::post("/login", LoginController::class)->name('tenant.user.login');
//            Route::post("/register", RegisterController::class)->name('tenant.user.register');
//        });
    });
});

