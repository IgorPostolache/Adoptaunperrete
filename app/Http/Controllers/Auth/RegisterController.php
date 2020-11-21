<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'usuario';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
                        'ciudad.alpha' => 'La ciudad debe estar formado solo por letras',
                        'ciudad.max' => 'La ciudad no puede contener más de 255 caracteres',
                        'ciudad.min' => 'La ciudad debe contener como mínimo 3 caracteres',

                        'direccion.max' => 'La direccion no puede contener más de 255 caracteres',
                        'direccion.min' => 'La direccion debe contener como mínimo 3 caracteres',
                        'direccion.not_regex' => 'La direccion debe comenzar con la letra',

                        
                        'name.max' => 'El nombre no puede contener más de 255 caracteres',
                        'name.min' => 'El nombre debe contener como mínimo 3 caracteres',
                        'name.not_regex' => 'El nombre debe comenzar con la letra',

                        'password.min' => 'La contraseña debe contener como mínimo 8 caracteres',

                        'provincia.alpha' => 'La provincia debe estar formado solo por letras',
                        'provincia.max' => 'La provincia no puede contener más de 255 caracteres',
                        'provincia.min' => 'La provincia debe contener como mínimo 3 caracteres',

                        'telefono.size' => 'El teléfono debe estar formado por 9 digitos',

                        'web.max' => 'La direccion web no puede contener más de 255 caracteres', 
                        'web.url' => 'El formato no es correcto',
        ];
        return Validator::make($data, [
            'name' => ['required', 'not_regex:/^\d/','min:3', 'max:255'],
            'provincia' => ['required', 'alpha', 'min:3', 'max:255'],
            'ciudad' => ['required', 'alpha', 'min:3', 'max:255'],
            'direccion' => ['required', 'not_regex:/^\d/','min:3', 'max:255'],
            'telefono' => ['required', 'size:9'],
            'web' => ['nullable','url', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
        ], $messages);
    } 
 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'provincia' => $data['provincia'],
            'ciudad' => $data['ciudad'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'web' => $data['web'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipo' => User::BASICO_TIPO,
        ]);
    }
}
