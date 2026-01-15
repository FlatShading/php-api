<?php

declare(strict_types=1);

namespace App\Domains\Auth\Application;

use App\Domains\Auth\Application\Exceptions\ImpersonateFailedException;
use App\Domains\Auth\Domain\AuthRepository;

final readonly class Impersonate
{
    public function __construct(
        private AuthRepository $authRepository,
    ) {
    }

    /**
     * @throws ImpersonateFailedException
     */
    public function execute(int $id): string
    {
        $user = $this->authRepository->findUserById($id);

        if (!$user) {
            throw new ImpersonateFailedException();
        }

        return $user->createToken('api-token')->plainTextToken;
    }
}
