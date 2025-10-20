<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Academic Module Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for Academic module.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
|
| PERHATIAN!!
| Route yang telah ditambahkan, untuk memanggil dari route lain caranya:
| {namaModule}.{routeName}. Contoh : authentication.login
|
*/
Route::middleware('auth')->group(function () {


    Route::prefix('academic')->name('academic.')->group(function () {
        
        // Dashboard route
        Route::get('/', function () {
            return '';
        })->name('name');

        
    });



});