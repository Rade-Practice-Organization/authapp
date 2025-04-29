<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    public function definition(): array
    {
        $id = $this->faker->uuid;
        $name = $this->faker->company;
        return [
            'id' => $id,
            'name' => $name,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'tenancy_db_name' => $id,
        ];
    }
}
