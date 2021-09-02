$(function(){

	// Lista de Continentes
	$.post( 'capacitacion_select_e2.php' ).done( function(respuesta)
	{
		$( '#nombrecapae' ).html( respuesta );
	});

	// lista de Paises	
	$('#nombrecapae').change(function()
	{
		var id_cursoe = $(this).val();
		
		// Lista de Paises
		$.post( 'curso_select_e2.php', { cursoe: id_cursoe} ).done( function( respuesta )
		{
			$( '#cursoe' ).html( respuesta );
		});
	});
	
	// Lista de Ciudades
	$( '#cursoe' ).change( function()
	{
		var pais = $(this).children('option:selected').html();
		
	});

})
