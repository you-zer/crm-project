<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'               => ['sometimes', 'required', 'string', 'max:255'],
            'description'         => ['sometimes', 'nullable', 'string'],
            'status'              => ['sometimes', 'required', Rule::in(['new', 'in_progress', 'completed'])],
            'assigned_user_id'    => ['sometimes', 'required', 'exists:users,id'],
            'due_date'            => ['sometimes', 'required', 'date'],
            'recurrence_type'     => ['sometimes', 'required', Rule::in(['none', 'daily', 'weekly', 'monthly'])],
            'recurrence_interval' => ['sometimes', 'required', 'integer', 'min:1'],
            'recurrence_until'    => ['nullable', 'date', 'after_or_equal:due_date'],
        ];
    }
}
