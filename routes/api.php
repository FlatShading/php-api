<?php

use App\Domains\Auth\Infrastructure\Controllers\AuthController;
use App\Domains\Auth\Infrastructure\Controllers\ImpersonateController;
use App\Domains\Journal\Infrastructure\Controllers\JournalController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get(
        '/impersonate/{id}',
        [ImpersonateController::class, 'impersonate']
    );
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('journal')->group(function () {
        Route::post('/store', [JournalController::class, 'store']);
    });
});

Route::get('/health', function () {
    return response()->json([
        'status' => 'OK',
        'message' => 'API is running',
        'datetime' => now()->toISOString(),
    ]);
});
