<?php

namespace App\Http\Controllers;

use App\Http\FormRequests\RegisterRequest;
use App\Http\Services\AuthService;

class RegisterController extends Controller
{
    public function __construct(private readonly AuthService $registerService)
    {
    }

    public function __invoke(RegisterRequest $request)
    {
        $user = $this->registerService->register($request->getData());
        $abilities = $user->getAbilitiesForRole($user);

        return response()->json([
            'token' => $user->createToken(name: 'token', abilities: $abilities)->plainTextToken,
        ]);
    }
}
