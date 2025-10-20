<?php

use App\Http\Controllers\AI\PromptController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // if (Auth::check()) {
    //     return redirect()->route('dashboard.dashboard');
    // } else {
    //     return redirect()->route('login');
    // }
    return redirect('api/documentation');
});

// Route untuk ganti bahasa
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');