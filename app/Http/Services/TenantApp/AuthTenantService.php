<?php

namespace App\Http\Services\TenantApp;

use App\Http\RequestData\CentralApp\LoginData;
use App\Http\RequestData\TenantApp\RegisterTenantData;
use App\Models\OrganizationUsers;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Uuid;

class AuthTenantService
{
    public function register(RegisterTenantData $data): User
    {
        $user = (new User())->fill([
            'name' => $data->getName(),
            'email' => $data->getEmail(),
        ]);
        $user->password = $data->getPassword();

        $organizationUsers = new OrganizationUsers();
        $organizationUsers->organization_id = $data->getOrganizationId();
        $organizationUsers->role = $data->getRole();

        DB::transaction(function () use ($organizationUsers, $user) {
            $user->save();
            $organizationUsers->user_id = $user->id;
            $organizationUsers->save();
        });

        return $user;
    }

    /**
     * @param LoginData $data
     * @return array<User, string>
     */
    public function login(LoginData $data): array
    {
        $user = User::where('email', $data->getEmail())->first();

        if (! $user || ! Hash::check($data->getPassword(), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $abilities = $user->getAbilitiesForSystemRole($user);

        return [
            'user' => $user,
            'token' => $user->createToken(name: 'token', abilities: $abilities)->plainTextToken,
        ];
    }
}
