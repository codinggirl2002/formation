<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class donationFormRequest extends FormRequest
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
            'description'   => ['required', 'string', 'min:10'],
            'quantite'      => ['required', 'numeric', 'min:1'],
            'localisation'  => ['required', 'string', 'min:1'],
            'type_aliment'  => ['required', 'string', 'min:1'],
            'date_limite'   => ['required', 'date'],
            'image' => ['required','image', 'max:2000']
        ];
    }
}
