<?php

namespace Database\Seeders;

use App\Http\Enums\Auth\UserRolesEnum;
use App\Models\Organization;
use App\Models\User;
use Database\Factories\OrganizationUsersFactory;
use Illuminate\Database\Seeder;

class OrganizationUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = Organization::all();
        $users = User::whereNull('role')->inRandomOrder()->limit(5)->get();

        foreach ($organizations as $organization) {
            foreach ($users as $user) {
                $roleKey = array_rand(UserRolesEnum::tenantRoles());
                $role = UserRolesEnum::tenantRoles()[$roleKey];
                OrganizationUsersFactory::new()
                    ->forOrganization($organization)
                    ->forUser($user)
                    ->withRole($role)
                    ->create();
            }
        }
    }
}
