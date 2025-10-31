<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\GraduationRequest\StoreGraduationRequest;
use App\Modules\Reference\Http\Requests\GraduationRequest\UpdateGraduationRequest;
use App\Modules\Reference\Services\GraduationService\GraduationService;

class GraduationController extends ApiController
{
    protected $service;

    public function __construct(GraduationService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/graduations",
     *   tags={"Reference/Graduation"},
     *   summary="List all Graduation",
     *   @OA\Response(
     *     response=200,
     *     description="List of Graduation",
     *     @OA\JsonContent(ref="#/components/schemas/GraduationListResponse")
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
     *   path="/api/reference/graduations",
     *   tags={"Reference/Graduation"},
     *   summary="Create a new Graduation",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Graduation created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/GraduationResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreGraduationRequest $request)
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
     *   path="/api/reference/graduations/{id}",
     *   tags={"Reference/Graduation"},
     *   summary="Get Graduation detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Graduation ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Graduation detail",
     *     @OA\JsonContent(ref="#/components/schemas/GraduationResponse")
     *   ),
     *   @OA\Response(response=404, description="Graduation not found")
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
     *   path="/api/reference/graduations/{id}",
     *   tags={"Reference/Graduation"},
     *   summary="Update an existing Graduation",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Graduation ID",
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
     *     description="Graduation updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/GraduationResponse")
     *   ),
     *   @OA\Response(response=404, description="Graduation not found")
     * )
     */
    public function update(UpdateGraduationRequest $request, $id)
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
     *   path="/api/reference/graduations/{id}",
     *   tags={"Reference/Graduation"},
     *   summary="Delete a Graduation by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Graduation ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Graduation deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="Graduation not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
