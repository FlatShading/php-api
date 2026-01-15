<?php

use App\Domains\Auth\Infrastructure\Controllers\AuthController;
use App\Domains\Auth\Infrastructure\Controllers\ImpersonateController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get(
        '/impersonate/{id}',
        [ImpersonateController::class, 'impersonate']
    );
});

Route::get('/health', function () {
    return response()->json([
        'status' => 'OK',
        'message' => 'API is running',
        'datetime' => now()->toISOString(),
    ]);
});
