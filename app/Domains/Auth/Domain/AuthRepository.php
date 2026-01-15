<?php

declare(strict_types=1);

namespace App\Domains\Auth\Domain;

use App\Models\User;

interface AuthRepository
{
    public function findUserByEmail(string $email): ?User;
}
