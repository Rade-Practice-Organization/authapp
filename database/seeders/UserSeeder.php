<?php

namespace Database\Seeders;

use App\Http\Enums\Auth\UserRolesEnum;
use App\Http\Enums\Auth\UserTypeEnum;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        foreach (UserRolesEnum::systemRoles() as $systemRole) {
            $count = $systemRole === UserRolesEnum::USER ? 10 : 2;
            UserFactory::new()
                ->withRole($systemRole)
                ->count($count)
                ->create();
        }
    }
}
