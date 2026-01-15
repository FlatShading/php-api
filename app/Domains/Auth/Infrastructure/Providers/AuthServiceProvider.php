<?php

declare(strict_types=1);

namespace App\Domains\Auth\Infrastructure\Providers;

use App\Domains\Auth\Domain\AuthRepository;
use App\Domains\Auth\Infrastructure\Repositories\EloquentAuthRepository;
use Illuminate\Support\ServiceProvider;

final class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthRepository::class, EloquentAuthRepository::class);
    }
}
