function ingresaSolicitud(){
	//alert("hola...");
	var mensajeerror = '';
    var bandera = 0;
	
    var cantidad = document.getElementById("cantidad");
	var idSuministro = document.getElementById("idSuministro");
	var idUsuario = document.getElementById("idUsuario");

    
    if(cantidad.value==''){
		bandera = 1;
        mensajeerror = "* El campo Cantidad no puede estar vacio.";
        cantidad.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
	
	if(bandera==0)
	{	
		
		var dataString = 'idSuministro=' + idSuministro.value + '&cantidad=' + cantidad.value + '&idUsuario=' + idUsuario.value;
		
			$.get('guardarSolicitud.php', dataString, function(){
			
					var cant = document.getElementById(idSuministro.value);
					
					cant.parentNode.replaceChild(document.createTextNode(cantidad.value),cant);
					
					//alert(cant.href);
				
				
				
				
				
						
            });
		SexyLightbox.refresh();
		window.parent.SexyLightbox.close();
		return false;				
		
		
	}

}

	
	
function mostrarMensaje(mensaje)
{
    
    var tr = document.getElementById("trmensaje");
    var span=document.createElement("span");
    
    
    while(tr.hasChildNodes())
        tr.removeChild(tr.firstChild);

   
    span.setAttribute("id","advert");
    span.setAttribute("style","color:red;font-size:12px");

    
    tr.appendChild(span);
    span.appendChild(document.createTextNode(mensaje));


}


