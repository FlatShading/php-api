<?php

declare(strict_types=1);

namespace App\Domains\Journal\Domain;

interface JournalRepository
{
    public function create(
        int $userId,
        string $title,
        string $content,
    ): JournalEntry;
}
