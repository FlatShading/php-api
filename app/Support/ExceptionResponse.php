<?php

namespace App\Support;

use Illuminate\Http\JsonResponse;
use Throwable;

final readonly class ExceptionResponse
{
    public static function serverError(?Throwable $exception = null): JsonResponse
    {
        $response = ['error' => 'An unexpected error occurred.'];

        if ($exception && config('app.debug')) {
            $response['debug'] = [
                'message' => $exception->getMessage(),
                'exception' => get_class($exception),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTrace(),
            ];
        }

        return response()->json($response, 500);
    }
}
