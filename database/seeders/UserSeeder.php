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
            UserFactory::new()
                ->withUserType(UserTypeEnum::SYSTEM_USER)
                ->withRole($systemRole)
                ->count(2)
                ->create();
        }

        foreach (UserRolesEnum::tenantRoles() as $tenantRole) {
            UserFactory::new()
                ->withUserType(UserTypeEnum::TENANT_USER)
                ->count(2)
                ->create();
        }
    }
}
