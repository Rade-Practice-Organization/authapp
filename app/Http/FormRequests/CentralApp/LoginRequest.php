<?php

namespace App\Http\FormRequests\CentralApp;

use App\Http\RequestData\CentralApp\LoginData;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function getData(): LoginData
    {
        return new LoginData(
            email: $this->input('email'),
            password: $this->input('password')
        );
    }
}
