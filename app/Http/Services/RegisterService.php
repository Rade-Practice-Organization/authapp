<?php

namespace App\Http\Services;

use App\Http\Services\RequestData\RegisterData;
use App\Models\User;

class RegisterService
{
    public function store(RegisterData $data): bool
    {
        $user = (new User())->fill([
            'name' => $data->getName(),
            'email' => $data->getEmail(),
        ]);
        $user->password = $data->getPassword();
        return $user->save();
    }
}
