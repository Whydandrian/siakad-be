<?php

namespace App\Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Dashboard\Services\DashboardService\DashboardService;
use App\Modules\User\Http\Requests\UserRequest\StoreUserRequest;
use App\Modules\User\Http\Requests\UserRequest\UpdateUserRequest;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function __construct(
        protected DashboardService $service
    ) {}

    public function index()
    {
        
        return view("dashboard::index");

    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->service->find($id));
    }

}
