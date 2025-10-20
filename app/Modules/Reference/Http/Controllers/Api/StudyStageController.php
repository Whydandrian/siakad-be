<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\StudyStageRequest\StoreStudyStageRequest;
use App\Modules\Reference\Http\Requests\StudyStageRequest\UpdateStudyStageRequest;
use App\Modules\Reference\Services\StudyStageService\StudyStageService;

class StudyStageController extends ApiController
{
    protected $service;

    public function __construct(StudyStageService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/study-stages",
     *   tags={"Reference/StudyStage"},
     *   summary="List all StudyStage",
     *   @OA\Response(
     *     response=200,
     *     description="List of StudyStage",
     *     @OA\JsonContent(ref="#/components/schemas/StudyStageListResponse")
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
     *   path="/api/reference/study-stages",
     *   tags={"Reference/StudyStage"},
     *   summary="Create a new StudyStage",
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
     *     description="StudyStage created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/StudyStageResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreStudyStageRequest $request)
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
     *   path="/api/reference/study-stages/{id}",
     *   tags={"Reference/StudyStage"},
     *   summary="Get StudyStage detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="StudyStage ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="StudyStage detail",
     *     @OA\JsonContent(ref="#/components/schemas/StudyStageResponse")
     *   ),
     *   @OA\Response(response=404, description="StudyStage not found")
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
     *   path="/api/reference/study-stages/{id}",
     *   tags={"Reference/StudyStage"},
     *   summary="Update an existing StudyStage",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="StudyStage ID",
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
     *     description="StudyStage updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/StudyStageResponse")
     *   ),
     *   @OA\Response(response=404, description="StudyStage not found")
     * )
     */
    public function update(UpdateStudyStageRequest $request, $id)
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
     *   path="/api/reference/study-stages/{id}",
     *   tags={"Reference/StudyStage"},
     *   summary="Delete a StudyStage by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="StudyStage ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="StudyStage deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="StudyStage not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
