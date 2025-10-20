<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Modules\Reference\Http\Requests\OrganizationUnitRequest\StoreOrganizationUnitRequest;
use App\Modules\Reference\Http\Requests\OrganizationUnitRequest\UpdateOrganizationUnitRequest;
use App\Modules\Reference\Services\OrganizationUnitService\OrganizationUnitService;

class OrganizationUnitController extends ApiController
{
    protected $service;

    public function __construct(OrganizationUnitService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->listAll();
    }

    /**
     * Store a newly created resource.
     */
    public function store(StoreOrganizationUnitRequest $request)
    {
        return $this->service->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function find($id)
    {
        return $this->service->find($id);
    }

    /**
     * Update the specified resource.
     */
    public function update(UpdateOrganizationUnitRequest $request, $id)
    {
        return $this->service->update($id, $request->validated());
    }

    /**
     * Remove the specified resource.
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
