<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $statusId = $this->route('status')->id;

        return [
            'name'        => "sometimes|required|string|max:50|unique:statuses,name,{$statusId}",
            'description' => 'sometimes|nullable|string',
        ];
    }
}
