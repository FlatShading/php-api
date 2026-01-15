<?php

declare(strict_types=1);

namespace App\Domains\Journal\Infrastructure\Controllers;

use App\Domains\Journal\Application\CreateJournalEntry;
use App\Domains\Journal\Application\CreateJournalEntryData;
use App\Domains\Journal\Application\Exceptions\JournalEntryCreationFailedException;
use App\Domains\Journal\Infrastructure\Requests\CreateJournalEntryRequest;
use App\Http\Controllers\Controller;
use App\Support\ExceptionResponse;
use Exception;
use Illuminate\Http\JsonResponse;

final class JournalController extends Controller
{
    public function store(
        CreateJournalEntryRequest $request,
        CreateJournalEntry $createJournalEntry
    ): JsonResponse {
        try {
            $data = new CreateJournalEntryData(
                userId: $request->user()->id,
                title: $request->input('title'),
                content: $request->input('content'),
            );

            $entry = $createJournalEntry->execute($data);

            return response()->json([
                'id' => $entry->id,
                'title' => $entry->title,
                'content' => $entry->content,
                'created_at' => $entry->createdAt->format('c'),
            ], 201);
        } catch (JournalEntryCreationFailedException) {
            return response()->json([
                'message' => 'Journal entry creation failed.',
            ], 500);
        } catch (Exception) {
            return ExceptionResponse::serverError();
        }
    }
}
