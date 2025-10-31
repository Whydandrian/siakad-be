<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\EducationLevelRequest\StoreEducationLevelRequest;
use App\Modules\Reference\Http\Requests\EducationLevelRequest\UpdateEducationLevelRequest;
use App\Modules\Reference\Services\EducationLevelService\EducationLevelService;

class EducationLevelController extends ApiController
{
    protected $service;

    public function __construct(EducationLevelService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/education-levels",
     *   tags={"Reference/EducationLevel"},
     *   summary="List all EducationLevel",
     *   @OA\Response(
     *     response=200,
     *     description="List of EducationLevel",
     *     @OA\JsonContent(ref="#/components/schemas/EducationLevelListResponse")
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
     *   path="/api/reference/education-levels",
     *   tags={"Reference/EducationLevel"},
     *   summary="Create a new EducationLevel",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name"},
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
     *     description="EducationLevel created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/EducationLevelResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreEducationLevelRequest $request)
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
     *   path="/api/reference/education-levels/{id}",
     *   tags={"Reference/EducationLevel"},
     *   summary="Get EducationLevel detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="EducationLevel ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="EducationLevel detail",
     *     @OA\JsonContent(ref="#/components/schemas/EducationLevelResponse")
     *   ),
     *   @OA\Response(response=404, description="EducationLevel not found")
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
     *   path="/api/reference/education-levels/{id}",
     *   tags={"Reference/EducationLevel"},
     *   summary="Update an existing EducationLevel",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="EducationLevel ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name"},
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
     *     description="EducationLevel updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/EducationLevelResponse")
     *   ),
     *   @OA\Response(response=404, description="EducationLevel not found")
     * )
     */
    public function update(UpdateEducationLevelRequest $request, $id)
    {
        $dataValidated = $request->validated();
        $dataUpdated = $this->service->update($id, $dataValidated);

        return $this->success($dataUpdated, 'Data updated');
    }

    /**
     * Remove the specified resource.
     */
    /**
     * @OA\Delete(
     *   path="/api/reference/education-levels/{id}",
     *   tags={"Reference/EducationLevel"},
     *   summary="Delete a EducationLevel by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="EducationLevel ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="EducationLevel deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="EducationLevel not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
