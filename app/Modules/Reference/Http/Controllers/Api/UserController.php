<?php

namespace App\Modules\Reference\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use App\Modules\Reference\Http\Requests\UserRequest;
use App\Modules\Reference\Services\UserService\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends ApiController
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Get(
     *   path="/api/reference/users",
     *   tags={"Reference/User"},
     *   summary="List all users",
     *   @OA\Response(
     *     response=200,
     *     description="List of users",
     *     @OA\JsonContent(ref="#/components/schemas/UserListResponse")
     *   )
     * )
     */
    public function index()
    {
        return $this->success($this->userService->listAll(), 'List of users');
    }

    /**
     * @OA\Get(
     *   path="/api/reference/users/{id}",
     *   tags={"Reference/User"},
     *   summary="Get detail user",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="User detail",
     *     @OA\JsonContent(ref="#/components/schemas/UserResponse")
     *   ),
     *   @OA\Response(response=404, description="User not found")
     * )
     */
    public function show(User $user)
    {
        return $this->success($this->userService->find($user->id), 'User detail');
    }

    /**
     * @OA\Post(
     *   path="/api/reference/users",
     *   tags={"Reference/User"},
     *   summary="Create new user",
     *   @OA\RequestBody(
     *     @OA\JsonContent(ref="#/components/schemas/User")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="User created",
     *     @OA\JsonContent(ref="#/components/schemas/UserResponse")
     *   )
     * )
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $user = $this->userService->store($validated);
        
        if (!$user) {
            return $this->error('Create user failed', 404);
        }

        return $this->created($user, 'User created');
    }

    /**
     * @OA\Put(
     *   path="/api/reference/users/{id}",
     *   tags={"Reference/User"},
     *   summary="Update an existing user",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="ID of the user to update",
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/User") 
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="User updated",
     *     @OA\JsonContent(ref="#/components/schemas/UserResponse")
     *   ),
     *   @OA\Response(response=404, description="User not found")
     * )
     */
    public function update(UserRequest $request, string $id)
    {
        $validated = $request->validated();
        $result = $this->userService->update($id, $validated);

        if (!$result) {
            return $this->error('Update user failed', 404);
        }

        return $this->success($result, 'User updated');
    }


    /**
     * @OA\Delete(
     *   path="/api/reference/users/{id}",
     *   tags={"Reference/User"},
     *   summary="Delete user",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *   @OA\Response(response=204, description="Deleted")
     * )
     */
    public function destroy(User $user)
    {
        $result = $this->userService->delete($user->id);
        
        if (!$result) {
            return $this->error('Delete user failed', 404);
        }

        return $this->success($result, 'User deleted');
    }


}