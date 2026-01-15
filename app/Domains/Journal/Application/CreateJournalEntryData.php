<?php

declare(strict_types=1);

namespace App\Domains\Journal\Application;

final readonly class CreateJournalEntryData
{
    public function __construct(
        public int $userId,
        public string $title,
        public string $content,
    ) {}
}
