<?php

declare(strict_types=1);

namespace App\Domains\Auth\Infrastructure\Controllers;

use App\Domains\Auth\Application\Exceptions\ImpersonateFailedException;
use App\Domains\Auth\Application\Impersonate;
use App\Http\Controllers\Controller;
use App\Support\ExceptionResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class ImpersonateController extends Controller
{
    public function impersonate(int $id, Impersonate $impersonate): JsonResponse
    {
        if (app()->environment('production')) {
            throw new NotFoundHttpException();
        }

        try {
            $token = $impersonate->execute($id);

            return response()->json([
                'token' => $token,
                'token_type' => 'Bearer',
            ]);
        } catch (ImpersonateFailedException) {
            return response()->json([
                'message' => 'Impersonation failed.',
            ], 403);
        } catch (Exception $e) {
            return ExceptionResponse::serverError($e);
        }
    }
}
