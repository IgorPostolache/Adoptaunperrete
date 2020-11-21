$('document').ready(function(){
	
	
	if($('form p').text())
		$('.animacionCookies').hide()
	
	$('.alert button').click(function(){
		$('form').submit()
	})
})