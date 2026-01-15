<?php

namespace App\Support;

use Illuminate\Http\JsonResponse;

final readonly class ExceptionResponse
{
    public static function serverError(): JsonResponse
    {
        return response()->json([
            'error' => 'An unexpected error occurred.'
        ], 500);
    }
}
