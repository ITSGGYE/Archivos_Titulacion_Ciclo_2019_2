Ext.onReady(function() {
			document.pantallaPrincipalProceso = new MantenimientoArticulo();
			//document.pantallaSecundariaProceso = new MantenimientoArticuloProceso();
			iniciar(); 
});

document.bodegaInicializa = 1;

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

var iniciar = function(){
	(function(){
			//botones.cmdBorrar.fireEvent("click");
		Ext.getCmp("cmbBodegasxAgencias2").setValue(document.bodegaInicializa);
		document.pantallaPrincipalProceso.actualizarGridPrincipal();
		//document.pantallaPrincipalProceso.validarStock();
	}).defer(500);
};