<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'brand' => ['required', 'min:3'],
            'model' => ['required'],
            'board' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'required' => "Preencha todos os campos",
            'brand.min' => "A marca deve conter no mínimo :min caracateres",            
        ];
    }
}
