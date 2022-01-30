jQuery(document).ready(function(){
	//alert("hola...");
	//*******Para Suministros***********//
	
	var formBoxes= jQuery(".text");
	var inputCodigo = jQuery("#inputCodigo");
	var reqCodigo = jQuery("#req-codigo");
	var inputDescripcion = jQuery("#inputDescripcion");
	var reqDescripcion = jQuery("#req-descripcion");
	var inputCantidad = jQuery("#inputCantidad");
	var reqCantidad = jQuery("#req-cantidad");
	var inputUnidad = jQuery("#unidad");
	var inputCategoria = jQuery("#categoria");
	var inputEstado = jQuery("#estado");
	

	
	//DEFAULT PARA SUMINISTROS...
	var defaultCodigo = "Escribe tu codigo...";
	var defaultDescripcion = "Ingrese la descripcion...";
	var defaultCantidad = "Ingrese la cantidad...";
	
	//Funciones de validacion para suministros//
	function validateCodigo(){
		//Si el mensaje esta vacio
		if(inputCodigo.val().length == 0){
			reqCodigo.fadeIn('fast');
			reqCodigo.removeClass("requisites");
			return false;
		}

		else{
			reqCodigo.fadeOut('fast');
			reqCodigo.addClass("requisites")//oculta el mensaje de nuevo
			return true;
		}	
	}
	
	function validateDescripcion(){
		//Si el mensaje esta vacio
		if(inputDescripcion.val().length == 0){
			reqDescripcion.fadeIn('fast');
			reqDescripcion.removeClass("requisites");
			return false;
		}

		else{
			reqDescripcion.fadeOut('fast');
			reqDescripcion.addClass("requisites")//oculta el mensaje de nuevo
			return true;
		}	
	}
	
	function validateCantidad(){
		//Si el mensaje esta vacio
		if(inputCantidad.val().length == 0){
			reqCantidad.fadeIn('fast');
			reqCantidad.removeClass("requisites");
			return false;
		}

		else{
			reqCantidad.fadeOut('fast');
			reqCantidad.addClass("requisites")//oculta el mensaje de nuevo
			return true;
		}	
	}
	
	//fin de validacion suministros...
	
	
	
	
	//controlamos la validacion en los distintos eventos
	
	//perdida de foco para suministros...
	inputCodigo.blur(validateCodigo);
	inputDescripcion.blur(validateDescripcion);
	inputCantidad.blur(validateCantidad);
	
	
	
	//controlamos el foco / perdida de foco para los input text
	formBoxes.focus(function(){
		jQuery(this).addClass("active");
	});
	formBoxes.blur(function(){
		jQuery(this).removeClass("active");  
	});

	//Para que los inputs tengan un texto descriptivo de la informacion requerida
	//se ve bonito :)
	
	//Para que vea bonito la parte de suministros...//
	
	inputCodigo.blur(function(){
		if(jQuery(this).attr("value") == "") jQuery(this).attr("value", defaultCodigo);
	});
	
	inputCodigo.focus(function(){
		if(jQuery(this).attr("value") == defaultCodigo) jQuery(this).attr("value", "");
	});
	
	inputDescripcion.blur(function(){
		if(jQuery(this).attr("value") == "") jQuery(this).attr("value", defaultDescripcion);
	});
	
	inputDescripcion.focus(function(){
		if(jQuery(this).attr("value") == defaultDescripcion) jQuery(this).attr("value", "");
	});
	
	inputCantidad.blur(function(){
		if(jQuery(this).attr("value") == "") jQuery(this).attr("value", defaultCantidad);
	});
	
	inputCantidad.focus(function(){
		if(jQuery(this).attr("value") == defaultCantidad) jQuery(this).attr("value", "");
	});
	
	//envio del formulario de ingreso de suministro!!...
	$("#botonEnviarSuministro").click(function() {
		if(validateCodigo() == true && validateCantidad() == true && validateDescripcion() == true )
		{
			
			var dataString = 'codigo=' + inputCodigo.val() + '&descripcion=' + inputDescripcion.val() + '&cantidad=' + inputCantidad.val() + '&unidad=' + inputUnidad.val() + '&categoria=' + inputCategoria.val() + '&estado=' + inputEstado.val();

			$.get('guardarSuministro.php', dataString, function(){
                        $('form')[0].reset();						
						$('#success').attr("style", "");
                    });


		}
		else {
			alert("Llene todos los campos por favor...");
		
		}
	});
	
});