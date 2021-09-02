function medicamento(){
	var tbody = $('#lista_medicamento tbody');
	var fila_contenido = tbody.find('tr').first().html();
	//Agregar fila nueva.
	$('#lista_medicamento .button_agregar_medicamento').click(function(){
		var fila_nueva = $('<tr></tr>');
		fila_nueva.append(fila_contenido);
		tbody.append(fila_nueva);
	});
	//Eliminar fila.
	$('#lista_medicamento').on('click', '.button_eliminar_medicamento', function(){		
		$(this).parents('tr').eq(0).remove();
	});
}
