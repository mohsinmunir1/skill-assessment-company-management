<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'website' => 'required|string|max:512',
        ];
    }


    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required'     => 'The email field is required.',
            'website.required'  => 'The website field is required.',
        ];
    }
}
