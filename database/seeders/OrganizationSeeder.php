<?php

namespace Database\Seeders;

use Database\Factories\OrganizationFactory;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        OrganizationFactory::new()
            ->count(3)
            ->create();
    }
}
