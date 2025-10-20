<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Reference Module Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for Reference module.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
|
| PERHATIAN!!
| Route yang telah ditambahkan, untuk memanggil dari route lain caranya:
| {namaModule}.{routeName}. Contoh : authentication.login
|
*/

Route::prefix('reference')->name('reference.')->group(function () {
    
    // Dashboard route
    Route::get('/', function () {
        return view('');
    })->name('dashboard');

    
});