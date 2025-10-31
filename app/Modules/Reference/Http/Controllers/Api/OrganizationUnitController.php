<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\OrganizationUnitRequest\StoreOrganizationUnitRequest;
use App\Modules\Reference\Http\Requests\OrganizationUnitRequest\UpdateOrganizationUnitRequest;
use App\Modules\Reference\Services\OrganizationUnitService\OrganizationUnitService;

class OrganizationUnitController extends ApiController
{
    protected $service;

    public function __construct(OrganizationUnitService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/organization-units",
     *   tags={"Reference/OrganizationUnit"},
     *   summary="List all OrganizationUnit",
     *   @OA\Response(
     *     response=200,
     *     description="List of OrganizationUnit",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationUnitListResponse")
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
     *   path="/api/reference/organization-units",
     *   tags={"Reference/OrganizationUnit"},
     *   summary="Create a new OrganizationUnit",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OrganizationUnit created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationUnitResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreOrganizationUnitRequest $request)
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
     *   path="/api/reference/organization-units/{id}",
     *   tags={"Reference/OrganizationUnit"},
     *   summary="Get OrganizationUnit detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="OrganizationUnit ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OrganizationUnit detail",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationUnitResponse")
     *   ),
     *   @OA\Response(response=404, description="OrganizationUnit not found")
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
     *   path="/api/reference/organization-units/{id}",
     *   tags={"Reference/OrganizationUnit"},
     *   summary="Update an existing OrganizationUnit",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="OrganizationUnit ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OrganizationUnit updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationUnitResponse")
     *   ),
     *   @OA\Response(response=404, description="OrganizationUnit not found")
     * )
     */
    public function update(UpdateOrganizationUnitRequest $request, $id)
    {
        $dataValidated = $request->validated();
        $dataUpdated = $this->service->update($id, $dataValidated);

        return $this->success($dataUpdated, 'Success update data');
    }

    /**
     * Remove the specified resource.
     */
    /**
     * @OA\Delete(
     *   path="/api/reference/organization-units/{id}",
     *   tags={"Reference/OrganizationUnit"},
     *   summary="Delete a OrganizationUnit by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="OrganizationUnit ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OrganizationUnit deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="OrganizationUnit not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
