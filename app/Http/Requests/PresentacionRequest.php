<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresentacionRequest extends FormRequest
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
            'marca_id' => 'required',
            'producto_id' => 'required',
            'formato_id' => 'required',
            'precio' => 'gt:0'
        ];
    }
}
