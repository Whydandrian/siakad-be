<?php

namespace App\Modules\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Authentication\Services\UserService\UserService;
use App\Modules\Authentication\Http\Requests\UserRequest\StoreUserRequest;
use App\Modules\Authentication\Http\Requests\UserRequest\UpdateUserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->listAll());
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        return response()->json($this->service->store($request->validated()));
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->service->find($id));
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        return response()->json([
            'success' => $this->service->update($id, $request->validated()),
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json([
            'success' => $this->service->delete($id),
        ]);
    }
}
