<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\FormRequests\LoginRequest;
use App\Http\Services\AuthService;

class LoginController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    public function __invoke(LoginRequest $request): array
    {
        return $this->authService->login($request->getData());
    }
}
