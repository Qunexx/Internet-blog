<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'birthday' => 'nullable|date',
            'quote' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'vk' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
        ];
    }
}
