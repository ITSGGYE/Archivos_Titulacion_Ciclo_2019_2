Ext.onReady(function() {
			document.pantallaPrincipalProceso = new Plantillas();
			document.pantallaSecundariaProceso = new PlantillasProceso();
});

/*** Banderas Estados ***/
var flagEstado = function(codEstado){
	var descripcion = '';
	switch((codEstado*1)){
	case 1:
		descripcion = "<center><img src=../../imagenes/flag_green.png alt='Activo'/> </center>";
		break;
	case 2:
		descripcion = "<center> <img src=../../imagenes/flag_red.png alt='Inactivo'/> </center>";
		break;
	case 3:
		descripcion = "<img src=../../imagenes/page_delete.png alt='Anulado'/>  Anulado";
		break;
	default:
		descripcion = " -- NO DEFINIDO -- ";
		break;
	}
	return descripcion;
};
