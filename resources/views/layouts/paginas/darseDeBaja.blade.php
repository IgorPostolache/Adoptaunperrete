@extends('layouts.app')
@section('titulo', 'Darse de Baja')

@section('contenido')

<div class="row justify-content-center text-uppercase mt-5 pb-3 suprimir">
	<div class="col-auto">
		<h3>estas apunto de darte de baja</h3>
	</div>
	<div class="w-100"></div>
	<div class="col-auto">
		<h4>toda la información se borrara de forma irecuperable incluso tus anuncios</h4>
	</div>
	<div class="w-100"></div>
	<div class="col-auto">
		<h1>¿estas seguro?</h1>
	</div>
	<div class="w-100"></div>
	<div class="col-auto">
	{!! Form::open(['url' => 'usuario/'.$usuario->id, 'method' => 'delete']) !!}
                      <button class="btn btn-borrar text-uppercase" type="submit">
                        si darme de baja
                      </button>
    {!! Form::close() !!}
	</div>
	<div class="w-100"></div>
	<div class="col-auto">
		<a href="{{ URL::previous() }}" class="text-uppercase btn btn-resetear mt-3">No Volver atrás</a>
	</div>
	   
</div>
@endsection