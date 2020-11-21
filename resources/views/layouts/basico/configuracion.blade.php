@extends('layouts.appUsuario')
@section('titulo', 'Panel Usuario')
 
@section('contenido-seccion') 
<link rel="stylesheet" href="{{ asset('css/verUsuarioAdmin.css') }}">
 
 <div class="container-fluid mb-5">
          <div class="row justify-content-center">
            <div class="col-8"> 
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title text-center">CONFIGURACIÓN</h3>
                  <!--<p class="card-category">Completa todo el formulario</p>-->
                </div>
                <div class="card-body"> 
                  {{Form::open(['url' => 'usuario/'.$usuario->id, 'method'=> 'put']) }}
                    <div class="row">
                      <!--<input type="number"  value="{{$usuario->id}}" hidden>-->
                      
                      <div class="col-6">
                        <div class="form-group">
                        	{{Form::label('name', 'Nombre') }}
                        	<br>
                          	<input type="text" name="name" class="form-control" value="{{$usuario->name}}">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          	{{Form::label('email', 'Correo') }}
                        	<br>
                          	<input type="email" name="email" class="form-control" value="{{$usuario->email}}">
                        </div> 
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                        	{{Form::label('provincia', 'Provincia') }}
                        	<br>
                          	<input type="text" name="provincia" class="form-control"  value="{{$usuario->provincia}}">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          	{{Form::label('ciudad', 'Ciudad') }}
                        	<br>
                          	<input type="text" name="ciudad" class="form-control"  value="{{$usuario->ciudad}}">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          {{Form::label('direccion', 'Dirección') }}
                          <br>
                          <input type="text" name="direccion" class="form-control"  value="{{$usuario->direccion}}">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          {{Form::label('telefono', 'Teléfono') }}
                          <br>
                          <input type="number" name="telefono" class="form-control"  value="{{$usuario->telefono}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          {{Form::label('web', 'Página web') }}
                          <br>
                          <input type="text" name="web" class="form-control"  value="{{$usuario->web}}">
                        </div>
                      </div>
                    </div>
                   {{ Form::submit('Actualizar' , ['class' => 'btn btn-borrar']) }}
                    <a class="btn btn-resetear" href="{{ route('password.request') }}">Cambiar Contraseña</a>
                    <a class="btn btn-suprimir" href="{{ route('darseDeBaja') }}">Darse de Baja</a>
                    <!--{!! Form::open(['url' => 'administrador/'.$usuario->id, 'method' => 'delete']) !!}
                      <button class="btn btn-suprimir" type="submit">
                        Darse de baja
                      </button>
                    {!! Form::close()!!}-->
                  {{ Form::close() }} 
@endsection
   
