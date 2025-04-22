<?php

namespace App\Http\RequestData\CentralApp;

use App\Http\Enums\Auth\UserRolesEnum;
use App\Http\Enums\Auth\UserTypeEnum;

readonly class RegisterData
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
        private UserTypeEnum $type,
        private ?UserRolesEnum $role = null,
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
    public function getType(): UserTypeEnum
    {
        return $this->type;
    }
    public function getRole(): ?UserRolesEnum
    {
        return $this->role;
    }
}
