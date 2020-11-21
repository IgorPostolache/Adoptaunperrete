@extends('layouts.appAdmin')
@section('titulo', 'Panel Administrador')
 
@section('contenido-seccion') 
<link rel="stylesheet" href="{{ asset('css/verUsuarioAdmin.css') }}">
 <div class="container-fluid mb-5">
          <div class="row">
            <div class="col-8"> 
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title text-center">Ver Usuario</h3>
                  <!--<p class="card-category">Completa todo el formulario</p>-->
                </div>
                <div class="card-body">
                  {{Form::open() }}
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                        	{{Form::label('name', 'Nombre') }}
                        	<br>
                          	<input type="text" name="name" class="form-control" disabled placeholder="{{$usuario->name}}">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          	{{Form::label('email', 'Correo') }}
                        	<br>
                          	<input type="email" name="email" class="form-control" disabled placeholder="{{$usuario->email}}">
                        </div> 
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                        	{{Form::label('provincia', 'Provincia') }}
                        	<br>
                          	<input type="text" name="provincia" class="form-control" disabled placeholder="{{$usuario->provincia}}">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          	{{Form::label('ciudad', 'Ciudad') }}
                        	<br>
                          	<input type="text" name="ciudad" class="form-control" disabled placeholder="{{$usuario->ciudad}}">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          {{Form::label('direccion', 'Dirección') }}
                          <br>
                          <input type="text" name="direccion" class="form-control" disabled placeholder="{{$usuario->direccion}}">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          {{Form::label('telefono', 'Teléfono') }}
                          <br>
                          <input type="number" name="telefono" class="form-control" disabled placeholder="{{$usuario->telefono}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          {{Form::label('web', 'Página web') }}
                          <br>
                          <input type="text" name="web" class="form-control" disabled placeholder="{{$usuario->web}}">
                        </div>
                      </div>
                    </div>
                   <!--{{ Form::submit('Actualizar' , ['class' => 'btn btn-editar']) }}-->

                  {{ Form::close() }}
                  <a href="{{ URL::previous() }}" class="text-uppercase btn btn-borrar mt-3">Volver atrás</a> 
@endsection

