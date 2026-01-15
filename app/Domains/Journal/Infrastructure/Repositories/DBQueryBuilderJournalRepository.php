<?php

declare(strict_types=1);

namespace App\Domains\Journal\Infrastructure\Repositories;

use App\Domains\Journal\Domain\JournalRepository;
use Illuminate\Support\Facades\DB;

final class DBQueryBuilderJournalRepository implements JournalRepository
{
    public function create(
        string $content,
        int $userId
    ): void {
        $now = now();

        DB::table('journal_entries')->insert([
            'user_id' => $userId,
            'title' => $now->format('Y-m-d'),
            'content' => $content,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
