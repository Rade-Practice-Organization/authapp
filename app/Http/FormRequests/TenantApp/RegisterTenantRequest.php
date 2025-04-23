<?php

namespace App\Http\FormRequests\TenantApp;

use App\Http\Enums\Auth\UserRolesEnum;
use App\Http\RequestData\TenantApp\RegisterTenantData;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterTenantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(UserRolesEnum::tenantRoles())],
            'organization_id' => ['required', 'exists:organizations,id']
        ];
    }
    public function getData(): RegisterTenantData
    {
        return new RegisterTenantData(
            name: $this->input('name'),
            email: $this->input('email'),
            password: $this->input('password'),
            role: $this->input('role'),
            organizationId: $this->input('organization_id')
        );
    }
}
