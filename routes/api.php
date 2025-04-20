<?php

use App\Http\Controllers\CentralApp\Auth\LoginController;
use App\Http\Controllers\CentralApp\Auth\LogoutController;
use App\Http\Controllers\CentralApp\Auth\OrganizationController;
use App\Http\Controllers\CentralApp\Auth\RegisterController;
use App\Http\Controllers\TenantApp\Auth\RegisterTenantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:api'])->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::middleware(['guest:web', 'throttle:login'])->group(function () {
            Route::post("/login", LoginController::class)->name('auth.login');
            Route::post("/register", RegisterController::class)->name('auth.register');
        });
        Route::get('/logout', LogoutController::class)->middleware('auth:sanctum');
    });

    Route::prefix('/tenant-auth')->group(function () {
        Route::middleware(['guest:web_tenant', 'throttle:login'])->group(function () {
            //Route::post("/login", LoginController::class)->name('auth.login');
            Route::post("/register", RegisterTenantController::class)->name('auth.tenant_register');
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
