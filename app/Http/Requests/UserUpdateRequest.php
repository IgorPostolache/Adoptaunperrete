<?php

namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use Auth;
class UserUpdateRequest extends FormRequest
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
            'ciudad' => 'bail|required|alpha|min:3|max:255', 
            'direccion' => 'bail|required|min:3|max:255|not_regex:/^\d/', 
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'name' => 'bail|required|not_regex:/^\d/|min:3|max:255',
            'provincia' => 'bail|required|alpha|min:3', 
            'telefono' => 'bail|required|size:9',
            'web' => 'bail|nullable|url|max:255',    
        ];
    }
    public function messages()
    {
        return [
            'ciudad.alpha'  => 'La ciudad debe estar compuesto por letras',
            'ciudad.max' => 'La ciudad no puede contener más de 255 caracteres',
            'ciudad.min'  => 'La ciudad debe tener como mínimo 3 catacteres',
            'ciudad.required'  => 'La ciudad es requerida', 

            
            'direccion.max' => 'La direccion no puede contener más de 255 caracteres',
            'direccion.min'  => 'La direccion debe tener como mínimo 3 catacteres',
            'direccion.not_regex' => 'La direccion debe comenzar con la letra',
            'direccion.required'  => 'La direccion es requerida', 

            'email.required'  => 'El correo es requerido',   
            'email.unique'  => 'Este correo ya existe', 

            'name.max' => 'El nombre no puede contener más de 255 caracteres',
            'name.min'  => 'El nombre debe tener como mínimo 3 catacteres',
            'name.not_regex'  => 'El nombre debe comenzar con la letra',
            'name.required'  => 'El nombre es requerido',  

            'provincia.alpha'  => 'La provincia debe estar compuesto por letras',
            'provincia.min'  => 'La provincia debe tener como mínimo 3 catacteres',
            'provincia.required'  => 'La provincia es requerida',  

            'telefono.size'  => 'El teléfono debe estar formado de 9 digitos', 

            'web.max' => 'La direccion web no puede contener más de 255 caracteres', 
            'web.url' => 'El formato no es correcto',  
        ];
    }
}
