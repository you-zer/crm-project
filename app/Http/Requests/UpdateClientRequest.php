<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $clientId = $this->route('client')->id;

        return [
            'last_name'          => 'sometimes|required|string|max:100',
            'first_name'         => 'sometimes|required|string|max:100',
            'middle_name'        => 'sometimes|nullable|string|max:100',
            'company'            => 'sometimes|nullable|string|max:255',
            'email'              => "sometimes|required|email|unique:clients,email,{$clientId}",
            'phone'              => 'sometimes|nullable|string|max:20',
            'status_id'          => 'sometimes|required|integer|exists:statuses,id',
            'address'            => 'sometimes|nullable|string|max:255',
            'latitude'           => 'sometimes|nullable|numeric|between:-90,90',
            'longitude'          => 'sometimes|nullable|numeric|between:-180,180',
            'assigned_user_id'   => 'sometimes|nullable|exists:users,id',
        ];
    }
}
