<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\UnitTypeRequest\StoreUnitTypeRequest;
use App\Modules\Reference\Http\Requests\UnitTypeRequest\UpdateUnitTypeRequest;
use App\Modules\Reference\Services\UnitTypeService\UnitTypeService;

class UnitTypeController extends ApiController
{
    protected $service;

    public function __construct(UnitTypeService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *   path="/api/reference/unit-types",
     *   tags={"Reference/UnitType"},
     *   summary="List all unit types",
     *   @OA\Response(
     *     response=200,
     *     description="List of unit types",
     *     @OA\JsonContent(ref="#/components/schemas/UnitTypeListResponse")
     *   )
     * )
     */
    public function index()
    {
        return $this->success($this->service->listAll(), 'List of unit types');
    }

    /**
     * @OA\Post(
     *   path="/api/reference/unit-types",
     *   tags={"Reference/UnitType"},
     *   summary="Create new unit type",
     *   @OA\RequestBody(
     *     @OA\JsonContent(ref="#/components/schemas/UnitType")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Unit Type created",
     *     @OA\JsonContent(ref="#/components/schemas/UnitTypeResponse")
     *   )
     * )
     */
    public function store(StoreUnitTypeRequest $request)
    {
        return $this->success($this->service->store($request->validated()), 'Unit Type created');
    }

    /**
     * @OA\Get(
     *   path="/api/reference/unit-types/{id}",
     *   tags={"Reference/UnitType"},
     *   summary="Get detail unit type",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the unit type to get detail",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Unit Type detail",
     *     @OA\JsonContent(ref="#/components/schemas/UnitTypeResponse")
     *   ),
     *   @OA\Response(response=404, description="Unit Type not found")
     * )
     */
    public function find($id)
    {
        return $this->success($this->service->find($id), 'Unit Type detail');
    }

    /**
     * @OA\Put(
     *   path="/api/reference/unit-types/{id}",
     *   tags={"Reference/UnitType"},
     *   summary="Update an existing unit type",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the unit type to update",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/UnitType") 
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Unit Type updated",
     *     @OA\JsonContent(ref="#/components/schemas/UnitTypeResponse")
     *   ),
     *   @OA\Response(response=404, description="Unit Type not found")
     * )
     */
    public function update(UpdateUnitTypeRequest $request, $id)
    {
        return $this->success($this->service->update($id, $request->validated()), 'Unit Type updated');
    }

    /**
     * @OA\Delete(
     *   path="/api/reference/unit-types/{id}",
     *   tags={"Reference/UnitType"},
     *   summary="Delete unit type",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the unit type to delete",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(response=204, description="Deleted")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Unit Type deleted');
    }
}
