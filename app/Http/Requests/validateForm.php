<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateForm extends FormRequest
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
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|unique:users',
            'motdepasse'=>'required',
            
        ];
    }
    public function messages():array
    {
        return [
            'nom.required'=> 'Le nom est requis',
            'prenom.required'=>'Le prenom est requis',
            'email.required'=>'L\'email est requis',
            'email.unique'=>'L\'adresse mail que vous avez entre est deja pris.',
            'motdepasse.required'=>'Le mot de passe est requis',
            
        ];
    }
}
