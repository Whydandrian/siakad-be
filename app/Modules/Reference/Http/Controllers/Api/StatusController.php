<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\StatusRequest\StoreStatusRequest;
use App\Modules\Reference\Http\Requests\StatusRequest\UpdateStatusRequest;
use App\Modules\Reference\Services\StatusService\StatusService;

class StatusController extends ApiController
{
    protected $service;

    public function __construct(StatusService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *   path="/api/reference/statuses",
     *   tags={"Reference/Status"},
     *   summary="List all statuses",
     *   @OA\Response(
     *     response=200,
     *     description="List of statuses",
     *     @OA\JsonContent(ref="#/components/schemas/StatusListResponse")
     *   )
     * )
     */
    public function index()
    {
        return $this->success($this->service->listAll(), 'List Data');
    }

    /**
     * @OA\Get(
     *   path="/api/reference/statuses/{id}",
     *   tags={"Reference/Status"},
     *   summary="Get status detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Status ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Status detail",
     *     @OA\JsonContent(ref="#/components/schemas/StatusResponse")
     *   ),
     *   @OA\Response(response=404, description="Status not found")
     * )
     */
    public function find($id)
    {
        return $this->success($this->service->find($id), 'Data found');
    }

    /**
     * @OA\Post(
     *   path="/api/reference/statuses",
     *   tags={"Reference/Status"},
     *   summary="Create a new status",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name","status_type_id"},
     *       @OA\Property(
     *         property="name",
     *         type="object",
     *         @OA\Property(property="en", type="string", example="Active"),
     *         @OA\Property(property="id", type="string", example="Aktif")
     *       ),
     *       @OA\Property(property="status_type_id", type="integer", example=1)
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Status created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/StatusResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreStatusRequest $request)
    {
        $dataValidated = $request->validated();
        return $this->success($this->service->store($dataValidated),'Data created');
    }

    /**
     * @OA\Put(
     *   path="/api/reference/statuses/{id}",
     *   tags={"Reference/Status"},
     *   summary="Update an existing status",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the status to update",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name", "status_type_id"},
     *       @OA\Property(
     *         property="name",
     *         type="object",
     *         @OA\Property(property="en", type="string", example="Inactive"),
     *         @OA\Property(property="id", type="string", example="Tidak Aktif")
     *       ),
     *       @OA\Property(property="status_type_id", type="integer", example=2)
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Status updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/StatusResponse")
     *   ),
     *   @OA\Response(response=404, description="Status not found")
     * )
     */
    public function update(UpdateStatusRequest $request, $id)
    {
        $dataValidated = $request->validated();
        $dataUpdated = $this->service->update($id, $dataValidated);
        return $this->success($dataUpdated, 'Data updated');
    }

    /**
     * @OA\Delete(
     *   path="/api/reference/statuses/{id}",
     *   tags={"Reference/Status"},
     *   summary="Delete a status by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Status ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Status deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="Status not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
