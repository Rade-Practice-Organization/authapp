<?php

namespace App\Http\Controllers\CentralApp\Auth;

use App\Http\Controllers\Controller;
use App\Http\FormRequests\CentralApp\OrganizationRequest;
use App\Http\Services\CentralApp\OrganizationService;
use Symfony\Component\HttpFoundation\JsonResponse;

class OrganizationController extends Controller
{
    public function __construct(private readonly OrganizationService $organizationService)
    {
    }

    public function store(OrganizationRequest $request): JsonResponse
    {
        $organization = $this->organizationService->store($request->getData());

        return response()->json([
            'data' => $organization
        ]);
    }
}
