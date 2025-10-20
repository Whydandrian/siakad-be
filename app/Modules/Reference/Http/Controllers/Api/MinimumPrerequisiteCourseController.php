<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\MinimumPrerequisiteCourseRequest\StoreMinimumPrerequisiteCourseRequest;
use App\Modules\Reference\Http\Requests\MinimumPrerequisiteCourseRequest\UpdateMinimumPrerequisiteCourseRequest;
use App\Modules\Reference\Services\MinimumPrerequisiteCourseService\MinimumPrerequisiteCourseService;

class MinimumPrerequisiteCourseController extends ApiController
{
    protected $service;

    public function __construct(MinimumPrerequisiteCourseService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *   path="/api/reference/minimum-prerequisite-courses",
     *   tags={"Reference/MinimumPrerequisiteCourse"},
     *   summary="List all MinimumPrerequisiteCourse",
     *   @OA\Response(
     *     response=200,
     *     description="List of MinimumPrerequisiteCourse",
     *     @OA\JsonContent(ref="#/components/schemas/MinimumPrerequisiteCourseListResponse")
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
     *   path="/api/reference/minimum-prerequisite-courses",
     *   tags={"Reference/MinimumPrerequisiteCourse"},
     *   summary="Create a new MinimumPrerequisiteCourse",
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
     *     description="MinimumPrerequisiteCourse created successfully",
     *     @OA\JsonContent(ref="#/components/schemas/MinimumPrerequisiteCourseResponse")
     *   ),
     *   @OA\Response(response=422, description="Validation failed")
     * )
     */
    public function store(StoreMinimumPrerequisiteCourseRequest $request)
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
     *   path="/api/reference/minimum-prerequisite-courses/{id}",
     *   tags={"Reference/MinimumPrerequisiteCourse"},
     *   summary="Get MinimumPrerequisiteCourse detail by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="MinimumPrerequisiteCourse ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="MinimumPrerequisiteCourse detail",
     *     @OA\JsonContent(ref="#/components/schemas/MinimumPrerequisiteCourseResponse")
     *   ),
     *   @OA\Response(response=404, description="MinimumPrerequisiteCourse not found")
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
     *   path="/api/reference/minimum-prerequisite-courses/{id}",
     *   tags={"Reference/MinimumPrerequisiteCourse"},
     *   summary="Update an existing MinimumPrerequisiteCourse",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="MinimumPrerequisiteCourse ID",
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
     *     description="MinimumPrerequisiteCourse updated successfully",
     *     @OA\JsonContent(ref="#/components/schemas/MinimumPrerequisiteCourseResponse")
     *   ),
     *   @OA\Response(response=404, description="MinimumPrerequisiteCourse not found")
     * )
     */
    public function update(UpdateMinimumPrerequisiteCourseRequest $request, $id)
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
     *   path="/api/reference/minimum-prerequisite-courses/{id}",
     *   tags={"Reference/MinimumPrerequisiteCourse"},
     *   summary="Delete a MinimumPrerequisiteCourse by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="MinimumPrerequisiteCourse ID",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="MinimumPrerequisiteCourse deleted successfully",
     *     @OA\JsonContent(
     *       example={
     *         "status": "success",
     *         "message": "Data deleted",
     *         "data": true
     *       }
     *     )
     *   ),
     *   @OA\Response(response=404, description="MinimumPrerequisiteCourse not found")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Data deleted');
    }
}
