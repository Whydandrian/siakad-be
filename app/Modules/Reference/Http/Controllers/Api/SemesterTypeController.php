<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\SemesterTypeRequest\StoreSemesterTypeRequest;
use App\Modules\Reference\Http\Requests\SemesterTypeRequest\UpdateSemesterTypeRequest;
use App\Modules\Reference\Services\SemesterTypeService\SemesterTypeService;

class SemesterTypeController extends ApiController
{
    protected $service;

    public function __construct(SemesterTypeService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/semester-types",
     *   tags={"Reference/SemesterType"},
     *   summary="List all SemesterType",
     *   @OA\Response(
     *     response=200,
     *     description="List of SemesterType",
     *     @OA\JsonContent(ref="#/components/schemas/SemesterTypeListResponse")
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
     *   path="/api/reference/semester-types",
     *   tags={"Reference/SemesterType"},
     *   summary="Create a new SemesterType",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name", "code"},
     *         @OA\Property(
     *           property="name",
     *           type="object",
     *           example="example name"
     *         ),
     *         @OA\Property(
     *           property="code",
     *           type="string",
     *           example="example value"
     *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="SemesterType created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/SemesterTypeResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreSemesterTypeRequest $request)
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
     *   path="/api/reference/semester-types/{id}",
     *   tags={"Reference/SemesterType"},
     *   summary="Get SemesterType detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="SemesterType ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="SemesterType detail",
     *     @OA\JsonContent(ref="#/components/schemas/SemesterTypeResponse")
     *   ),
     *   @OA\Response(response=404, description="SemesterType not found")
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
     *   path="/api/reference/semester-types/{id}",
     *   tags={"Reference/SemesterType"},
     *   summary="Update an existing SemesterType",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="SemesterType ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name", "code"},
     *         @OA\Property(
     *           property="name",
     *           type="object",
     *           example="example name"
     *         ),
     *         @OA\Property(
     *           property="code",
     *           type="string",
     *           example="example value"
     *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="SemesterType updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/SemesterTypeResponse")
     *   ),
     *   @OA\Response(response=404, description="SemesterType not found")
     * )
     */
    public function update(UpdateSemesterTypeRequest $request, $id)
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
     *   path="/api/reference/semester-types/{id}",
     *   tags={"Reference/SemesterType"},
     *   summary="Delete a SemesterType by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="SemesterType ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="SemesterType deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="SemesterType not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
