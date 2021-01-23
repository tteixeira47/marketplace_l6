<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'         => 'required',
            'description'  => 'required|min:10',
            'phone'        => 'required|digits_between:10,11',
            'mobile_phone' => 'required|digits:11',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório.',
            'numeric' => 'O campo deve ser numérico.',
            'digits_between' => 'O campo deve ter no mínimo :min e no máximo :max dígitos (números).',
            'digits' => 'O campo deve ter :digits dígitos (números).',
            'min' => 'Campo deve ter no mínimo :min caracteres.',
    ];
        
    }
}