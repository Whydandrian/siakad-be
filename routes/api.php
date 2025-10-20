<?php

use App\Http\Controllers\Api\UserController as ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



// Route::prefix('users')->group(function () {
//     // GET /api/users
//     Route::get('/', [ApiUserController::class, 'index'])->name('api.users.index');

//     // GET /api/users/{user}
//     Route::get('/{user}', [ApiUserController::class, 'show'])->name('api.users.show');

//     // POST /api/users
//     Route::post('/', [ApiUserController::class, 'store'])->name('api.users.store');

//     // DELETE /api/users/{user}
//     Route::delete('/{user}', [ApiUserController::class, 'destroy'])->name('api.users.destroy');
// });
