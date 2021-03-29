<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            "email" => ['required', 'email'],
            "password" => ['required'],            
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
            'required' => 'Preencha todos os campos',
            'email.email' => 'O formato de email não é válido',            
        ];
    }
}
