<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Anuncio;
use App\User;
use \Storage;
use App\Http\Requests\UserUpdateRequest;

class AdministradorController extends Controller
{
   	public function __construct()
    {
        $this->middleware('es_administrador');
    }
     
    public function index()
    {
    	$anuncios = Anuncio::orderBy('updated_at', 'desc')->get();
        $usuarios = User::orderBy('tipo', 'desc')->get();
    
        return view('layouts.administrador.index', compact('anuncios', 'usuarios'));
    }

    public function anunciosVer()
    {
        $anuncios = Anuncio::orderBy('updated_at', 'desc')->paginate(5);
        $usuarios = User::orderBy('tipo', 'desc')->get();
    
        return view('layouts.administrador.anuncios', compact('anuncios', 'usuarios'));
    }
    public function usuariosVer()
    {
        $anuncios = Anuncio::orderBy('updated_at', 'desc')->get();
        $usuarios = User::orderBy('tipo', 'desc')->paginate(5);
    
        return view('layouts.administrador.usuarios', compact('anuncios', 'usuarios'));
    }
    public function destroy($id)
    { 
        $usuario = User::findorFail($id);
        $anuncios = $usuario->anuncios;
        $anuncios->each(function($item, $key){
            $anuncio = Anuncio::findorFail($item->id);
            $this->authorize('delete', $anuncio);

                Storage::delete('public/img/'.$anuncio->avatar);
                $anuncio->delete(); 
            });
        User::destroy($id);
        return redirect(url('usuariosVer'))->with('success', 'Se ha borrado el usuario');
    }
    public function configuracion()
    { 

        $usuario = Auth::user(); 
        return view('layouts.administrador.configuracion', compact('usuario'));
    }
    public function edit($id)
    {
          
    }
    public function show($id)
    {
        $usuario = User::findorFail($id);
        return view('layouts.administrador.verUsuario', compact('usuario'));
    }
    public function update(UserUpdateRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $validated = $request->validated();
        $usuario->update($request->all());

        return redirect('configuracionAdmin')->with('success', 'Se han actualizado los datos');
    }
    public function validarUsuario(Request $request, $id)
    {
        
        $usuario = User::findOrFail($id);
        $usuario->email_verified_at = $request->get('email_verified_at');
        $usuario->tipo = $request->get('tipo');
        $usuario->update();
        return redirect('usuariosVer')->with('success', 'El usuario ha sido validado con éxito');
    }
}
 