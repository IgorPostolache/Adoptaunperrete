@extends('layouts.app')
@section('titulo', 'Inicio')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script type="text/javascript" src="{!! asset('js/index.js') !!}" async></script>
<img class="img-fluid" src="/storage/img/header.jpg" alt="">
<div class="row d-flex justify-content-center align-items-center pt-2 pb-5">

	<div class="col-auto mb-2">
		<h1>Encuentra tu mascota</h1> 
	</div>
	<div class="w-100"></div>
	<div class="col-aut mt-3">
		{{Form::open(['route' => 'anuncios', 'method' => 'POST'])}}
			{{ Form::label('provincia', 'Provincia') }}
			<!--
			{{ Form::text('provincia', request()->get('provincia')) }}
		
			
			{{ Form::select('provincia', [''=>'','Alava' => 'Alava', 'Albacete' => 'Albacete','Alicante' => 'Alicante', 'Asturias' => 'Asturias']) }}
			-->
			<select class="dynamico" name="provincia" id="provincia" data-dependent="raza">
				<option value="">Elegir Provincia</option>
				@foreach($provincia_lista as $provincia)
			
				<option value="{{ $provincia->provincia }}">{{ $provincia->provincia }}</option>
			
				@endforeach
			</select>
			{{ Form::label('raza', 'Raza') }}
			<!--
			{{ Form::text('raza', request()->get('raza')) }}
			
			{{ Form::select('raza', ['Mestizo' => 'Mestizo']) }}
			-->
			<select class="dynamico" name="raza" id="raza" data-dependent="sexo">
				<option value="">Elegir Raza</option>
			</select>
			{{ Form::label('sexo', 'Sexo')}}
			<!--
			{{ Form::text('sexo', request()->get('sexo')) }}
			
			{{ Form::select('sexo', ['Macho' => 'Macho', 'Hembra' => 'Hembra']) }}
			-->
			<select class="" name="sexo" id="sexo">
				<option value="">Elegir Sexo</option>
			</select>
			{{ csrf_field() }}
			<button type="submit" class="btn btn-borrar ml-2 mb-2">
          		<svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  					<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
  					<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
				</svg> Buscar
        	</button>
		{{Form::close()}}
	</div>
	 
</div>
@if( count($anuncios) > 0)
		<br>
			<div class="row justify-content-center mb-5 pl-3" id="anuncios">
			@forEach( $anuncios as $anuncio)
			
				<div class="col-6 col-md-2 mt-5 mb-5">
					<div class="card">
				    <img class="card-img-top img-fluid" src="/storage/img/{{$anuncio->avatar}}" alt="Card image">
				    <div class="card-body">
				      <h4 class="card-title text-center">{{$anuncio->nombre}}</h4>
				      <div>Provincia: {{$anuncio->provincia}}</div>
				      <div>Raza: {{$anuncio->raza}}</div>
				      <div>Sexo: {{$anuncio->sexo}}</div>
				      <a href="anuncios/{{$anuncio->id}}" class="btn btn-dark text-uppercase mt-2">Ver más</a>
				    </div>
				  </div>
				</div>
			 
			@endforeach
			<div class="w-100"></div>
			<div class="col-auto paginate"> 
				{{$anuncios->links()}}
			</div>
			
			</div>

		<br>
@else

@endif

@endsection

