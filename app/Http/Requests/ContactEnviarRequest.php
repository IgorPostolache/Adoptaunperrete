<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactEnviarRequest extends FormRequest
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
            'asunto' => 'required',
            'control' => 'required',
            'correo' => 'bail|required|email',
            'mensaje' => 'bail|required|max:2600',
            'nombre' => 'required',
            
        ];
    } 
    public function messages()
    {
        return [
            'asunto.required'  => 'El asunto del mensaje es requerido',
            'control.required'  => 'Has de aceptar las condiciones',
            'correo.required'  => 'El correo electrónico es requerido',
            'mensaje.required' => 'El mensaje es requerido',
            'mensaje.max'  => 'El mensaje no puede contener más de 2600 caracteres',
            'nombre.required' => 'El nombre es requerido', 
        ];
    }
}
