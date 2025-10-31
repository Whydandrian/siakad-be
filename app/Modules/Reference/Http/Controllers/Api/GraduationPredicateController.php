<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\GraduationPredicateRequest\StoreGraduationPredicateRequest;
use App\Modules\Reference\Http\Requests\GraduationPredicateRequest\UpdateGraduationPredicateRequest;
use App\Modules\Reference\Services\GraduationPredicateService\GraduationPredicateService;

class GraduationPredicateController extends ApiController
{
    protected $service;

    public function __construct(GraduationPredicateService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/graduation-predicates",
     *   tags={"Reference/GraduationPredicate"},
     *   summary="List all GraduationPredicate",
     *   @OA\Response(
     *     response=200,
     *     description="List of GraduationPredicate",
     *     @OA\JsonContent(ref="#/components/schemas/GraduationPredicateListResponse")
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
     *   path="/api/reference/graduation-predicates",
     *   tags={"Reference/GraduationPredicate"},
     *   summary="Create a new GraduationPredicate",
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
     *     description="GraduationPredicate created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/GraduationPredicateResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreGraduationPredicateRequest $request)
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
     *   path="/api/reference/graduation-predicates/{id}",
     *   tags={"Reference/GraduationPredicate"},
     *   summary="Get GraduationPredicate detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="GraduationPredicate ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="GraduationPredicate detail",
     *     @OA\JsonContent(ref="#/components/schemas/GraduationPredicateResponse")
     *   ),
     *   @OA\Response(response=404, description="GraduationPredicate not found")
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
     *   path="/api/reference/graduation-predicates/{id}",
     *   tags={"Reference/GraduationPredicate"},
     *   summary="Update an existing GraduationPredicate",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="GraduationPredicate ID",
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
     *     description="GraduationPredicate updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/GraduationPredicateResponse")
     *   ),
     *   @OA\Response(response=404, description="GraduationPredicate not found")
     * )
     */
    public function update(UpdateGraduationPredicateRequest $request, $id)
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
     *   path="/api/reference/graduation-predicates/{id}",
     *   tags={"Reference/GraduationPredicate"},
     *   summary="Delete a GraduationPredicate by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="GraduationPredicate ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="GraduationPredicate deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="GraduationPredicate not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
