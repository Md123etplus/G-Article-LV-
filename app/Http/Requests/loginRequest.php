<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email'=>'required',
            'motdepasse'=>'required',
        ];
    }
    public function messages():array
    {
        return [
            'email.required'=>'L\'email est requis',
            'motdepasse.required'=>'Le mot de passe est requis',
        ];
    }
}
