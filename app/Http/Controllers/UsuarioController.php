<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Anuncio;
use App\User;
use \Storage;
use App\Http\Requests\UserUpdateRequest;

class UsuarioController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {
        $usuario = User::find(auth()->user()->id);
        $anuncios = collect($usuario->anuncios)->sortByDesc('created_at');
        return view('layouts.basico.index', compact('anuncios', 'usuario'));
    }
    public function configuracion()
    {
        $usuario = Auth::user(); 
        return view('layouts.basico.configuracion', compact('usuario'));
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
        return redirect(url(''))->with('success', 'Te has dado de baja con éxito');
    }
    public function misAnuncios()
    {
        $usuario = User::find(auth()->user()->id);
        $anuncios = Anuncio::orderBy('updated_at', 'desc')->where('user_id', auth()->user()->id)->paginate(5);
        //$anuncios = collect($usuario->anuncios)->sortByDesc('created_at');
        return view('layouts.basico.anuncios', compact('anuncios', 'usuario'));
    }
    public function update(UserUpdateRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $validated = $request->validated();
        $usuario->update($request->all());

        return redirect('configuracionUsuario')->with('success', 'Se han actualizado los datos');
    }
   

}
