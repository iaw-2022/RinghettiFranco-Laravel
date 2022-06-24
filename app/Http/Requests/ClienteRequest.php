<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class ClienteRequest extends FormRequest
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
            'nombre' => 'required',
            'apellido'=> 'required',
            'doctipo' => 'required',
            'docnro' => 'required|numeric',
            'correo' => new RequiredIf($this->telefono == null),'email',
            'telefono' => new RequiredIf($this->correo == null),
            'IVA' => 'required',
            'CUIT' => new RequiredIf($this->IVA != 'Consumidor final'),'numeric'
        ];
    }
}
