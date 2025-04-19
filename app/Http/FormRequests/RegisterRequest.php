<?php

namespace App\Http\FormRequests;

use App\Http\Services\RequestData\RegisterData;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
        ];
    }
    public function getData(): RegisterData
    {
        return new RegisterData(
            name: $this->input('name'),
            email: $this->input('email'),
            password: $this->input('password'),
            role: $this->input('role')
        );
    }
}
