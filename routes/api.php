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

    Route::prefix('/organizations')->group(function () {
        Route::middleware(['auth:sanctum', 'abilities:data:view'])->group(function () {
            Route::get('/', [OrganizationController::class, 'index'])->name('organizations.index');
        });
        Route::middleware(['auth:sanctum', 'abilities:data:view'])->group(function () {
            Route::get('/{organization}', [OrganizationController::class, 'show'])->name('organizations.show');
        });
        Route::middleware(['auth:sanctum', 'abilities:data:create'])->group(function () {
            Route::post('/', [OrganizationController::class, 'store'])->name('organizations.store');
        });
        Route::middleware(['auth:sanctum', 'abilities:data:update'])->group(function () {
            Route::patch('/{organization}', [OrganizationController::class, 'update'])->name('organizations.update');
        });
        Route::middleware(['auth:sanctum', 'abilities:data:delete'])->group(function () {
            Route::delete('/{organization}', [OrganizationController::class, 'delete'])->name('organizations.delete');
        });
    });

    Route::prefix('/tenant-auth')->group(function () {
        Route::middleware(['guest:web_tenant', 'throttle:login'])->group(function () {
            //Route::post("/login", LoginController::class)->name('auth.login');
            Route::post("/register", RegisterTenantController::class)->name('auth.tenant_register');
        });
        Route::get('/logout', LogoutController::class)->middleware('auth:sanctum');
    });



    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});
