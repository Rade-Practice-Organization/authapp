<?php

namespace App\Http\Services\CentralApp;

use App\Http\RequestData\CentralApp\OrganizationData;
use App\Models\Organization;
use Ramsey\Uuid\Uuid;

class OrganizationService
{
    public function store(OrganizationData $data): Organization
    {
        $organization = new Organization();
        $organization->fill([
            'id' => Uuid::uuid4(),
            "name" => $data->getName(),
            "country" => $data->getCountry(),
            "city" => $data->getCity(),
            "address" => $data->getAddress(),
        ]);
        $organization->tenancy_db_name = $organization->id . '_' . $this->normalize_database_name($organization->name);
        $organization->save();

        return $organization;
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
