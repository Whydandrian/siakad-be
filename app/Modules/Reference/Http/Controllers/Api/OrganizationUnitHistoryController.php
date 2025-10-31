<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\OrganizationUnitHistoryRequest\StoreOrganizationUnitHistoryRequest;
use App\Modules\Reference\Http\Requests\OrganizationUnitHistoryRequest\UpdateOrganizationUnitHistoryRequest;
use App\Modules\Reference\Services\OrganizationUnitHistoryService\OrganizationUnitHistoryService;

class OrganizationUnitHistoryController extends ApiController
{
    protected $service;

    public function __construct(OrganizationUnitHistoryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/organization-unit-histories",
     *   tags={"Reference/OrganizationUnitHistory"},
     *   summary="List all OrganizationUnitHistory",
     *   @OA\Response(
     *     response=200,
     *     description="List of OrganizationUnitHistory",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationUnitHistoryListResponse")
     *   )
     * )
     */
    public function index()
    {
        return $this->success($this->service->listAll(), 'List Data');
    }

    /**
     * Store a newly created resource.
     */
    /**
     * @OA\Post(
     *   path="/api/reference/organization-unit-histories",
     *   tags={"Reference/OrganizationUnitHistory"},
     *   summary="Create a new OrganizationUnitHistory",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"organization_unit_id", "organization_level_id", "start_date", "end_date", "is_active"},
     *         @OA\Property(
     *           property="organization_unit_id",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="organization_level_id",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="start_date",
     *           type="string",
     *           example="example value"
     *         ),
     *         @OA\Property(
     *           property="end_date",
     *           type="string",
     *           example="example value"
     *         ),
     *         @OA\Property(
     *           property="is_active",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="note",
     *           type="object",
     *           example="example value"
     *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OrganizationUnitHistory created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationUnitHistoryResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreOrganizationUnitHistoryRequest $request)
    {
        $dataValidated = $request->validated();
        $dataCreated = $this->service->store($dataValidated);

        return $this->success($dataCreated, 'Data created');
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/organization-unit-histories/{id}",
     *   tags={"Reference/OrganizationUnitHistory"},
     *   summary="Get OrganizationUnitHistory detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="OrganizationUnitHistory ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OrganizationUnitHistory detail",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationUnitHistoryResponse")
     *   ),
     *   @OA\Response(response=404, description="OrganizationUnitHistory not found")
     * )
     */
    public function find($id)
    {
        $data = $this->service->find($id);
        if (!$data) {
            return $this->error('Data not found', 404);
        }

        return $this->success($data, 'Data found');
    }

    /**
     * Update the specified resource.
     */
    /**
     * @OA\Put(
     *   path="/api/reference/organization-unit-histories/{id}",
     *   tags={"Reference/OrganizationUnitHistory"},
     *   summary="Update an existing OrganizationUnitHistory",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="OrganizationUnitHistory ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"organization_unit_id", "organization_level_id", "start_date", "end_date", "is_active"},
     *         @OA\Property(
     *           property="organization_unit_id",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="organization_level_id",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="start_date",
     *           type="string",
     *           example="example value"
     *         ),
     *         @OA\Property(
     *           property="end_date",
     *           type="string",
     *           example="example value"
     *         ),
     *         @OA\Property(
     *           property="is_active",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="note",
     *           type="object",
     *           example="example value"
     *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OrganizationUnitHistory updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationUnitHistoryResponse")
     *   ),
     *   @OA\Response(response=404, description="OrganizationUnitHistory not found")
     * )
     */
    public function update(UpdateOrganizationUnitHistoryRequest $request, $id)
    {
        $dataValidated = $request->validated();
        $dataUpdated = $this->service->update($id, $dataValidated);

        return $this->service->find($id);
    }

    /**
     * Remove the specified resource.
     */
    /**
     * @OA\Delete(
     *   path="/api/reference/organization-unit-histories/{id}",
     *   tags={"Reference/OrganizationUnitHistory"},
     *   summary="Delete a OrganizationUnitHistory by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="OrganizationUnitHistory ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OrganizationUnitHistory deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="OrganizationUnitHistory not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
