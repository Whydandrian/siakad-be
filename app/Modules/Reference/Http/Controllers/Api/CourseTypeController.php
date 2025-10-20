<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\CourseTypeRequest\StoreCourseTypeRequest;
use App\Modules\Reference\Http\Requests\CourseTypeRequest\UpdateCourseTypeRequest;
use App\Modules\Reference\Services\CourseTypeService\CourseTypeService;

class CourseTypeController extends ApiController
{
    protected $service;

    public function __construct(CourseTypeService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *   path="/api/reference/course-types",
     *   tags={"Reference/CourseType"},
     *   summary="List all course types",
     *   @OA\Response(
     *     response=200,
     *     description="List of course types",
     *     @OA\JsonContent(ref="#/components/schemas/CourseTypeListResponse")
     *   )
     * )
     */
    public function index()
    {
        return $this->success($this->service->listAll(), 'List of course types');
    }

    /**
     * @OA\Post(
     *   path="/api/reference/course-types",
     *   tags={"Reference/CourseType"},
     *   summary="Create new course type",
     *   @OA\RequestBody(
     *     @OA\JsonContent(ref="#/components/schemas/CourseType")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Course Type created",
     *     @OA\JsonContent(ref="#/components/schemas/CourseTypeResponse")
     *   )
     * )
     */
    public function store(StoreCourseTypeRequest $request)
    {
        return $this->success($this->service->store($request->validated()), 'Course Type created');
    }

    /**
     * @OA\Get(
     *   path="/api/reference/course-types/{id}",
     *   tags={"Reference/CourseType"},
     *   summary="Get detail course type",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Course Type detail",
     *     @OA\JsonContent(ref="#/components/schemas/CourseTypeResponse")
     *   ),
     *   @OA\Response(response=404, description="Course Type not found")
     * )
     */
    public function find(string $id)
    {
        return $this->success($this->service->find($id), 'Course Type detail');
    }

    /**
     * @OA\Put(
     *   path="/api/reference/course-types/{id}",
     *   tags={"Reference/CourseType"},
     *   summary="Update an existing course type",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the course type to update",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/CourseType") 
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Course Type updated",
     *     @OA\JsonContent(ref="#/components/schemas/CourseTypeResponse")
     *   ),
     *   @OA\Response(response=404, description="Course Type not found")
     * )
     */
    public function update(UpdateCourseTypeRequest $request, $id)
    {
        return $this->success($this->service->update($id, $request->validated()), 'Course Type updated');
    }

    /**
     * @OA\Delete(
     *   path="/api/reference/course-types/{id}",
     *   tags={"Reference/CourseType"},
     *   summary="Delete course type",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the course type to delete",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(response=204, description="Deleted")
     * )
     */
    public function destroy(string $id)
    {
        return $this->success($this->service->delete($id), 'Course Type deleted');
    }
}
