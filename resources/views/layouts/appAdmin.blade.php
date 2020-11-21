@extends('layouts.app')
@section('contenido') 

<link rel="stylesheet" href="{{ asset('css/administrador.css') }}">
<script type="text/javascript" src="{!! asset('js/administrador.js') !!}" async></script>

<div class="d-flex" id="barra">

    <div class="border-right" id="barraLateral-contenedor">
      <div class="barraLateral-cabecera mt-5 text-uppercase">
        <i class="fas fa-user"></i> panel usuario 
      </div>   
      <div class="list-group list-group-flush mt-5">
        <a href="{{ route('administrador')}}" class="list-group-item list-group-item-action"><i class="fa fa-eye fa-fw"></i> General</a>
        <a href="{{ route('anunciosVerAdmin')}}" class="list-group-item list-group-item-action"><i class="fas fa-paw"></i> Anuncios</a>
        <a href="{{ route('usuariosVerAdmin')}}" class="list-group-item list-group-item-action"><i class="fa fa-users fa-fw"></i> Usuarios</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-history fa-fw"></i> Historial</a>
        <a href="{{ route('configuracionAdmin') }}" class="list-group-item list-group-item-action"><i class="fa fa-cog fa-fw"></i> Configuración</a>
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action mt-5" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Salir</a>
        
      </div>
    </div>

    <div id="contenidoPagina-contenedor">

      <div class="container-fluid mt-5">
        <h1 id="barra-activar" class="mt-4 text-center">Información</h1>
        <p>*** Si pulsas sobre Información se expandira/ocultara la barra lateral</p>
         @yield('contenido-seccion') 
      </div>
    </div>

</div>

@endsection

