Ext.onReady(function() {
			document.pantallaPrincipalProceso = new Plantillas();
			document.pantallaSecundariaProceso = new PlantillasProceso();
			
});

var cantidaddeceros = 8;
document.tipopedido = 6;//APROBADOS

var obtenerNumeropedido = function(numero){
		var cantdecero = cantidaddeceros; 
		var valor = "";
		valor = (numero);
		var cadena ="";
		for (i = 0; i < cantdecero-valor.length; i++) {
			cadena += "0";
		}
		cadena += valor;
		console.log("cadena final "+cadena);
		//console.log("valor para guardar "+Long.parseLong(cadena));
		return cadena;
}; 

/*** Banderas Estados ***/
var renderizarEstado = function(codEstado){
	var descripcion = ''; 
	switch((codEstado*1)){
	case 1:
		descripcion = "<img src=../../imagenes/flag_green.png alt='Activo'/> Activo";
		break;
	case 2:
		descripcion = "<img src=../../imagenes/flag_red.png alt='Inactivo'/> Inactivo";
		break;
	case 3:
		descripcion = "<img src=../../imagenes/page_delete.png alt='Anulado'/>  Anulado";
		break;
	case 6:
		descripcion = "<img src=../../imagenes/tick.png alt='Aprobado' />  Aprobado";
		break;
	case 7:
		descripcion =  "<img src=../../imagenes/bullet_key.png alt='Inactivo' />  Procesado";
		break;
	default:
		descripcion = " -- NO DEFINIDO -- ";
		break;
	}
	return descripcion;
};