<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\CohortYearRequest\StoreCohortYearRequest;
use App\Modules\Reference\Http\Requests\CohortYearRequest\UpdateCohortYearRequest;
use App\Modules\Reference\Services\CohortYearService\CohortYearService;

class CohortYearController extends ApiController
{
    protected $service;

    public function __construct(CohortYearService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/cohort-years",
     *   tags={"Reference/CohortYear"},
     *   summary="List all cohort-years",
     *   @OA\Response(
     *     response=200,
     *     description="List of cohort-years",
     *     @OA\JsonContent(ref="#/components/schemas/CohortYearListResponse")
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
     *   path="/api/reference/cohort-years",
     *   tags={"Reference/CohortYear"},
     *   summary="Create a new cohort-year",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"year", "name"},
     *         @OA\Property(
     *           property="year",
     *           type="string",
     *           example="2023"
     *         ),
     *         @OA\Property(
     *           property="name",
     *           type="string",
     *           example="2023/2024"
     *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="CohortYear created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/CohortYearResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreCohortYearRequest $request)
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
     *   path="/api/reference/cohort-years/{id}",
     *   tags={"Reference/CohortYear"},
     *   summary="Get cohort-year detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="CohortYear ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="CohortYear detail",
     *     @OA\JsonContent(ref="#/components/schemas/CohortYearResponse")
     *   ),
     *   @OA\Response(response=404, description="CohortYear not found")
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
     *   path="/api/reference/cohort-years/{id}",
     *   tags={"Reference/CohortYear"},
     *   summary="Update an existing cohort-year",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="CohortYear ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"year", "name"},
     *         @OA\Property(
     *           property="year",
     *           type="string",
     *           example="2023"
     *         ),
     *         @OA\Property(
     *           property="name",
     *           type="string",
     *           example="2023/2024"
     *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="CohortYear updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/CohortYearResponse")
     *   ),
     *   @OA\Response(response=404, description="CohortYear not found")
     * )
     */
    public function update(UpdateCohortYearRequest $request, $id)
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
     *   path="/api/reference/cohort-years/{id}",
     *   tags={"Reference/CohortYear"},
     *   summary="Delete a cohort-year by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="CohortYear ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="CohortYear deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="CohortYear not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}