<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Tenants\OrganizationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['throttle:api'])->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::middleware(['guest:web', 'throttle:login'])->group(function () {
            Route::post("/login", LoginController::class)->name('auth.login');
            Route::post("/register", RegisterController::class)->name('auth.register');
        });
        Route::get('/logout', LogoutController::class)->middleware('auth:sanctum');
    });

    Route::middleware(['auth:sanctum', 'abilities:data:create'])->group(function () {
        Route::post('/organizations', [OrganizationController::class, 'store'])->name('organizations.store');
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});
