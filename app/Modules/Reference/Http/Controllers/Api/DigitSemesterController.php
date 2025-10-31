<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\DigitSemesterRequest\StoreDigitSemesterRequest;
use App\Modules\Reference\Http\Requests\DigitSemesterRequest\UpdateDigitSemesterRequest;
use App\Modules\Reference\Services\DigitSemesterService\DigitSemesterService;

class DigitSemesterController extends ApiController
{
    protected $service;

    public function __construct(DigitSemesterService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/digit-semesters",
     *   tags={"Reference/DigitSemester"},
     *   summary="List all DigitSemester",
     *   @OA\Response(
     *     response=200,
     *     description="List of DigitSemester",
     *     @OA\JsonContent(ref="#/components/schemas/DigitSemesterListResponse")
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
     *   path="/api/reference/digit-semesters",
     *   tags={"Reference/DigitSemester"},
     *   summary="Create a new DigitSemester",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="DigitSemester created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/DigitSemesterResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreDigitSemesterRequest $request)
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
     *   path="/api/reference/digit-semesters/{id}",
     *   tags={"Reference/DigitSemester"},
     *   summary="Get DigitSemester detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="DigitSemester ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="DigitSemester detail",
     *     @OA\JsonContent(ref="#/components/schemas/DigitSemesterResponse")
     *   ),
     *   @OA\Response(response=404, description="DigitSemester not found")
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
     *   path="/api/reference/digit-semesters/{id}",
     *   tags={"Reference/DigitSemester"},
     *   summary="Update an existing DigitSemester",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="DigitSemester ID",
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
     *     description="DigitSemester updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/DigitSemesterResponse")
     *   ),
     *   @OA\Response(response=404, description="DigitSemester not found")
     * )
     */
    public function update(UpdateDigitSemesterRequest $request, $id)
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
     *   path="/api/reference/digit-semesters/{id}",
     *   tags={"Reference/DigitSemester"},
     *   summary="Delete a DigitSemester by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="DigitSemester ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="DigitSemester deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="DigitSemester not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
