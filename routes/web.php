<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\JobController::class, 'index']);

Route::get('/jobs/create', [\App\Http\Controllers\JobController::class, 'create']);

Route::post('/jobs/store', [\App\Http\Controllers\JobController::class, 'store']);


Route::get('/search', App\Http\Controllers\SearchController::class);

Route::get('/tags/{tag:name}', App\Http\Controllers\TagController::class);


Route::middleware('guest')->group(function () {
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create']);
    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store']);
    
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'create']);
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store']);
});

Route::delete('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth');