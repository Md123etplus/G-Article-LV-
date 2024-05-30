<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class articleForm extends FormRequest
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
            'titre'=>'required|min:3',
            'description'=>'required|min:5'
        ];
    }
    public function messages():array
    {
        return [
            'titre.required'=>'Le titre est requis',
            'titre.min'=>'Caractere minimum est 3',
            'description.required'=>'La description est requise',
            'description.min'=>'Caractere minimum est 3'
        ];
    }
}
