@extends('layouts.appAdmin')
@section('titulo', 'Panel Administrador')

@section('contenido-seccion') 
<link rel="stylesheet" href="{{ asset('css/verUsuariosAdmin.css') }}">
<p>*** Para ver un usuario pulsa sobre su nombre <i class="fa fa-eye" aria-hidden="true"></i></p>
<h2>Usuarios</h2>
<div class="table-responsive mb-5">
	<table class="table table-bordered table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Email</th>
				<th>Tipo</th>
				<!--
				<th>Fecha de Registro</th>
				<th>Fecha de Actualización</th>
				-->
				<!-- <th>Editar</th> -->
				<th>Validar</th>
				<th>Borrar</th>
			</tr>
		</thead>
		<tbody>
			@forEach($usuarios as $usuario)
				<tr>  
					<td>
						<a href="administrador/{{$usuario->id}}" id="verNombreUsuario">
							{{$usuario->name}}
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
					</td>
					<td>{{$usuario->email}}</td>
					<td>{{$usuario->tipo}}</td>
					<!--
					<td>{{$usuario->created_at}}</td>
					<td>{{$usuario->updated_at}}</td>
					-->
					<!-- NO ME GUSTA, HABRÁ QUE TENER FECHA DE ULTIMA Y PENULTIMA ACTUALIZACIÓN...
					@if (strtotime($usuario->updated_at)- strtotime($usuario->created_at) == 0)
						<td>{{$usuario->updated_at}}</td>
					@else
						<td style="background: red;">{{$usuario->updated_at}}</td>
					@endif
					-->
					<!--<td>
						<a href="/administrador/{{$usuario->id}}/edit" class="btn btn-editar">
						Editar
						<svg class="bi bi-pencil" width="0.5em" height="0.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
</svg>
						</a>
					</td>
				-->
					<td>
					@if($usuario->tipo === "registrado")  
						{{Form::open(['url' => 'validarUsuario/'.$usuario->id, 'method'=> 'put']) }}
							
							{{ Form::hidden('email_verified_at', Carbon\Carbon::now()) }}
							{{ Form::hidden('tipo', 'basico') }}
							<button class="btn btn-editar" type="submit">
								Validar
								 
							</button>
						{!! Form::close()!!}
					@else
						<i class="fas fa-check-square"></i> 
					@endif
					</td>
					<td>
					@if($usuario->tipo !== "administrador") 
						{!! Form::open(['url' => 'administrador/'.$usuario->id, 'method' => 'delete']) !!}
							<button class="btn btn-borrar" type="submit">
								Borrar
								<svg class="bi bi-trash" width="0.5em" height="0.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
	  <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
	</svg>
							</button>
						{!! Form::close()!!}
					@else
						<i class="fas fa-ban"></i>
					@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $usuarios->links() }} 
</div>

@endsection

  