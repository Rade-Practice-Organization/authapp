<?php

namespace App\Http\FormRequests\CentralApp;

use App\Http\RequestData\CentralApp\OrganizationData;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => ['required', 'string'],
            "country" => ['required', 'string'],
            "city" => ['required', 'string'],
            "address" => ['required', 'string'],
        ];
    }

    public function getData(): OrganizationData
    {
        return new OrganizationData(
            name: $this->input('name'),
            country: $this->input('country'),
            city: $this->input('city'),
            address: $this->input('address')
        );
    }
}
