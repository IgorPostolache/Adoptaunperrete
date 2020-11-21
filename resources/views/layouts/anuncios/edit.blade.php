@extends('layouts.app')

@section('titulo', 'Editar Anuncio')
@section('contenido')
<div class="contenedor pl-5 pb-5">
	<h2>Editar el anuncio</h2>
	{{ Form::open(['url' => 'anuncios/'.$anuncio->id, 'files' => true, 'method' => 'put']) }}
			<div class="form-group">
				{{ Form::label('nombre', 'Nombre') }}
				{{ Form::text('nombre', $anuncio->nombre, ['class' => 'form-control']) }}
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
				{{ Form::date('fecha_nacimiento', $anuncio->fecha_nacimiento, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('sexo', 'Sexo')}}
				{{ Form::select('sexo', ['Macho' => 'Macho', 'Hembra' => 'Hembra'], 'Macho', ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('provincia', 'Provincia') }}
				{{ Form::text('provincia', $anuncio->provincia, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('descripcion', 'Descripción') }}
				{{ Form::textarea('descripcion', $anuncio->descripcion, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('telefono', 'Telécono de Contacto') }}
				{{ Form::number('telefono', $anuncio->telefono, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('correo', 'Correo de Contacto') }}
				{{ Form::email('correo', $anuncio->correo, ['class' => 'form-control']) }}
			</div>
			{{ Form::submit('Guardar' , ['class' => 'btn btn-editar mb-5']) }}

		{{ Form::close() }}
</div>
@endsection



