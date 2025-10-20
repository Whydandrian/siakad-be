<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\OrganizationLevelRequest\StoreOrganizationLevelRequest;
use App\Modules\Reference\Http\Requests\OrganizationLevelRequest\UpdateOrganizationLevelRequest;
use App\Modules\Reference\Services\OrganizationLevelService\OrganizationLevelService;

class OrganizationLevelController extends ApiController
{
    protected $service;

    public function __construct(OrganizationLevelService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *   path="/api/reference/organization-levels",
     *   tags={"Reference/OrganizationLevel"},
     *   summary="List all organization levels",
     *   @OA\Response(
     *     response=200,
     *     description="List of organization levels",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationLevelListResponse")
     *   )
     * )
     */
    public function index()
    {
        return $this->success($this->service->listAll(), 'List of organization levels');
    }

    /**
     * @OA\Get(
     *   path="/api/reference/organization-levels/{id}",
     *   tags={"Reference/OrganizationLevel"},
     *   summary="Get detail organization level",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Organization level detail",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationLevelResponse")
     *   ),
     *   @OA\Response(response=404, description="Organization level not found")    
     * )
     */
    public function store(StoreOrganizationLevelRequest $request)
    {
        return $this->success($this->service->store($request->validated()), 'Organization level created');
    }

    /**
     * @OA\Post(
     *   path="/api/reference/organization-levels",
     *   tags={"Reference/OrganizationLevel"},
     *   summary="Create new organization level",
     *   @OA\RequestBody(
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationLevel")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Organization level created",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationLevelResponse")
     *   )
     * )
     */
    public function find($id)
    {
        return $this->success($this->service->find($id), 'Organization level detail');
    }

    /**
     * @OA\Put(
     *   path="/api/reference/organization-levels/{id}",
     *   tags={"Reference/OrganizationLevel"},
     *   summary="Update an existing organization level",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the organization level to update",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationLevel") 
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Organization level updated",
     *     @OA\JsonContent(ref="#/components/schemas/OrganizationLevelResponse")
     *   ),
     *   @OA\Response(response=404, description="Organization level not found")
     * )
     */
    public function update(UpdateOrganizationLevelRequest $request, $id)
    {
        return $this->success($this->service->update($id, $request->validated()), 'Organization level updated');
    }

    /**
     * @OA\Delete(
     *   path="/api/reference/organization-levels/{id}",
     *   tags={"Reference/OrganizationLevel"},
     *   summary="Delete organization level",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the organization level to delete",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(response=204, description="Organization level deleted")
     * )
     */
    public function destroy($id)
    {
        return $this->success($this->service->delete($id), 'Organization level deleted');
    }
}
