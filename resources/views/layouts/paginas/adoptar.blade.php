@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')

MOSTRAR TODAS LAS MASCOTAS DISPONIBLES
<br>
@if( count($anuncios) > 0)

		@forEach($anuncios as $anuncio)
			<div class="well">
				<h3><a href="anuncios/{{$anuncio->id}}">{{$anuncio->nombre}}</a></h3>
				<small>{{$anuncio->descripcion}}</small>
			</div>
		@endforeach
		{{$anuncios->links()}}
@else
	NO
@endif
@endsection