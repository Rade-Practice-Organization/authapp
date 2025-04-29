<?php

namespace Database\Factories;

use App\Http\Enums\Auth\UserRolesEnum;
use App\Models\Organization;
use App\Models\OrganizationUsers;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrganizationUsers>
 */
class OrganizationUsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function forUser(User $user): self
    {
        return $this->state(function () use ($user) {
            return [
                'user_id' => $user->id,
            ];
        });
    }

    public function forOrganization(Organization $organization): self
    {
        return $this->state(function () use ($organization) {
            return [
                'organization_id' => $organization->id,
            ];
        });
    }

    public function withRole(UserRolesEnum $role): self
    {
        return $this->state(function () use ($role) {
            return [
                'role' => $role,
            ];
        });
    }
}
