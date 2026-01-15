<?php

declare(strict_types=1);

namespace App\Domains\Journal\Domain;

use DateTimeImmutable;

final readonly class JournalEntry
{
    public function __construct(
        public int $id,
        public int $userId,
        public string $title,
        public string $content,
        public DateTimeImmutable $createdAt,
        public DateTimeImmutable $updatedAt,
    ) {}
}
