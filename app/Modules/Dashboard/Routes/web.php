<?php

use App\Modules\Dashboard\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Module Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for Dashboard module.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/
Route::middleware('auth')->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/',[DashboardController::class,'index'])->name('index');
    });

});