<?php

declare(strict_types=1);

namespace App\Domains\Auth\Application;

use App\Domains\Auth\Application\Exceptions\LoginFailedException;
use App\Domains\Auth\Domain\AuthRepository;
use Illuminate\Support\Facades\Hash;

final readonly class Authenticate
{
    public function __construct(
        private AuthRepository $authRepository,
    ) {
    }
    /**
     * @throws LoginFailedException
     */
    public function execute(LoginCredentials $credentials): string
    {
        $user = $this->authRepository->findUserByEmail($credentials->email);

        if (!$user || !Hash::check($credentials->password, $user->password)) {
            throw new LoginFailedException();
        }

        return $user->createToken('api-token')->plainTextToken;
    }
}
