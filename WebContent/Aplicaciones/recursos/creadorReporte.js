/**
 * 
 */
 var CreadorReportes = function(uriReporte, parametrosReporte){
	
	var configuracionesReporte = {
		urlServicio:"../../servlet/SAdministracionReportes",
		ordenExportacion:"EXPORTAR",
		uriReporte:uriReporte,
		parametrosReporte:parametrosReporte
	};
	
	/**
	 * Permite modificar los parametros enviados al reporte
	 * @param {Object} parametrosModificacion
	 */
	this.modificarParametros = function(parametrosModificacion){
		configuracionesReporte.parametrosReporte = parametrosModificacion;
	};
	
	/**
	*	Permite exportar el reporte segun el tipo indicado
	*/
	this.exportarReporte = function(tipo){
		
		//Se Agrega Variables de Sesion de Manera Automatica
		var codigoEmpresaLogoneada = (document.parametrosSesion2)?document.parametrosSesion2.codigoEmpresa:document.parametrosSesion.codigoEmpresa;
		var codigoAgenciaLogoneada = (document.parametrosSesion2)?document.parametrosSesion2.codigoAgencia:document.parametrosSesion.codigoAgencia;
		var codigoUsuarioLogoneado = (document.parametrosSesion2)?document.parametrosSesion2.codigoUsuario:document.parametrosSesion.codigoUsuario;

		var tiraParametros = "{parametros:["+
							 "{nombre:'EMPRESA_LOGONEADA',valor:'"+codigoEmpresaLogoneada+"'},"+	
							 "{nombre:'AGENCIA_LOGONEADA',valor:'"+codigoAgenciaLogoneada+"'},"+
							 "{nombre:'USUARIO_LOGONEADO',valor:'"+codigoUsuarioLogoneado+"'}";
						 
		if(configuracionesReporte.parametrosReporte!=null){
			var parametro = null;
			for(i=0;i<configuracionesReporte.parametrosReporte.length;i++){				
				parametro = ",{nombre:'"+configuracionesReporte.parametrosReporte[i].nombre+"',";
				parametro += "valor:'"+configuracionesReporte.parametrosReporte[i].valor+"'}";
				tiraParametros += parametro;
			}
		}		
		tiraParametros += "]}";
		var w = window.open();
    	w.opener = null;
    	
    	var d = new Date();
    	var str_enganio = ""+d.getDay()+""+d.getMonth()+""+d.getFullYear()+""+d.getHours()+""+d.getMinutes()+""+d.getSeconds();	
    	w.document.location = configuracionesReporte.urlServicio+"?" +
    						  "tipo="+tipo+
    						  "&orden="+configuracionesReporte.ordenExportacion+
    						  "&uriReporte="+configuracionesReporte.uriReporte+
    						  "&codigoEmpresa="+codigoEmpresaLogoneada+
    						  "&codigoAgencia="+codigoAgenciaLogoneada+
    						  "&codigoUsuario="+codigoUsuarioLogoneado+ 
    						  "&parametros="+tiraParametros+
    						  "&pt="+str_enganio;
    
	};
	
	this.obtenerTiraReporte = function(tipo){
		
		//Se Agrega Variables de Sesion de Manera Automatica
		var codigoEmpresaLogoneada = document.parametrosSesion.codigoEmpresa;
		var codigoAgenciaLogoneada = document.parametrosSesion.codigoAgencia;
		var codigoUsuarioLogoneado = document.parametrosSesion.codigoUsuario;
		
		var tiraParametros = "{parametros:["+
							 "{key:'EMPRESA_LOGONEADA',value:'"+codigoEmpresaLogoneada+"'},"+	
							 "{key:'AGENCIA_LOGONEADA',value:'"+codigoAgenciaLogoneada+"'},"+
							 "{key:'USUARIO_LOGONEADO',value:'"+codigoUsuarioLogoneado+"'}";
		
		if(configuracionesReporte.parametrosReporte!=null){
			var parametro = null;
			for(i=0;i<configuracionesReporte.parametrosReporte.length;i++){				
				parametro = ",{key:'"+configuracionesReporte.parametrosReporte[i].key+"',";
				parametro += "value:'"+(""+configuracionesReporte.parametrosReporte[i].value)+"'}";
				tiraParametros += parametro;
			}    
		}		
		tiraParametros += "]}";		
		
		return configuracionesReporte.urlServicio+
			   "?tipo="+tipo+
			   "&orden="+configuracionesReporte.ordenExportacion+
			   "&uriReporte="+configuracionesReporte.uriReporte+
			   "&codigoEmpresa="+codigoEmpresaLogoneada+
			   "&codigoAgencia="+codigoAgenciaLogoneada+
			   "&codigoUsuario="+codigoUsuarioLogoneado+ 
			   "&parametros="+tiraParametros;

	};
};