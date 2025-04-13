<?php

namespace App\Http\Services;

use App\Http\Services\RequestData\LoginData;
use App\Http\Services\RequestData\RegisterData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(RegisterData $data): User
    {
        $user = (new User())->fill([
            'name' => $data->getName(),
            'email' => $data->getEmail(),
        ]);
        $user->password = $data->getPassword();
        $user->save();

        return $user;
    }

    /**
     * @param LoginData $data
     * @return array<User, string>
     */
    public function login(LoginData $data): array
    {
        $user = User::where('email', $data->getEmail())->first();

        if (! $user || ! Hash::check($data->getPassword(), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return [
            'user' => $user,
            'token' => $user->createToken('token')->plainTextToken,
        ];
    }
}
