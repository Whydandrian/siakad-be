<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\AdmissionPathwayRequest\StoreAdmissionPathwayRequest;
use App\Modules\Reference\Http\Requests\AdmissionPathwayRequest\UpdateAdmissionPathwayRequest;
use App\Modules\Reference\Services\AdmissionPathwayService\AdmissionPathwayService;

class AdmissionPathwayController extends ApiController
{
    protected $service;

    public function __construct(AdmissionPathwayService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/admission-pathways",
     *   tags={"Reference/AdmissionPathway"},
     *   summary="List all AdmissionPathway",
     *   @OA\Response(
     *     response=200,
     *     description="List of AdmissionPathway",
     *     @OA\JsonContent(ref="#/components/schemas/AdmissionPathwayListResponse")
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
     *   path="/api/reference/admission-pathways",
     *   tags={"Reference/AdmissionPathway"},
     *   summary="Create a new AdmissionPathway",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       required={"name"},
              *         @OA\Property(
       *           property="name",
       *           type="object",
       *           example="example name"
       *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="AdmissionPathway created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/AdmissionPathwayResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreAdmissionPathwayRequest $request)
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
     *   path="/api/reference/admission-pathways/{id}",
     *   tags={"Reference/AdmissionPathway"},
     *   summary="Get AdmissionPathway detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="AdmissionPathway ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="AdmissionPathway detail",
     *     @OA\JsonContent(ref="#/components/schemas/AdmissionPathwayResponse")
     *   ),
     *   @OA\Response(response=404, description="AdmissionPathway not found")
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
     *   path="/api/reference/admission-pathways/{id}",
     *   tags={"Reference/AdmissionPathway"},
     *   summary="Update an existing AdmissionPathway",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="AdmissionPathway ID",
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
       *         )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="AdmissionPathway updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/AdmissionPathwayResponse")
     *   ),
     *   @OA\Response(response=404, description="AdmissionPathway not found")
     * )
     */
    public function update(UpdateAdmissionPathwayRequest $request, $id)
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
     *   path="/api/reference/admission-pathways/{id}",
     *   tags={"Reference/AdmissionPathway"},
     *   summary="Delete a AdmissionPathway by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="AdmissionPathway ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="AdmissionPathway deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="AdmissionPathway not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
