<?php

use App\Modules\Authentication\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication Module Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for Authentication module.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::middleware('guest.only')->group(function () {

        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/authentication/login',[AuthController::class,'login'])->name('authentication.process');

});

Route::middleware('auth')->group(function () {
    
    Route::prefix('authentication')->group(function () {
        Route::post('/logout',[AuthController::class,'logout'])->name('authentication.logout');
    });

});
