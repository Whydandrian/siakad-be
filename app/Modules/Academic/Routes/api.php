<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Academic Module API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for Academic module.
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

Route::prefix('academic')->name('academic.')->group(function () {

    // Custom API endpoints
    // Route::get('users/search', 'UserController@search')->name('users.search');
    
});