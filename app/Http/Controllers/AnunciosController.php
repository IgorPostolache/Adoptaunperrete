<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\User;
use \Storage;
use DateTime;
use DB;
use Cookie;
use Auth;
use App\Http\Requests\AnuncioStoreRequest;
use App\Http\Requests\AnuncioUpdateRequest;
 
class AnunciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'fetch', 'show', 'test']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provincia = $request->get('provincia');
        $raza = $request->get('raza');
        $sexo = $request->get('sexo');

        $anuncios = Anuncio::orderBy('updated_at', 'desc')
            ->provincia($provincia)
            ->raza($raza)
            ->sexo($sexo)
            ->paginate(4);
        
        
        $provincia = collect(DB::table('anuncios')->orderBy('provincia')->get());
        $provincias = $provincia->unique('provincia');
        $provincia_lista = $provincias->values()->all();

        $cookie = \Request::cookie('cookie', 'NO');

        
        
        
        return view('layouts.paginas.index', compact('anuncios', 'provincia_lista', 'cookie'));
    }
   public function fetch(Request $request){

        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('anuncios')->where($select, $value)->OrderBy($dependent)->get();
        
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        $codicion = true;
        foreach ($data as $row) {
            if($codicion)
            {
                $filaAnterior = $row->$dependent;
                $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
                $codicion = false;
            }
            if($filaAnterior != $row->$dependent)
            {
                $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
                $filaAnterior = $row->$dependent;
            }

        }
        echo $output;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $usuario = Auth::user();
        $this->authorize('create', Anuncio::class);
        return view('layouts.anuncios.create', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnuncioStoreRequest $request)
    {
        $validated = $request->validated();
        if($request->hasFile('avatar'))
        {
             
            $nombreFoto = time().$request->file('avatar')->getClientOriginalName();
            $ruta = $request->file('avatar')->storeAs('public/img', $nombreFoto);
            
            $anuncio = new Anuncio();
            $anuncio->nombre = $request->input('nombre');
            $anuncio->avatar = $nombreFoto;
            $anuncio->raza = $request->input('raza');
            $anuncio->fecha_nacimiento = $request->input('fecha_nacimiento');
            $anuncio->sexo = $request->input('sexo');
            $anuncio->provincia = $request->input('provincia');
            $anuncio->descripcion = $request->input('descripcion');
            $anuncio->telefono = $request->input('telefono');
            $anuncio->correo = $request->input('correo');
            $anuncio->user_id = auth()->user()->id;
            $anuncio->save();

            return redirect(url('misAnuncios'))->with('success', 'Anuncio publicado');
        }
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $anuncio = Anuncio::findorFail($id);
        $fecha_nacimiento  = $anuncio->fecha_nacimiento;
        $condicion1 = \Carbon\Carbon::parse($fecha_nacimiento)->age;
        $condicion2 =  \Carbon\Carbon::parse()->diffInMonths($fecha_nacimiento);
        if($condicion2 > 11)
            $condicion2 -= $condicion1 * 12;
        $anio = $condicion1 == 1 ? $condicion1." año" : $condicion1." años";
        $mes =  $condicion2 == 1 ? $condicion2." mes" : $condicion2." meses";
        $edad = $anio." ".$mes;
    
        return view('layouts.anuncios.show', compact('anuncio', 'edad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anuncio = Anuncio::findorFail($id);
        $this->authorize('edit', $anuncio);

        if($anuncio->user_id === auth()->user()->id || auth()->user()->tipo === 'administrador')
            return view('layouts.anuncios.edit', compact('anuncio'));
        else
            return redirect('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnuncioUpdateRequest $request, $id)
    {
        $anuncio = Anuncio::whereId($id)->first();
        $this->authorize('update', $anuncio);

        if($request->hasFile('avatar'))
        {
            Storage::delete('public/img/'.$anuncio->avatar);
            $nombreFoto = time().$request->file('avatar')->getClientOriginalName();
            $ruta = $request->file('avatar')->storeAs('public/img', $nombreFoto);

            $anuncio->avatar = $nombreFoto;
            $anuncio->save();
            $anuncio->update($request->except('avatar', '_method', '_token'));
        }
        else
            $anuncio->update($request->except('avatar', '_method', '_token'));

        return redirect(url('misAnuncios'))->with('success', 'Se ha actualizado el anuncio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anuncio = Anuncio::findorFail($id);
        $this->authorize('delete', $anuncio);

        if($anuncio->user_id === auth()->user()->id || auth()->user()->tipo === 'administrador')
        {
            Storage::delete('public/img/'.$anuncio->avatar);
            $anuncio->delete();
            return redirect(url('misAnuncios'))->with('success', 'Se ha borrado el anuncio'); 
        }
        else
            return redirect('');
    }

    
}
 