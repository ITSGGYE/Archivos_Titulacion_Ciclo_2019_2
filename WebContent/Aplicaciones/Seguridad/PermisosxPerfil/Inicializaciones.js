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

var cambiarPermisos = function(a){
	if(a){
		alert('si')
		return '<img src=\'../../imagenes/cancel.png\' style=\'border:0\' alt=\'Cambiar Permiso\' title=\'Cambiar Permiso\'/>';
	}else{
		return '<img src=\'../../imagenes/accept.png\' style=\'border:0\' alt=\'Cambiar Permiso\' title=\'Cambiar Permiso\'/>';
	}
}

var flagPermiso = function(codEstado){
	var descripcion = '';
	//'<a href=\'#\' onclick=\'document.programa.verClienteAplicaRebate();\' ><img src=\'./../../imagenes/application_osx_cascade.png\' style=\'border:0\' alt=\'Ver Stock en Bodega\' title=\'Ver Stock en Bodega\'/></a>'
	if(codEstado=='S'){
		descripcion = '<img src=\'../../imagenes/accept.png\' style=\'border:0\' alt=\'Cambiar Permiso\' title=\'Cambiar Permiso\'/>';
	}else{
		descripcion = '<img src=\'../../imagenes/cancel.png\' style=\'border:0\' alt=\'Cambiar Permiso\' title=\'Cambiar Permiso\'/>'; 
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