<?php

namespace App\Http\Controllers\CentralApp\Auth;

use App\Http\Controllers\Controller;
use App\Http\FormRequests\CentralApp\OrganizationRequest;
use App\Http\Services\CentralApp\OrganizationService;
use App\Models\Organization;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class OrganizationController extends Controller
{
    public function __construct(private readonly OrganizationService $organizationService)
    {
    }

    public function index(): JsonResponse
    {
        $organizations = $this->organizationService->index();

        return response()->json([
            'data' => $organizations
        ]);
    }

    public function show(Organization $organization): JsonResponse
    {
        return response()->json([
            'data' => $organization
        ]);
    }

    public function store(OrganizationRequest $request): JsonResponse
    {
        $organization = $this->organizationService->store($request->getData());

        return response()->json([
            'data' => $organization
        ]);
    }

    public function update(OrganizationRequest $request, Organization $organization): JsonResponse
    {
        $organization = $this->organizationService->store($request->getData(), $organization);;
        return response()->json([
            'data' => $organization
        ]);
    }
    public function delete(Organization $organization): Response
    {
        $organization->delete();
        return response()->noContent();
    }
}
