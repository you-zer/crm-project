<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDealRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id'        => ['required', 'exists:clients,id'],
            'title'            => ['required', 'string', 'max:255'],
            'amount'           => ['required', 'numeric', 'min:0'],
            'status'           => ['required', Rule::in(['won', 'lost', 'pending'])],
            'closed_at'        => ['nullable', 'date'],
            'assigned_user_id' => ['required', 'exists:users,id'],
        ];
    }
}
