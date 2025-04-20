<?php

namespace App\Http\Controllers\CentralApp\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(Request $request): void
    {
        $request->user()->tokens()->delete();
    }
}
