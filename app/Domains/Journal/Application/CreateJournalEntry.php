<?php

declare(strict_types=1);

namespace App\Domains\Journal\Application;

use App\Domains\Journal\Application\Exceptions\JournalEntryCreationFailedException;
use App\Domains\Journal\Domain\JournalEntry;
use App\Domains\Journal\Domain\JournalRepository;
use Exception;

final readonly class CreateJournalEntry
{
    public function __construct(
        private JournalRepository $journalRepository,
    ) {
    }

    /**
     * @throws JournalEntryCreationFailedException
     */
    public function execute(CreateJournalEntryData $data): JournalEntry
    {
        try {
            return $this->journalRepository->create(
                userId: $data->userId,
                title: $data->title,
                content: $data->content,
            );
        } catch (Exception $e) {
            throw new JournalEntryCreationFailedException(
                'Failed to create journal entry.',
                previous: $e
            );
        }
    }
}
