@extends('layouts.app')

@section('titulo', 'Publicar Anuncio')
 
@section('contenido')
<div class="contenedor pl-5 pb-5">
	<h2>Publicar una mascota</h2>
	{{ Form::open(['url' => 'anuncios/store', 'files' => true]) }}

			<div class="form-group">
				{{ Form::label('nombre', 'Nombre') }}
				{{ Form::text('nombre', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('avatar', 'Foto') }} 
				{{ Form::file('avatar', null, ['class' => 'form-control-file']) }}

			</div>
			<div class="form-group">
				{{ Form::label('raza', 'Raza') }}
				{{ Form::text('raza', 'Mestizo', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('fecha_nacimiento', 'Fecha de nacimiento') }}
				{{ Form::date('fecha_nacimiento', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('sexo', 'Sexo')}}
				{{ Form::select('sexo', ['Macho' => 'Macho', 'Hembra' => 'Hembra'], 'Macho', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('provincia', 'Provincia') }}
				{{ Form::text('provincia', $usuario->provincia, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('descripcion', 'Descripción') }}
				{{ Form::textarea('descripcion', '', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('telefono', 'Telécono de Contacto') }}
				{{ Form::number('telefono', $usuario->telefono, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('correo', 'Correo de Contacto') }}
				{{ Form::email('correo', $usuario->email, ['class' => 'form-control']) }}
			</div>
			{{ Form::submit('Publicar' , ['class' => 'btn btn-editar mb-5']) }}

		{{ Form::close() }}
</div>
@endsection



