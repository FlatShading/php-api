<?php

declare(strict_types=1);

namespace App\Domains\Journal\Application;

use App\Domains\Journal\Domain\JournalRepository;

final readonly class CreateJournalEntry
{
    public function __construct(
        private JournalRepository $journalRepository,
    ) {
    }

    public function execute(string $content, int $userId): void
    {
        $this->journalRepository->create(
            userId: $userId,
            content: $content,
        );
    }
}
