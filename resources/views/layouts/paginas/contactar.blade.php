@extends('layouts.app')
@section('titulo', 'Protectoras')
@section('contenido')
<link rel="stylesheet" href="{{ asset('css/contactar.css') }}">
<div class="row pt-4 pl-5 pb-5 mb-5 formulario">
	<div class="col col-md-6">
		<h3>¿Tienes alguna duda?</h3>
		{{ Form::open(['route' => 'contactar']) }}
			{{ csrf_field() }}
			{{ Form::label('nombre', 'Nombre') }}
			<br>
			{{ Form::text('nombre', '', ['placeholder' => 'Tu nombre...']) }}
			<br>
			{{ Form::label('correo', 'Correo') }}
			<br>
			{{ Form::email('correo', '', ['placeholder' => 'Tu correo...']) }}
			<br>
			{{ Form::label('asunto', 'Asunto') }}
			<br>
			{{ Form::text('asunto', '', ['placeholder' => 'El asunto del correo...']) }}
			<br>
			{{ Form::label('mensaje', 'Mensaje') }}
			<br> 
			{{ Form::textarea('mensaje', '', ['placeholder' => 'El mensaje...']) }}
			<br>
			<br>
			{{ Form::checkbox('control') }} He leido el <a href="{{ route('aviso') }}" target="_blank"><u><strong>aviso legal</strong></u></a> y acepto las condiciones
			<br>
			{{ Form::submit('Enviar' , ['class' => 'btn btn-enviar']) }}
		{{ Form::close() }}
	</div>
</div>

@endsection
