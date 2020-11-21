@extends('layouts.app')

@section('titulo', 'Ver Mascota')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/showAnuncio.css') }}">
<div class="contenedor pl-5 pb-5 pt-5">
	<div class="row">
		<div class="col-6 info">
			<img class="img-fluid" src="/storage/img/{{$anuncio->avatar}}" alt="">
			<h4 class="text-center text-uppercase mt-3">Contacto</h4>
			<div>
				<i class="fa fa-phone" aria-hidden="true"></i>
				<a href="#">{{$anuncio->telefono}}</a>
			</div>
			<div>
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<a href="#">{{$anuncio->correo}}</a>
			</div>

		</div>
		<div class="col-6">
			<h2 class="text-center">{{$anuncio->nombre}}</h2>
			<div>Raza: {{$anuncio->raza}}</div>
			<div>Edad: {{$edad}}</div>
			<div>Sexo: {{$anuncio->sexo}}</div>
			<div>Provincia: {{$anuncio->provincia}}</div>
			<h3 class="text-center mt-3">Descripción</h3>
			<div>{{$anuncio->descripcion}}</div>
			
		</div>
		<div class="w-100 mt-3"></div>
	</div>
	<div class="row">
		<div class="col-12">
				<a href="{{ URL::previous() }}" class="text-uppercase btn btn-suprimir">Volver atrás</a> 
		</div>	
		@auth
			@if(Auth::user()->id === $anuncio->user_id || Auth::user()->tipo === 'administrador')
			<div class="col-12">
				<a href="/anuncios/{{$anuncio->id}}/edit" class="btn btn-editar mt-3">
				Editar
				<svg class="bi bi-pencil" width="0.5em" height="0.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
</svg> 
				</a>	
			</div>
			<div class="col-12 mt-3">
				{!! Form::open(['url' => 'anuncios/'.$anuncio->id, 'method' => 'delete']) !!}
					<button class="btn btn-borrar" type="submit">
					 
					Borrar
					<svg class="bi bi-trash" width="0.5em" height="0.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
</svg>
				</button>
				{!! Form::close()!!}
			</div>
			@endif
		@endauth
	</div>
</div>	
			
						
	 
@endsection