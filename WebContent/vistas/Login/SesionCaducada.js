/**
 * 
 */

var sesionCaducada = function (){
	
	this.abrirVentana = function(){
		Ext.Msg.show({
			title : "Error De Autenticaci&oacute;n",
			msg : "Por Favor Vuelva a Iniciar Sesi&oacute;n",
			icon : Ext.Msg.Error,
			buttons : Ext.Msg.OK,
			fn : function() {
				window.location.href("../../servlet/SSalida");
			} 
		});
		return; 
	};
}; 

Ext.onReady(function() {
	document.pantallaCaducada = new sesionCaducada();
});