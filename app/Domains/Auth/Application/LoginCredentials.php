<?php

declare(strict_types=1);

namespace App\Domains\Auth\Application;

final readonly class LoginCredentials
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
