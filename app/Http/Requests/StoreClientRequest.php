<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'last_name'          => 'required|string|max:100',
            'first_name'         => 'required|string|max:100',
            'middle_name'        => 'nullable|string|max:100',
            'company'            => 'nullable|string|max:255',
            'email'              => 'required|email|unique:clients,email',
            'phone'              => 'nullable|string|max:20',
            'status_id'          => 'required|integer|exists:statuses,id',
            'address'            => 'nullable|string|max:255',
            'latitude'           => 'nullable|numeric|between:-90,90',
            'longitude'          => 'nullable|numeric|between:-180,180',
            'assigned_user_id'   => 'nullable|exists:users,id',
            'tag_ids'   => ['nullable', 'array'],
            'tag_ids.*' => ['integer', 'exists:tags,id'],
        ];
    }
}
