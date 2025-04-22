<?php

namespace App\Http\FormRequests\CentralApp;

use App\Http\Enums\Auth\UserRolesEnum;
use App\Http\Enums\Auth\UserTypeEnum;
use App\Http\RequestData\CentralApp\RegisterData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required', 'string', Rule::in(['system_user', 'tenant_user'])],
            'role' => [
                Rule::requiredIf(fn () => $this->enum('type', UserTypeEnum::class) === UserTypeEnum::SYSTEM_USER),
                //Rule::in(UserRolesEnum::systemRoles())
            ],
        ];
    }
    public function getData(): RegisterData
    {
        return new RegisterData(
            name: $this->input('name'),
            email: $this->input('email'),
            password: $this->input('password'),
            type: $this->enum('type', UserTypeEnum::class),
            role: $this->enum('role', UserRolesEnum::class,)
        );
    }
}
