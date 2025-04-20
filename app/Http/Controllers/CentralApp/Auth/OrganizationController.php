<?php

namespace App\Http\Controllers\CentralApp\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;

class OrganizationController extends Controller
{
    public function store(): JsonResponse
    {
        $organization = new Organization();
        $organization->id = Uuid::uuid4();
        $organization->name = 'Test company';
        $organization->country = 'Serbia';
        $organization->city = 'Novi Sad';
        $organization->address = 'BBB';
        $organization->tenancy_db_name = $organization->id . '_' . $this->normalize_database_name($organization->name);
        $organization->save();

        $organization->domains()->create(['domain' => $organization->id . '.' . config('tenancy.base_domain')]);

        return response()->json([
            'data' => $organization
        ]);
    }

    private function normalize_database_name(string $input): string
    {
        // Lowercase
        $normalized = strtolower($input);

        // Replace spaces and multiple whitespace with underscores
        $normalized = preg_replace('/\s+/', '_', $normalized);

        // Remove non-alphanumeric/underscore characters (optional)
        $normalized = preg_replace('/[^a-z0-9_]/', '', $normalized);

        // Trim leading/trailing underscores
        return trim($normalized, '_');
    }
}
