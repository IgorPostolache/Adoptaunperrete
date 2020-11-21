<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnuncioStoreRequest extends FormRequest
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
            
            'avatar' => 'bail|required|image|max:1999',
            'correo' => 'bail|required|email',
            'descripcion' => 'bail|required|max:2600',
            'fecha_nacimiento' => 'required',
            'nombre' => 'bail|required|min:3',
            'provincia' => 'bail|required|alpha|max:255',
            'raza' => 'bail|required|alpha|max:255',
            'sexo' => 'required',
            'telefono' => 'bail|required|size:9',
            
        ];
    }
    public function messages()
    {
        return [
            'avatar.required'  => 'La foto es requerida',
            'avatar.max' => 'La foto no puede pesar mas de 2 MB',
            'avatar.image' => 'Debe ser una foto',
            'correo.required'  => 'El correo electrónico es requerido',
            'descripcion.required'  => 'La descripcion es requerida',
            'descripcion.max'  => 'La descripcion no puede contener más de 2600 caracteres',
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe contener como mínimo 3 caracteres',
            'provincia.required'  => 'La provincia es requerida',
            'provincia.alpha'  => 'La provincia tiene que estar compuesta sólo de letras',
            'provincia.max'  => 'La provincia no puede tener más de 255 caracteres',
            'raza.required' => 'La raza es requerida',
            'raza.max' => 'La raza no puede tener más de 255 caracteres',
            'raza.alpha'  => 'La raza tiene que estar compuesta sólo de letras',
            'telefono.required'  => 'El telefono es requerido',
            'telefono.size'  => 'El telefono tiene que tener 9 digitos',   
        ];
    }
}
 