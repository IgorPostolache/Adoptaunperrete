<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">
        <script type="text/javascript" src="{!! asset('js/plantilla.js') !!}" async></script>
    </head>
    <body>

      <nav class="navbar navbar-expand-md justify-content-between text-uppercase">
        <a href="{{ route('inicio')}}" class="navbar-brand">
            <img src="{!! asset('storage/img/logo.png') !!}" width="30" height="30" class="d-inline-block align-top" alt="">
            Adopta un perrete
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barraCollapsable">
            <span class="navbar-toggler-icon">...</span>
        </button>
        
        <div class="collapse navbar-collapse" id="barraCollapsable">
            @if (Route::has('login'))
            <div class="navbar-nav mr-auto mt-2 mt-lg-0"></div>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('inicio')}}" class="nav-link">Inicio</a></li>
                <li class="nav-item-active"><a href="{{ route('informarse')}}" class="nav-link">Informarse</a></li>
                <!-- ME PARECE QUE NO HACE FALTAN
                <li class="nav-item-active"><a href="{{ route('adoptar')}}" class="nav-link">Adoptar</a></li>
                -->
                <!--
                <li class="nav-item"><a href="{{ route('protectoras')}}" class="nav-link">Protectoras</a></li>
                -->
                <li class="nav-item"><a href="{{ route('contactar')}}" class="nav-link">Contactar</a></li>
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Iniciar sessión</a></li>
                @else
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                      {{Auth::user()->name}}
                    </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if(Auth::user()->tipo === 'administrador')
                                <a href="{{ route('administrador')}}" class="nav-link">Panel de Administrador</a>
                            @else
                                <a href="/anuncios/create" class="nav-link">Publicar un anuncio</a>
                                <a href="{{ route('basico')}}" class="nav-link">Panel de Usuario</a>
                            @endif
                            <a href="logout" class="nav-link" onclick="logout()">Cerrar sessión</a>
 
                        </div>
                    </div>
                @endguest
            </ul>

            @endif
        </div>
      </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
        @include('mensajes')
        @yield('contenido')
    <footer class="fixed-bottom">
        <div class="row d-flex justify-content-center"> 
            <div class="col-auto ml-5 text-uppercase">
                <a href="{{ route('aviso')}}">Aviso Legal</a>
                <a href="{{ route('privacidad')}}" class="pl-3">Política de Privacidad</a>
                <a href="{{ route('contactar')}}" class="pl-3 pr-3">Contacto</a>  

                <a href=""><i class="fab fa-skype"></i></a>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-google-plus-g"></i></a>
                <a href=""><i class="fab fa-youtube"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>    
            </div>
        
           <div class="w-100"></div>
           <div class="col-auto ml-5" id="copyright">
                <div>Copyright 2020 Adopta un perrete</div>
            </div>
            <!--
            <div class="col-1 offset-1">
                <a href="#nav"><img src="/storage/img/arrow-arriba.png" alt="arriba" onclick="subirArriba()"></a>
            </div>
            -->
        
        </div>
    </footer>
    </body>
</html>
