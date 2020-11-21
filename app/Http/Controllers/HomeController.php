<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use Cookie;
use App\Http\Requests\ContactEnviarRequest;
use Mail;
use App\Mail\ContactAdministrador;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
    public function __construct()
    {
        $this->middleware('auth');
    }

    */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactar()
    {
        return view('layouts.paginas.contactar');
    }
    public function darseDeBaja()
    {
        $usuario = Auth::user(); 
        return view('layouts.paginas.darseDeBaja', compact('usuario'));
    }

    public function aviso(){
        return view('layouts.paginas.avisoLegal');
    }
     public function enviar(ContactEnviarRequest $request)
    {
        
        Mail::to($request->input('correo'))->send(new ContactAdministrador($request));
        return redirect()->back()->with('success', 'Hemos recibido el mensaje, en breve intentaremos resolver el asunto.');
    }
    public function index()
    { 
        $anuncios = Anuncio::orderBy('updated_at', 'desc')->paginate(6);
        /*
        return $anuncios;
        $fecha_nacimiento  = $anuncios->fecha_nacimiento;
        $condicion1 = \Carbon\Carbon::parse($fecha_nacimiento)->age;
        $condicion2 = \Carbon\Carbon::now()->month - \Carbon\Carbon::parse($fecha_nacimiento)->month;
        $anio = $condicion1 == 1 ? $condicion1." año" : $condicion1." años";
        $mes =  $condicion2 == 1 ? $condicion2." mes" : $condicion2." meses";
        $edad = $anio." ".$mes;
        */
        return view('layouts.paginas.index', compact('anuncios'));
    }
    public function info()
    {
        $cookie = \Request::cookie('cookie', false);

        return view('layouts.paginas.info', compact('cookie'));
    }
    public function privacidad(){
        return view('layouts.paginas.privacidad');
    }
    public function cookieAceptar(Request $request){
        $this->validate($request, [
        'cookie' => 'required'
        ]);
        return redirect('/informarse')
        ->withCookie(cookie('cookie', $request->input('cookie'), 60 * 24 * 365));
    }

}




