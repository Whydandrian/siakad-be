<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Module API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for Dashboard module.
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    
    // Add your API routes here
    // Example:
    // Route::apiResource('users', 'UserController');
    
    // Bulk operations
    // Route::post('users/bulk-delete', 'UserController@bulkDestroy')->name('users.bulk-delete');
    
    // Custom API endpoints
    // Route::get('users/search', 'UserController@search')->name('users.search');
    
});