<?php

namespace App\Http\RequestData\CentralApp;

readonly class LoginData
{
    public function __construct(
        private string $email,
        private string $password
    ) {
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
}
