
	$('document').ready(function(){
		$('.dynamico').change(function(){
			
			if($(this).val() != '')
			{
				var select = $(this).attr('id')
				var value = $(this).val()
				var dependent = $(this).data('dependent')
				var _token = $("input[name='_token']").val()
				
				$.ajax({
					url:"anuncios/fetch", 
					method: "POST", 
					data:{select: select, value: value, _token: _token, dependent:dependent},
					success: function(result)
					{ 
						 
						$('#'+dependent).html(result) 
					},
					error: function(xhr)
					{
						alert("An error occured: " + xhr.status + " " + xhr.statusText);
					}
				})
			}
		})
})
 
