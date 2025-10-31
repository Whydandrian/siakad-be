<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\AccreditationRequest\StoreAccreditationRequest;
use App\Modules\Reference\Http\Requests\AccreditationRequest\UpdateAccreditationRequest;
use App\Modules\Reference\Services\AccreditationService\AccreditationService;

class AccreditationController extends ApiController
{
    protected $service;

    public function __construct(AccreditationService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/accreditations",
     *   tags={"Reference/Accreditation"},
     *   summary="List all Accreditation",
     *   @OA\Response(
     *     response=200,
     *     description="List of Accreditation",
     *     @OA\JsonContent(ref="#/components/schemas/AccreditationListResponse")
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
     *   path="/api/reference/accreditations",
     *   tags={"Reference/Accreditation"},
     *   summary="Create a new Accreditation",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name", "description"},
     *         @OA\Property(
     *           property="name",
     *           type="object",
     *           example="example name"
     *         ),
     *         @OA\Property(
     *           property="description",
     *           type="string",
     *           example="example description"
     *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Accreditation created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/AccreditationResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreAccreditationRequest $request)
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
     *   path="/api/reference/accreditations/{id}",
     *   tags={"Reference/Accreditation"},
     *   summary="Get Accreditation detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Accreditation ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Accreditation detail",
     *     @OA\JsonContent(ref="#/components/schemas/AccreditationResponse")
     *   ),
     *   @OA\Response(response=404, description="Accreditation not found")
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
     *   path="/api/reference/accreditations/{id}",
     *   tags={"Reference/Accreditation"},
     *   summary="Update an existing Accreditation",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Accreditation ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name", "description"},
     *         @OA\Property(
     *           property="name",
     *           type="object",
     *           example="example name"
     *         ),
     *         @OA\Property(
     *           property="description",
     *           type="string",
     *           example="example description"
     *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Accreditation updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/AccreditationResponse")
     *   ),
     *   @OA\Response(response=404, description="Accreditation not found")
     * )
     */
    public function update(UpdateAccreditationRequest $request, $id)
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
     *   path="/api/reference/accreditations/{id}",
     *   tags={"Reference/Accreditation"},
     *   summary="Delete a Accreditation by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="Accreditation ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Accreditation deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="Accreditation not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
