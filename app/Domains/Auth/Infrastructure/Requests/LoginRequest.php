<?php

declare(strict_types=1);

namespace App\Domains\Auth\Infrastructure\Requests;

use App\Support\Requests\BaseRequest;

final class LoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }
}
