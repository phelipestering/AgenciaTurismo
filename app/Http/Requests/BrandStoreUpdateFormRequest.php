<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Http\Request;

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

        $id = Request::segment(3);

        return [
            'name' => "required|min:3|max:100|unique:brands,name,{$id},id"
        ];
    }
}
