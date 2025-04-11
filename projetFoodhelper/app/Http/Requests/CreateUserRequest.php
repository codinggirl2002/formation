<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'name'  => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')
                //Rule::unique('users')->ignore($this->route()->parameter('user')),
            ], 
            'password'              => 'required|string|min:8|confirmed', //regex:/^(?=.*[a-z])+(?=.*[@$!%*])(?=.\d)+$/|
            'phone'                 => 'nullable|string|max:20',
            'address'               => 'nullable|string|max:255',
            'role'                  => 'required|in:donor,beneficiary',
        ];
    }
}
