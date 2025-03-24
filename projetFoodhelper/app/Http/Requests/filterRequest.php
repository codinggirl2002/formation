<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class filterRequest extends FormRequest
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
            'min_quantity'      => ['nullable', 'numeric', 'min:1'],
            'localisation'  => ['nullable', 'string', 'min:1'],
            'type_aliment'  => ['nullable', 'string', 'min:1'],
        ];
    }
}
