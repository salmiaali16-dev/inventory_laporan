<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    // Rute untuk melihat semua barang (Bebas akses tanpa token/login)
    Route::get('items', [ItemController::class, 'index']);

    Route::middleware('auth:sanctum')->group(function () {
        // Categories
        Route::apiResource('categories', CategoryController::class)
            ->except(['destroy']);
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])
            ->middleware('role:admin');

        // Items (Untuk Tambah, Detail, dan Update tetap wajib login)
        Route::apiResource('items', ItemController::class)
            ->except(['index', 'destroy']);
            
        Route::delete('items/{item}', [ItemController::class, 'destroy'])
            ->middleware('role:admin');
    });
});