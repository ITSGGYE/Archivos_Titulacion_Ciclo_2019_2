$(document).ready(function() {
	SexyLightbox.initialize();
	
	$("#botonGuardarSolicitud").click(function() {
		
		var bandera = 0;
		
		var idUsuario = jQuery("#idUsuario");
		var listatr = document.getElementsByTagName("tr");
		var solicitudes = document.getElementsByName("solicitud");
		itemSeleccionados = "";
		idsuministros = "";
		
		
		for (var i=0; i<solicitudes.length; i++){
		
			if(solicitudes[i].value == ""){
				bandera = 1;
			}
		}
			
			var ndetalle = solicitudes.length;
			
		if((listatr.length>1) && (bandera==0)){
			
			seleccionarCantidades();
			seleccionarIdSuministros();
			var dataString = 'idUsuario=' +idUsuario.val() + '&cantidades='  +itemSeleccionados +  '&idsuministros=' +idsuministros + '&ndetalle=' + ndetalle;
			//alert(dataString);
						
			$.get('guardarSolicitud.php',dataString,function(){
						alert("Solicitud Ingresada...");
						window.location="ingresarSolicitud.php";
                    });
		} else{
			alert("Ingresar al menos una solicitud de suministro o llene todos los campos de solicitud...");
		}
		
		
		
	});
	
	function  seleccionarCantidades(){
	
		
		$("input[name=solicitud]").each(function(){
			itemSeleccionados += $(this).val() + ',';
		});
		fin = itemSeleccionados.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
		itemSeleccionados = itemSeleccionados.substr( 0, fin ); // elimino la coma final
		
		
		
	}
	
	function  seleccionarIdSuministros(){
	
		
		$("input[name=solicitud]").each(function(){
			idsuministros += $(this).attr("id") + ',';
		});
		fin = idsuministros.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
		idsuministros = idsuministros.substr( 0, fin ); // elimino la coma final
		
		
		
		}
		
		
	

	
	
});