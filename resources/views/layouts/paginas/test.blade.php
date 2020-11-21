<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personalizacion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<style> 
	.mensaje-cookie
{
    animation:animacionArriba 3s;
}
@keyframes animacionArriba{from{opacity:0} to{opacity:1}

</style>
	
</head>
<body>
	<div class="alert alert-dismissible bg-primary fade-show text-center text-dark mensaje-cookie">
        <a href="#" class="close" data-dismiss="alert"></a>
        <br>
        Las cookies nos permiten ofrecer nuestros servicios. Al utilizar nuestros servicios, aceptas el uso que hacemos de las cookies. <a href="#"><strong>Más Información.</strong></a> <button class="btn btn-dark text-uppercase btn-cookie">Aceptar</button>
        <p class="valor-cookie" hidden>{{$cookie}}</p>
		<form action="/personalizacion" method="post" class="form-cookie" hidden>
			@csrf
			<select name="cookie">
				<option value="SI">SI</option>
			</select>
			<input type="submit" value="Enviar">
		</form>
      </div>

	 
	
	
<script>
	$('document').ready(function(){
		if($('.valor-cookie').text() == "SI"){
			$('.mensaje-cookie').hide()
		}
		$('.btn-cookie').click(function(){
			$('.form-cookie').submit()
		})
	})
</script>
</body>
</html>