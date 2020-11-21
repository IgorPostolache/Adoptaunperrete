@extends('layouts.app')
@section('titulo', 'Informarse')
@section('contenido') 
<link rel="stylesheet" href="{{ asset('css/informarse.css') }}"> 
<script type="text/javascript" src="{!! asset('js/informarse.js') !!}" async></script>

<div class="row align-items-end animacionCookies">
    <div class="col">
      <div class="alert alert-dismissible fade-show text-center text-dark">
        <a href="#" class="close" data-dismiss="alert"></a>
        <br>
        Las cookies nos permiten ofrecer nuestros servicios. Al utilizar nuestros servicios, aceptas el uso que hacemos de las cookies. <a href="{{ route('privacidad')}}" id="cookie" target="_blank"><strong>Más Información.</strong></a> <button class="btn btn-dark text-uppercase" onclick="aceptarCookie()">Aceptar</button>
      </div>
    </div>
</div>
	{!! Form::open(['url' => 'informarse']) !!}
					{{Form::hidden('cookie', true) }}
					<p hidden>{{$cookie}}</p>
					<button hidden class="btn btn-borrar" type="submit">
						Enviar
				</button>
				{!! Form::close()!!}
 

<div class="row container pt-3 pb-5 mb-5">
	<div class="col offset-2">
		<h2 class="text-uppercase">Informate antes de adoptar</h2>
		<p>Por diversos motivos estos perritos han sido abandonados: la enfermedad del dueño, un simple capricio, la imposibilidad económica o simplemente la "incomodidad" que le originaba. </p>
		<p>En cualquier caso, tener una mascota es una responsabilidad.</p>

		<p>Antes de adoptar piensa en el tiempo que estas dispuesta a dedicarle, a la necesidad de vacunas, de paseos, de vacanciones, de tu familia y amigos.</p>
		<p>Porque quierer a alguién implica dedicarle tiempo.</p>

		<p>Cúando eliges a tu mascota más que en el aspecto exterior fijate en su personalidad, tamaño y edad. Y si tienes dudas qué perrito es más compatible cu tu estilo de vida no dudes en preguntar.</p>
		<p>Cabe mencionar que no todos los perritos se adaptan rápiedamente y por ello es importante entender que será necesario un poco de paciencia al principio.</p>

		<p>Los perritos que estan disponibles para la adopción están en sus mejores condiciones sanitarias: están vacunados, desparasitados y esterilizados.</p>
		<p>Para poder adoptar hay que hacer un pequeño donativo el cúal es necesario puesto que las protectoras no reciben subvenciones de los ayuntamientos.</p>
	</div>
	<div class="col">
		<div class="embed-responsive embed-responsive-16by9">
  			<iframe width="560" height="315" src="https://www.youtube.com/embed/mlfzDp9rjos?cc_load_policy=1?cc_lang_pref=es" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
</div>

@endsection