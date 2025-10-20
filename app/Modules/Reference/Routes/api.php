<?php

use App\Modules\Reference\Http\Controllers\Api\CohortYearController;
use App\Modules\Reference\Http\Controllers\Api\CourseTypeController;
use App\Modules\Reference\Http\Controllers\Api\MinimumPrerequisiteCourseController;
use App\Modules\Reference\Http\Controllers\Api\OrganizationLevelController;
use App\Modules\Reference\Http\Controllers\Api\OrganizationUnitController;
use App\Modules\Reference\Http\Controllers\Api\RoleController;
use App\Modules\Reference\Http\Controllers\Api\SemesterTypeController;
use App\Modules\Reference\Http\Controllers\Api\StatusController;
use App\Modules\Reference\Http\Controllers\Api\StatusTypeController;
use App\Modules\Reference\Http\Controllers\Api\UnitTypeController;
use App\Modules\Reference\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Reference Module API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for Reference module.
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

Route::prefix('reference')->name('reference.')->group(function () {

    // User Routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('api.users.index');
        Route::get('/{user}', [UserController::class, 'show'])->name('api.users.show');
        Route::post('/', [UserController::class, 'store'])->name('api.users.store');
        Route::put('/{id}', [UserController::class, 'update'])->name('api.users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('api.users.destroy');
    });

    // Status Type Routes
    Route::prefix('status-types')->group(function () {
        Route::get('/', [StatusTypeController::class, 'index'])->name('api.status-types.index');
        Route::post('', [StatusTypeController::class, 'store'])->name('api.status-types.store');
        Route::get('/{id}', [StatusTypeController::class, 'find'])->name('api.status-types.show');
        Route::put('/{id}', [StatusTypeController::class, 'update'])->name('api.status-types.update');
        Route::delete('{id}', [StatusTypeController::class, 'destroy'])->name('api.status-types.destroy');
    });
    
    // Status Routes
    Route::prefix('statuses')->group(function () {
        Route::get('/', [StatusController::class, 'index'])->name('api.statuses.index');
        Route::post('', [StatusController::class, 'store'])->name('api.statuses.store');
        Route::get('/{id}', [StatusController::class, 'find'])->name('api.statuses.show');
        Route::put('/{id}', [StatusController::class, 'update'])->name('api.statuses.update');
        Route::delete('{id}', [StatusController::class, 'destroy'])->name('api.statuses.destroy');
    });

    // Course Type Routes
    Route::prefix('course-types')->group(function () {
        Route::get('/', [CourseTypeController::class, 'index'])->name('api.course-types.index');
        Route::get('/{id}', [CourseTypeController::class, 'find'])->name('api.course-types.show');
        Route::put('/{id}', [CourseTypeController::class, 'update'])->name('api.course-types.update');
        Route::post('/', [CourseTypeController::class, 'store'])->name('api.course-types.store');
        Route::delete('/{id}', [CourseTypeController::class, 'destroy'])->name('api.course-types.destroy');
    });
    
    // Roles Routes
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('api.roles.index');
        Route::get('/{id}', [RoleController::class, 'find'])->name('api.roles.show');
        Route::put('/{id}', [RoleController::class, 'update'])->name('api.roles.update');
        Route::post('/', [RoleController::class, 'store'])->name('api.roles.store');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('api.roles.destroy');
    });

    // Unit Types Routes
    Route::prefix('unit-types')->group(function () {
        Route::get('/', [UnitTypeController::class, 'index'])->name('api.unit-types.index');
        Route::get('/{id}', [UnitTypeController::class, 'find'])->name('api.unit-types.show');
        Route::post('/', [UnitTypeController::class, 'store'])->name('api.unit-types.store');
        Route::delete('/{id}', [UnitTypeController::class, 'destroy'])->name('api.unit-types.destroy');
    });

    // Organization Level Routes
    Route::prefix('organization-levels')->group(function () {
        Route::get('/', [OrganizationLevelController::class, 'index'])->name('api.organization-levels.index');
        Route::get('/{id}', [OrganizationLevelController::class, 'find'])->name('api.organization-levels.show');
        Route::post('/', [OrganizationLevelController::class, 'store'])->name('api.organization-levels.store');
        Route::delete('/{id}', [OrganizationLevelController::class, 'destroy'])->name('api.organization-levels.destroy');
    });
    
    // Organization Unit Routes
    Route::prefix('organization-units')->group(function () {
        Route::get('/', [OrganizationUnitController::class, 'index'])->name('api.organization-units.index');
        Route::get('/{id}', [OrganizationUnitController::class, 'find'])->name('api.organization-units.show');
        Route::post('/', [OrganizationUnitController::class, 'store'])->name('api.organization-units.store');
        Route::delete('/{id}', [OrganizationUnitController::class, 'destroy'])->name('api.organization-units.destroy');
    });
    
    // Cohort Year Routes
    Route::prefix('cohort-years')->group(function () {
        Route::get('/', [CohortYearController::class, 'index'])->name('api.cohort-years.index');
        Route::get('/{id}', [CohortYearController::class, 'find'])->name('api.cohort-years.show');
        Route::put('/{id}', [CohortYearController::class, 'update'])->name('api.cohort-years.update');
        Route::post('/', [CohortYearController::class, 'store'])->name('api.cohort-years.store');
        Route::delete('/{id}', [CohortYearController::class, 'destroy'])->name('api.cohort-years.destroy');
    });
    
    // Semester Type Routes
    Route::prefix('semester-types')->group(function () {
        Route::get('/', [SemesterTypeController::class, 'index'])->name('api.semester-types.index');
        Route::get('/{id}', [SemesterTypeController::class, 'find'])->name('api.semester-types.show');
        Route::put('/{id}', [SemesterTypeController::class, 'update'])->name('api.semester-types.update');
        Route::post('/', [SemesterTypeController::class, 'store'])->name('api.semester-types.store');
        Route::delete('/{id}', [SemesterTypeController::class, 'destroy'])->name('api.semester-types.destroy');
    });
    
    // Minimum Prerequisite Routes
    Route::prefix('minimum-prerequisite-courses')->group(function () {
        Route::get('/', [MinimumPrerequisiteCourseController::class, 'index'])->name('api.minimum-prerequisites.index');
        Route::get('/{id}', [MinimumPrerequisiteCourseController::class, 'find'])->name('api.minimum-prerequisites.show');
        Route::put('/{id}', [MinimumPrerequisiteCourseController::class, 'update'])->name('api.minimum-prerequisites.update');
        Route::post('/', [MinimumPrerequisiteCourseController::class, 'store'])->name('api.minimum-prerequisites.store');
        Route::delete('/{id}', [MinimumPrerequisiteCourseController::class, 'destroy'])->name('api.minimum-prerequisites.destroy');
    });



});