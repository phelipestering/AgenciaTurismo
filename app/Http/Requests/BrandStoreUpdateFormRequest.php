<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreUpdateFormRequest extends FormRequest
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
     *
     * validacao de formularios , abaixo vamos colocar os requisitos para preenchimento
     * de formularios
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100|unique:brands',
        ];
    }
}
