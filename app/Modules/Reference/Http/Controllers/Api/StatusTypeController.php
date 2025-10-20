<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\StatusTypeRequest\StoreStatusTypeRequest;
use App\Modules\Reference\Http\Requests\StatusTypeRequest\UpdateStatusTypeRequest;
use App\Modules\Reference\Services\StatusTypeService\StatusTypeService;

class StatusTypeController extends ApiController
{
    protected $service;

    public function __construct(StatusTypeService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *   path="/api/reference/status-types",
     *   tags={"Reference/StatusType"},
     *   summary="List all status types",
     *   @OA\Response(
     *     response=200,
     *     description="List of status types",
     *     @OA\JsonContent(ref="#/components/schemas/StatusTypeListResponse")
     *   )
     * )
     */
    public function index()
    {
        return $this->success($this->service->listAll(), 'List Data');
    }

    /**
     * @OA\Post(
     *   path="/api/reference/status-types",
     *   tags={"Reference/StatusType"},
     *   summary="Create new status type",
     *   operationId="storeStatusType",
     *   @OA\RequestBody(
     *     required=true,
     *     description="Payload untuk membuat status type baru",
     *     @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(
     *         property="name",
     *         type="object",
     *         @OA\Property(property="en", type="string", example="Active"),
     *         @OA\Property(property="id", type="string", example="Aktif")
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Status type created",
     *     @OA\JsonContent(ref="#/components/schemas/StatusTypeResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation error"),
     *   @OA\Response(response=500, description="Internal server error")
     * )
     */
    public function store(StoreStatusTypeRequest $request)
    {
        $dataValidated = $request->validated();
        return $this->success(
            $this->service->store($dataValidated),
            'Data created'
        );
    }


    /**
     * @OA\Get(
     *   path="/api/reference/status-types/{id}",
     *   tags={"Reference/StatusType"},
     *   summary="Get status type by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the status type to retrieve",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Status type detail",
     *     @OA\JsonContent(ref="#/components/schemas/StatusTypeResponse")
     *   ),
     *   @OA\Response(response=404, description="Status type not found")
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
     * @OA\Put(
     *   path="/api/reference/status-types/{id}",
     *   tags={"Reference/StatusType"},
     *   summary="Update an existing status type",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the status type to update",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/StatusType") 
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Status type updated",
     *     @OA\JsonContent(ref="#/components/schemas/StatusTypeResponse")
     *   ),
     *   @OA\Response(response=404, description="Status type not found")
     * )
     */
    public function update(UpdateStatusTypeRequest $request, $id)
    {
        $dataValidated = $request->validated();
        $dataUpdated = $this->service->update($id, $dataValidated);
        if (!$dataUpdated) {
            return $this->error('Data failed to update', 400);
        }
        return $this->success($dataUpdated, 'Data updated');
    }

    /**
     * @OA\Delete(
     *   path="/api/reference/status-types/{id}",
     *   tags={"Reference/StatusType"},
     *   summary="Delete status type",
     *   operationId="deleteStatusType",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the status type to delete",
     *     @OA\Schema(type="integer", example=1)
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Status type deleted successfully",
     *     @OA\JsonContent(
     *       @OA\Property(property="status", type="string", example="success"),
     *       @OA\Property(property="message", type="string", example="Data deleted"),
     *       @OA\Property(property="data", type="boolean", example=true)
     *     )
     *   ),
     *   @OA\Response(response=404, description="Status type not found"),
     *   @OA\Response(response=405, description="Method not allowed")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
