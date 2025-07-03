<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDealRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'            => ['sometimes', 'required', 'string', 'max:255'],
            'amount'           => ['sometimes', 'required', 'numeric', 'min:0'],
            'status'           => ['sometimes', 'required', Rule::in(['won', 'lost', 'pending'])],
            'closed_at'        => ['nullable', 'date'],
            'assigned_user_id' => ['sometimes', 'required', 'exists:users,id'],
        ];
    }
}
