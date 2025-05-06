<?php

namespace App\Models\Trait;

use App\Models\User;

trait RoleAbilitiesTrait
{
    public function getAbilitiesForSystemRole(User $user): array
    {
        $hierarchy = config('roles.role_hierarchy');

        $roles = [$user->role->value];
        $roles = array_merge($roles, $hierarchy[$user->role->value] ?? []);
        //$fff = $this->calculateRoles($roles);

        return $this->calculateAbilities($roles);
    }

    public function getAbilitiesForTenantRole(User $user): array
    {
        $hierarchy = config('roles.role_hierarchy');

        $orgs = $user->organizationsUsers;

        $roles = [$user->organizationsUsers->role->value];
        $roles = array_merge($roles, $hierarchy[$user->role->value] ?? []);

        return $this->calculateAbilities($roles);
    }

    private function calculateAbilities(array $roles): array
    {
        $abilitiesMap = config('roles.abilities');

        $abilities = array_merge(...array_map(function ($role) use ($abilitiesMap) {
            return $abilitiesMap[$role];
        }, $roles));

        return array_unique($abilities);
    }

    private function calculateRoles(array $roles): array
    {
        $hierarchyMap = config('roles.role_hierarchy');

        $abilities = array_merge(...array_map(function ($role) use ($hierarchyMap) {
            return $hierarchyMap[$role];
        }, $roles));

        return array_unique($abilities);
    }
}
