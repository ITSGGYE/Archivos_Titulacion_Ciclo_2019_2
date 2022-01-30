$(document).ready(function(){			
	//variables globales
	//******Para Usuarios.**********//
	var formBoxes= jQuery(".text");
	var inputUsername = jQuery("#inputNombre");
	var reqUsername = jQuery("#req-username");
	var inputLastname = jQuery("#inputLastname");
	var reqLastname = jQuery("#req-lastname");
	var inputEmail = jQuery("#inputCorreo");
	var reqEmail = jQuery("#req-email");
	var inputUsuario = jQuery("#inputUsuario");
	var reqMessage = jQuery("#req-usuario");
	var inputPassword = jQuery("#inputPassword");
	var reqPassword = jQuery("#req-password");
	var inputRepassword = jQuery("#inputRepassword");
	var reqRepassword = jQuery("#req-repassword");
	var inputpregunta = jQuery("#pregunta");
	var inputdepartamento = jQuery("#departamento");
	var inputRol = jQuery("#rolUsuario");
	var tipoUsuario = jQuery("#tipoUsuario");
	var inputRespuesta = jQuery("#inputRespuesta");
	var reqRespuesta = jQuery("#req-respuesta");
	
	//*******Para Suministros***********//
	
	
	
	
	//DEFAULT PARA USUARIOS//
	var defaultUsername = "Escribe tu nombre...";
	var defaultEmail = "Escribe tu email...";
	var defaultUser = "Ingrese su usuario...";
	var defaultLastname = "Escribe tu apellido...";
	var defaultRespuesta = "Escribe tu respuesta...";
	var itemSeleccionados = "";

	function  seleccionarEscogidos(){
	
		
		$("input[name=checks]:checked").each(function(){
			itemSeleccionados += $(this).val() + ',';
		});
		fin = itemSeleccionados.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
		itemSeleccionados = itemSeleccionados.substr( 0, fin ); // elimino la coma final
		
		
		
		}
	
	//funciones de validacion para usuario...
	function validateMessage(){
		//Si el mensaje esta vacio
		if(inputUsuario.val().length == 0){
			reqMessage.fadeIn('fast');
			reqMessage.removeClass("requisites");
			return false;
		}

		else{
			reqMessage.fadeOut('fast');
			reqMessage.addClass("requisites");//oculta el mensaje de nuevo
			return true;
		}	
	}
	
	function validateUsername(){
		//SI longitud pero NO solo caracteres A-z
		if(!inputUsername.val().match(/^[a-zA-Z]+$/)){
			reqUsername.fadeIn('fast');
			reqUsername.removeClass("requisites");
			return false;
		}
		// SI longitud, SI caracteres A-z
		else{
			reqUsername.fadeOut('fast');
			reqUsername.addClass("requisites");//oculta el mensaje de nuevo
			return true;
		}
	}
	
	function validateLastname(){

		//SI longitud pero NO solo caracteres A-z
		if(!inputLastname.val().match(/^[a-zA-Z]+$/)){
			reqLastname.fadeIn('fast');
			reqLastname.removeClass("requisites");
			return false;
		}
		// SI longitud, SI caracteres A-z
		else{
			reqLastname.fadeOut('fast');
			reqLastname.addClass("requisites");//oculta el mensaje de nuevo
			return true;
		}
	}
	
	function validateRespuesta(){

		//SI longitud pero NO solo caracteres A-z
		if(!inputRespuesta.val().match(/^[a-zA-Z]+$/)){
			reqRespuesta.fadeIn('fast');
			reqRespuesta.removeClass("requisites");
			return false;
		}
		// SI longitud, SI caracteres A-z
		else{
			reqRespuesta.fadeOut('fast');
			reqRespuesta.addClass("requisites");//oculta el mensaje de nuevo
			return true;
		}
	}
	
	function validateEmail(){
		//NO hay nada escrito
		if(inputEmail.val().length == 0){
			reqEmail.fadeIn('fast');
			reqEmail.removeClass("requisites");
			return false;
		}
		// SI escrito, NO VALIDO email
		else if(!inputEmail.val().match(/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i)){
			reqEmail.fadeIn('fast');
			reqEmail.removeClass("requisites");
			return false;
		}
		// SI rellenado, SI email valido
		else{
			reqEmail.fadeOut('fast');
			reqEmail.addClass("requisites");//oculta el mensaje de nuevo
			return true;
		}
	}
	
	function validatePassword(){
		//NO hay nada escrito
		if(inputPassword.val().length == 0){
			reqPassword.fadeIn('fast');
			reqPassword.removeClass("requisites");
			return false;
		}
		// SI rellenado, SI email valido
		else{
			reqPassword.fadeOut('fast');
			reqPassword.addClass("requisites");//oculta el mensaje de nuevo
			return true;
		}
	}
	
	function validateRePassword(){
		//NO hay nada escrito
		if(inputRepassword.val().length == 0){
			reqRepassword.fadeIn('fast');
			reqRepassword.removeClass("requisites");
			return false;
		}
		else if(inputPassword.val()!=inputRepassword.val()){
			reqRepassword.fadeIn('fast');
			reqRepassword.removeClass("requisites");
			return false;
		}
		// SI rellenado, SI email valido
		else{
			reqRepassword.fadeOut('fast');
			reqRepassword.addClass("requisites");//oculta el mensaje de nuevo
			return true;
		}
	}
	
	//controlamos la validacion en los distintos eventos
	// Perdida de foco
	inputUsername.blur(validateUsername);
	inputLastname.blur(validateLastname);
	inputEmail.blur(validateEmail);
	inputUsuario.blur(validateMessage);
	inputPassword.blur(validatePassword);
	inputRepassword.blur(validateRePassword);
	inputRespuesta.blur(validateRespuesta);
	
	
	//controlamos el foco / perdida de foco para los input text
	formBoxes.focus(function(){
		jQuery(this).addClass("active");
	});
	formBoxes.blur(function(){
		jQuery(this).removeClass("active");  
	});

	//Para que los inputs tengan un texto descriptivo de la informacion requerida
	//se ve bonito :)
	inputUsername.focus(function(){
		if(jQuery(this).attr("value") == defaultUsername) jQuery(this).attr("value", "");
	});
	inputUsername.blur(function(){
		if(jQuery(this).attr("value") == "") jQuery(this).attr("value", defaultUsername);
	});
	
	inputLastname.focus(function(){
		if(jQuery(this).attr("value") == defaultLastname) jQuery(this).attr("value", "");
	});
	inputLastname.blur(function(){
		if(jQuery(this).attr("value") == "") jQuery(this).attr("value", defaultLastname);
	});
	
	inputEmail.focus(function(){
		if(jQuery(this).attr("value") == defaultEmail) jQuery(this).attr("value", "");
	});
	inputEmail.blur(function(){
		if(jQuery(this).attr("value") == "") jQuery(this).attr("value", defaultEmail);
	});
	
	inputUsuario.focus(function(){
		if(jQuery(this).attr("value") == defaultUser) jQuery(this).attr("value", "");
	});
	
	inputUsuario.blur(function(){
		if(jQuery(this).attr("value") == "") jQuery(this).attr("value", defaultUser);
	});
	
	inputRespuesta.blur(function(){
		if(jQuery(this).attr("value") == "") jQuery(this).attr("value", defaultRespuesta);
	});
	
	inputRespuesta.focus(function(){
		if(jQuery(this).attr("value") == defaultRespuesta) jQuery(this).attr("value", "");
	});
	
	
	
	
	//envio del formulario de ingreso de usuario!!...
	$("#botonGuardarUsuario").click(function() {
		
		seleccionarEscogidos();
		//alert(itemSeleccionados);
		
		
		if(validateUsername() == true && validateEmail() == true && validateMessage() == true && validateLastname() == true && validateLastname() == true && validatePassword() == true && validateRePassword()==true && validateRespuesta()==true)
		{
			
			var dataString = 'name=' + inputUsername.val() + '&password=' + inputPassword.val() + '&apellido=' + inputLastname.val() + '&usuario=' + inputUsuario.val() + '&repassword=' + inputRepassword.val() + '&respuesta=' + inputRespuesta.val() + '&mail=' + inputEmail.val() + '&departamento=' + inputdepartamento.val() + '&pregunta=' + inputpregunta.val() + '&tipoUsuario=' + tipoUsuario.val() + '&checks=' +itemSeleccionados;

			$.get('guardar.php', dataString, function(){
                        $('form')[0].reset();						
						$('#success').attr("style", "");
                    });


		}
		else {
			alert("Llene todos los campos por favor...");
		
		}
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