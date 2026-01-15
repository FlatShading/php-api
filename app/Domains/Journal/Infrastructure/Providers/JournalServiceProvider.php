<?php

declare(strict_types=1);

namespace App\Domains\Journal\Infrastructure\Providers;

use App\Domains\Journal\Domain\JournalRepository;
use App\Domains\Journal\Infrastructure\Repositories\DBQueryBuilderJournalRepository;
use Illuminate\Support\ServiceProvider;

final class JournalServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(JournalRepository::class, DBQueryBuilderJournalRepository::class);
    }
}
