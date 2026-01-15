<?php

declare(strict_types=1);

namespace App\Domains\Journal\Domain;

final readonly class JournalEntry
{
    public function __construct(
        public string $id,
        public int $userId,
        public string $title,
        public string $content,
    ) {}
}
