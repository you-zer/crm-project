<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id'           => ['required', 'exists:clients,id'],
            'title'               => ['required', 'string', 'max:255'],
            'description'         => ['nullable', 'string'],
            'status'              => ['required', Rule::in(['new', 'in_progress', 'completed'])],
            'assigned_user_id'    => ['required', 'exists:users,id'],
            'due_date'            => ['required', 'date'],
            'recurrence_type'     => ['required', Rule::in(['none', 'daily', 'weekly', 'monthly'])],
            'recurrence_interval' => ['required', 'integer', 'min:1'],
            'recurrence_until'    => ['nullable', 'date', 'after_or_equal:due_date'],
        ];
    }
}
