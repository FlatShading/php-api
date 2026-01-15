<?php

declare(strict_types=1);

namespace App\Domains\Journal\Infrastructure\Controllers;

use App\Domains\Journal\Application\CreateJournalEntry;
use App\Domains\Journal\Infrastructure\Requests\CreateJournalEntryRequest;
use App\Http\Controllers\Controller;
use App\Support\ExceptionResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final class JournalController extends Controller
{
    public function store(
        CreateJournalEntryRequest $request,
        CreateJournalEntry $createJournalEntry
    ): Response|JsonResponse {
        try {
            $createJournalEntry->execute(
                $request->input('content'),
                $request->user()->id
            );

            return response()->noContent(201);
        } catch (Exception) {
            return ExceptionResponse::serverError();
        }
    }
}
