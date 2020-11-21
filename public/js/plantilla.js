function logout()
{
    event.preventDefault()
    $('#logout-form').submit()
}

$('document').ready(function(){
if($('.valor-cookie').text() == "SI"){
			$('.mensaje-cookie').hide()
		}
		$('.btn-cookie').click(function(){
			$('.form-cookie').submit()
		})
})


function subirArriba()
{
 	window.scroll(0,0)
}