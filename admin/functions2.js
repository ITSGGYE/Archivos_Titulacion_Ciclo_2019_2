$(function(){

	// Lista de Continentes
	$.post( 'capacitacion_select.php' ).done( function(respuesta)
	{
		$( '#nombrecapa' ).html( respuesta );
	});

	// lista de Paises	
	$('#nombrecapa').change(function()
	{
		var id_curso = $(this).val();
		
		// Lista de Paises
		$.post( 'curso_select.php', { curso: id_curso} ).done( function( respuesta )
		{
			$( '#curso' ).html( respuesta );
		});
	});
	
	// Lista de Ciudades
	$( '#curso' ).change( function()
	{
		var pais = $(this).children('option:selected').html();
		
	});

})
