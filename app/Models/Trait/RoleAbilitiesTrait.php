<?php

namespace App\Models\Trait;

use App\Models\User;

trait RoleAbilitiesTrait
{
    public function getAbilitiesForRole(User $user): array
    {
        $hierarchy = config('roles.role_hierarchy');
        $abilitiesMap = config('roles.abilities');

        $roles = [$user->role];

        // Recursively get inherited roles
        $check = [$user->role];
        while ($check) {
            $current = array_pop($check);
            foreach ($hierarchy[$current] ?? [] as $inheritedRole) {
                if (!in_array($inheritedRole, $roles, true)) {
                    $roles[] = $inheritedRole;
                    $check[] = $inheritedRole;
                }
            }
        }

        // Merge abilities for all roles
        $abilities = [];
        foreach ($roles as $r) {
            $abilities = array_merge($abilities, $abilitiesMap[$r] ?? []);
        }

        return array_unique($abilities);
    }
}
