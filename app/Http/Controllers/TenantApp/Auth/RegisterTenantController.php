<?php

namespace App\Http\Controllers\TenantApp\Auth;

use App\Http\Controllers\Controller;
use App\Http\FormRequests\TenantApp\RegisterTenantRequest;
use App\Http\Services\TenantApp\AuthTenantService;

class RegisterTenantController extends Controller
{
    public function __construct(private readonly AuthTenantService $registerService)
    {
    }

    public function __invoke(RegisterTenantRequest $request)
    {
        $user = $this->registerService->register($request->getData());
        $abilities = $user->getAbilitiesForRole($user);

        return response()->json([
            'token' => $user->createToken(name: 'token', abilities: $abilities)->plainTextToken,
        ]);
    }
}
