<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::middleware(['throttle:api'])->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::middleware(['guest:web', 'throttle:login'])->group(function () {
            Route::middleware(['throttle:login'])->group(function () {
//                Route::post("/login", LoginController::class)->name('auth.login');
                Route::post("/register", RegisterController::class)->name('auth.register');
//                Route::post("/forgot-password", ForgotPasswordController::class)->name('auth.forgot-password');
//                Route::post("/reset-password", ResetPasswordController::class)->name('auth.reset-password');
//
//                Route::post("/2fa/two-factor-challenge", TwoFactorChallengeController::class)->name('auth.two-factor-challenge');
            });
        });

//        Route::prefix('/organization-registration')->middleware(['throttle:register'])->group(function () {
//            Route::post('/company-data', OrganizationRegistrationCompanyDataStepController::class)
//                ->name('auth.organization-registration.company-data');
//            Route::post('/check-trade-license-number', OrganizationRegistrationTradeLicenseCheckController::class)
//                ->name('auth.organization-registration.check-trade-license-number');
//
//            Route::post('/{organization:uuid}/bank-data', OrganizationRegistrationBankDataStepController::class)
//                ->middleware(OrganizationRegistrationStepAuthorizationMiddleware::class . ':' . OrganizationRegistrationStep::BANK_DATA->value)
//                ->name('auth.organization-registration.bank-data');
//            Route::post('/{organization:uuid}/auth-signatory-data', OrganizationRegistrationAuthSignatoryStepController::class)
//                ->middleware(OrganizationRegistrationStepAuthorizationMiddleware::class . ':' . OrganizationRegistrationStep::AUTH_SIGNATORY_DATA->value)
//                ->name('auth.organization-registration.auth-signatory-data');
//            Route::post('/{organization:uuid}/broker-data', OrganizationRegistrationBrokerDataStepController::class)
//                ->middleware(OrganizationRegistrationStepAuthorizationMiddleware::class . ':' . OrganizationRegistrationStep::BROKER_DATA->value)
//                ->name('auth.organization-registration.broker-data');
//        });
    });
});
