<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInteractionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type'    => ['sometimes', 'required', Rule::in(['call', 'email', 'meeting'])],
            'content' => ['sometimes', 'nullable', 'string'],
        ];
    }
}
