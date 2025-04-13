<?php

namespace App\Http\Controllers;

use App\Http\FormRequests\RegisterRequest;
use App\Http\Services\RegisterService;

class RegisterController extends Controller
{
    public function __construct(private readonly RegisterService $registerService)
    {
    }

    public function __invoke(RegisterRequest $request)
    {
        $this->registerService->store($request->getData());
    }
}
