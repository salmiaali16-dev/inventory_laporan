<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::prefix('v1')->middleware(['throttle:60,1'])->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::get('items', [ItemController::class, 'index']);
    
    // Rute POST items bersih tanpa dd() langsung mengarah ke Controller
    Route::post('items', [ItemController::class, 'store']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('categories', CategoryController::class)->except(['destroy']);
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->middleware('role:admin');
        Route::delete('items/{item}', [ItemController::class, 'destroy'])->middleware('role:admin');
    });
});