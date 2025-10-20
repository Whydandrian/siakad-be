<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication Module API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for Authentication module.
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

Route::prefix('authentication')->name('authentication.')->group(function () {
    
    // Add your API routes here
    // Example:
    // Route::apiResource('users', 'UserController');
    
    // Bulk operations
    // Route::post('users/bulk-delete', 'UserController@bulkDestroy')->name('users.bulk-delete');
    
    // Custom API endpoints
    // Route::get('users/search', 'UserController@search')->name('users.search');
    
});