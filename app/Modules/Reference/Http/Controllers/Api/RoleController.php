<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\RoleRequest\StoreRoleRequest;
use App\Modules\Reference\Http\Requests\RoleRequest\UpdateRoleRequest;
use App\Modules\Reference\Services\RoleService\RoleService;

class RoleController extends ApiController
{
    protected $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *   path="/api/reference/roles",
     *   tags={"Reference/Role"},
     *   summary="List all roles",
     *   @OA\Response(
     *     response=200,
     *     description="List of roles",
     *     @OA\JsonContent(ref="#/components/schemas/RoleListResponse")
     *   )
     * )
     */
    public function index()
    {
        return $this->success($this->service->listAll(), 'List Data');
    }

    /**
     * @OA\Get(
     *   path="/api/reference/roles/{id}",
     *   tags={"Reference/Role"},
     *   summary="Get role detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Role ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Role detail",
     *     @OA\JsonContent(ref="#/components/schemas/RoleResponse")
     *   ),
     *   @OA\Response(response=404, description="Role not found")
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
     * @OA\Post(
     *   path="/api/reference/roles",
     *   tags={"Reference/Role"},
     *   summary="Create a new role",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(
     *         property="name",
     *         type="string",
     *         example="admin"
     *       ),
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Role created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/RoleResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreRoleRequest $request)
    {
        $dataValidated = $request->validated();
        return $this->success($this->service->store($dataValidated),'Data created');
    }

    /**
     * @OA\Put(
     *   path="/api/reference/roles/{id}",
     *   tags={"Reference/Role"},
     *   summary="Update an existing role",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Role ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name"},
     *         @OA\Property(property="name",type="string",example="admin"),
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Role updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/RoleResponse")
     *   ),
     *   @OA\Response(response=404, description="Role not found")
     * )
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $dataValidated = $request->validated();
        $dataUpdated = $this->service->update($id, $dataValidated);
        return $this->success($dataUpdated, 'Data updated');
    }

    /**
     * @OA\Delete(
     *   path="/api/reference/roles/{id}",
     *   tags={"Reference/Role"},
     *   summary="Delete a role by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Role ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Role deleted successfully", 
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="Role not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
