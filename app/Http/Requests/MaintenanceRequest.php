<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'vehicle' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'required' => "Preencha todos os campos",
            'date.date' => "Formato de data inválido",            
        ];
    }
}
