<?php

namespace App\Http\RequestData\CentralApp;

readonly class RegisterData
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
        private string $role,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getRole(): string
    {
        return $this->role;
    }
}
