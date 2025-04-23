<?php

namespace App\Http\Controllers\CentralApp\Auth;

use App\Http\Controllers\Controller;
use App\Http\FormRequests\CentralApp\RegisterRequest;
use App\Http\Services\CentralApp\AuthService;

class RegisterController extends Controller
{
    public function __construct(private readonly AuthService $registerService)
    {
    }

    public function __invoke(RegisterRequest $request)
    {
        $user = $this->registerService->register($request->getData());
        $abilities = $user->getAbilitiesForSystemRole($user);

        return response()->json([
            'token' => $user->createToken(name: 'token', abilities: $abilities)->plainTextToken,
        ]);
    }
}
