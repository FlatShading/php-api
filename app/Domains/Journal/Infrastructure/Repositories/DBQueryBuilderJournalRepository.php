<?php

declare(strict_types=1);

namespace App\Domains\Journal\Infrastructure\Repositories;

use App\Domains\Journal\Domain\JournalEntry;
use App\Domains\Journal\Domain\JournalRepository;
use DateTimeImmutable;
use Illuminate\Support\Facades\DB;

final class DBQueryBuilderJournalRepository implements JournalRepository
{
    public function create(
        int $userId,
        string $title,
        string $content,
    ): JournalEntry {
        $now = now();

        $id = DB::table('journal_entries')->insertGetId([
            'user_id' => $userId,
            'title' => $title,
            'content' => $content,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return new JournalEntry(
            id: $id,
            userId: $userId,
            title: $title,
            content: $content,
            createdAt: DateTimeImmutable::createFromMutable($now->toDateTime()),
            updatedAt: DateTimeImmutable::createFromMutable($now->toDateTime()),
        );
    }
}
