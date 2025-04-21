<?php

namespace App\Http\RequestData\CentralApp;

readonly class OrganizationData
{
    public function __construct(
        private string $name,
        private string $country,
        private string $city,
        private string $address,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
}
