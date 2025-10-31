<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\AcademicYearRequest\StoreAcademicYearRequest;
use App\Modules\Reference\Http\Requests\AcademicYearRequest\UpdateAcademicYearRequest;
use App\Modules\Reference\Services\AcademicYearService\AcademicYearService;

class AcademicYearController extends ApiController
{
    protected $service;

    public function __construct(AcademicYearService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/academic-years",
     *   tags={"Reference/AcademicYear"},
     *   summary="List all AcademicYear",
     *   @OA\Response(
     *     response=200,
     *     description="List of AcademicYear",
     *     @OA\JsonContent(ref="#/components/schemas/AcademicYearListResponse")
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
     *   path="/api/reference/academic-years",
     *   tags={"Reference/AcademicYear"},
     *   summary="Create a new AcademicYear",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="AcademicYear created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/AcademicYearResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreAcademicYearRequest $request)
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
     *   path="/api/reference/academic-years/{id}",
     *   tags={"Reference/AcademicYear"},
     *   summary="Get AcademicYear detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="AcademicYear ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="AcademicYear detail",
     *     @OA\JsonContent(ref="#/components/schemas/AcademicYearResponse")
     *   ),
     *   @OA\Response(response=404, description="AcademicYear not found")
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
     *   path="/api/reference/academic-years/{id}",
     *   tags={"Reference/AcademicYear"},
     *   summary="Update an existing AcademicYear",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="AcademicYear ID",
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
     *     description="AcademicYear updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/AcademicYearResponse")
     *   ),
     *   @OA\Response(response=404, description="AcademicYear not found")
     * )
     */
    public function update(UpdateAcademicYearRequest $request, $id)
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
     *   path="/api/reference/academic-years/{id}",
     *   tags={"Reference/AcademicYear"},
     *   summary="Delete a AcademicYear by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="AcademicYear ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="AcademicYear deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="AcademicYear not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
