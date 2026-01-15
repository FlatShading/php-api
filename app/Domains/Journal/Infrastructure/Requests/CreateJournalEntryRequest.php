<?php

declare(strict_types=1);

namespace App\Domains\Journal\Infrastructure\Requests;

use App\Support\Requests\BaseRequest;

final class CreateJournalEntryRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ];
    }
}
