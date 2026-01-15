<?php

declare(strict_types=1);

namespace App\Domains\Auth\Infrastructure\Controllers;

use App\Domains\Auth\Application\Authenticate;
use App\Domains\Auth\Application\Exceptions\LoginFailedException;
use App\Domains\Auth\Application\LoginCredentials;
use App\Domains\Auth\Infrastructure\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Support\ExceptionResponse;
use Exception;
use Illuminate\Http\JsonResponse;

final class AuthController extends Controller
{
    public function login(
        LoginRequest $request,
        Authenticate $authenticate
    ): JsonResponse
    {
        try {
            $credentials = new LoginCredentials(
                email: $request->email,
                password: $request->password,
            );

            $token = $authenticate->execute($credentials);

            return response()->json([
                'token' => $token,
                'token_type' => 'Bearer',
            ]);
        } catch (LoginFailedException) {
            return response()->json([
                'message' => 'Authentication failed.',
            ], 403);
        } catch (Exception) {
            return ExceptionResponse::serverError();
        }
    }
}
