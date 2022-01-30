/**
 * Configuracion Global de Articulos Janchundia 1.0
 */
 var ConfiguracionArticuloProceso = function() {
 	
 	var botonCancelar = new Ext.Button({
		text:"Cancelar",
		icon:"../../imagenes/cancel.png",
		cls:"x-btn-text-icon"
	});
	
	var botonGuardar = new Ext.Button({
		text:"Guardar",
		formBind : true,
		icon:"../../imagenes/disk_black.png",
		cls:"x-btn-text-icon"
	});
	
	var txtDescripcionx = new Ext.form.TextField({
		emptyText:"Descripcion",
		fieldLabel:"Descripci&oacute;n",
		allowBlank: false,
		width:190,
		maskRe:/[A-Za-z. ]/
	});
 	
	var panelPrincipal = new Ext.form.FormPanel({
		width: configuracion.ancho,
		height: 35,
		layout:"border",
		frame:false,
		monitorValid : true,
		border:false,
		autoScroll :false,
		region: 'center',
		items: [new Ext.Panel({
				layout : "form",
				region : "center",
				monitorValid : true,
				collapsible : true,
				height : 180,
				border : false,
				bodyStyle:"padding:20px",
				labelWidth : 70,
				items:[txtDescripcionx]
				})
			],
		buttonAlign : "right", 
		buttons: [botonGuardar, botonCancelar]
	});
	
 	var ventanaPrincipal = new Ext.Window({
			title: configuracion.tituloVtnProceso, 
			iconCls: configuracion.icon,
			width: configuracion.ancho,
			height: configuracion.alto,
			closable: false,
			modal: true,
			layout : "border",
			//region : 'center',
			items: [panelPrincipal],
			resizable: false, 
			draggable: false,
			frame: true,
			closeAction : "hide"
	});
		
	
	
	this.abrirVentana = function(modo){
		ventanaPrincipal.show();
		ventanaPrincipal.center();
		
		//prepararVentana();
		txtDescripcionx.setValue("");
	}
 	
	botonCancelar.on("click",function(){
		ventanaPrincipal.setVisible(false);
	});
	
	botonGuardar.on("click",function(){
		guardarConfiguracion();
	});
	
	var guardarConfiguracion = function(){
		var paramsGuardar = {
			url : "../../servlet/SAdministracionUMedidas",
			params : {
					orden : configuracion.orden,
					codempresa : document.parametrosSesion.codigoEmpresa,
					descripcion : txtDescripcionx.getValue(),
					codusuario : document.parametrosSesion.codigoUsuario
				},
			callback : function(option, success, response) {
				var respuesta = Ext.decode(response.responseText);

				if (success) {
					if (respuesta.exito) {

						Ext.Msg.show({
									title : "Exito",
									msg : respuesta.mensaje,
									icon : Ext.Msg.INFO,
									buttons : Ext.Msg.OK,
									fn : function() {
										ventanaPrincipal.setVisible(false);
										panelPrincipal.getForm().reset();
										document.pantallaPrincipalProceso.actualizarGridPrincipal();
									}
								});

					} else {
						Ext.Msg.show({
									title : "Error",
									msg : "Error al guardar: "
											+ respuesta.mensaje,
									icon : Ext.Msg.ERROR,
									buttons : Ext.Msg.OK
								});
					}
				} else {
					Ext.Msg.show({
						title : "Error",
						msg : "Error de comunicacion, consulte al dpto. de sistemas",
						icon : Ext.Msg.ERROR,
						buttons : Ext.Msg.OK
					});
				}
			},
			failure: function(A,B){
				var obj = null;
					if (A.responseText) {
					obj = Ext.util.JSON.decode(A.responseText);
					} else {
						if (B.result) {
							obj = B.result;
						}
					}
				Ext.MessageBox.show({
				title: 'Error',
	    		msg : "Error de comunicacion, consulte al Encargado de sistemas",
	    		buttons: Ext.MessageBox.OK,
	    		icon: Ext.MessageBox.ERROR
	   			});
			}
		} 
		
		Ext.Ajax.request(paramsGuardar);
	};
	
 };