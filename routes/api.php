<?php

use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// works
Route::get('/test', function (Request $request) {
    return ['test' => 'testing'];
});

// doesn't work
Route::middleware('guest')->group(function () {
    Route::post('/register', [RegisterController::class, 'register'])
        ->name('api_register');
});
