<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    * @return array
    */
    public function rules()
    {
        return [        
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email', 'unique:users'],
            "password" => ['required'],
            "password_confirmation" => ['required']
        ];
    }
    
    /**
    * get messages validation
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.min' => "O nome precisa ter no mínimo :min caracteres",
            'required' => 'Preencha todos os campos',
            'email.email' => 'O formato de email não é válido',
            'email.unique' => 'O email informado já está cadastrado'
        ];
    }
}
