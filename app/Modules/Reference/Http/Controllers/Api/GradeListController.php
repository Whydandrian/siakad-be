<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\GradeListRequest\StoreGradeListRequest;
use App\Modules\Reference\Http\Requests\GradeListRequest\UpdateGradeListRequest;
use App\Modules\Reference\Services\GradeListService\GradeListService;

class GradeListController extends ApiController
{
    protected $service;

    public function __construct(GradeListService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/grade-lists",
     *   tags={"Reference/GradeList"},
     *   summary="List all GradeList",
     *   @OA\Response(
     *     response=200,
     *     description="List of GradeList",
     *     @OA\JsonContent(ref="#/components/schemas/GradeListListResponse")
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
     *   path="/api/reference/grade-lists",
     *   tags={"Reference/GradeList"},
     *   summary="Create a new GradeList",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="GradeList created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/GradeListResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreGradeListRequest $request)
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
     *   path="/api/reference/grade-lists/{id}",
     *   tags={"Reference/GradeList"},
     *   summary="Get GradeList detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="GradeList ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="GradeList detail",
     *     @OA\JsonContent(ref="#/components/schemas/GradeListResponse")
     *   ),
     *   @OA\Response(response=404, description="GradeList not found")
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
     *   path="/api/reference/grade-lists/{id}",
     *   tags={"Reference/GradeList"},
     *   summary="Update an existing GradeList",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="GradeList ID",
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
     *     description="GradeList updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/GradeListResponse")
     *   ),
     *   @OA\Response(response=404, description="GradeList not found")
     * )
     */
    public function update(UpdateGradeListRequest $request, $id)
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
     *   path="/api/reference/grade-lists/{id}",
     *   tags={"Reference/GradeList"},
     *   summary="Delete a GradeList by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="GradeList ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="GradeList deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="GradeList not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
