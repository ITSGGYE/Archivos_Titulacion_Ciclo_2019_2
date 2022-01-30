var Plantillas = function() {
	var check = new Ext.grid.CheckboxSelectionModel();
	var codigoSistema = "";
	
	var parametrosTransportador = {
	
		
	};

	var accionesCeldas = new Ext.ux.grid.CellActions({
				listeners : {
					action : function(grid, record, action, value) {
						llamadaPantallaSecundariaDatosPlantilla(record);
					}
				}
			});

	var modeloDatos = {
		storeGridPrincipal : new Ext.data.Store({
			url : "../../servlet/SAdministracionProveedores", 
			baseParams : {
				orden : "LISTAR_PROVEEDORES_X_FILTROS",
				//datosOrden : Ext.encode(parametrosTransportador.listarProveedoresBuscar),
				start : 0,
				limit : 20,
				codempresa : document.parametrosSesion.codigoEmpresa,
				codigo : '',
				descripcion : '',  
				identificacion : '',
				tipoidentificacion : ''
			},
			reader : new Ext.data.XmlReader({
						success : "@success",
						record : "proveedores",
						totalRecords : "@totalRegistros"
					}, [
						{name : "codempresa"}, 
						{name : "desempresa"},
						{name : "codproveedor"},
						{name : "desproveedor"},
						{name : "identificacion"}, 
						{name : "telfijo"},
						{name : "celular"},
						{name : "email"},
						{name : "contacto"},
						{name : "codestado"},
						{name : "ucreacion"},
						{name : "fechacreacion"}
						])
		}),
		columnasGridPrincipal : [new Ext.grid.RowNumberer(), check,
				{dataIndex : "codempresa",header : "Codempresa",width : 100,hidden : true},
				{dataIndex : "desempresa",header : "Empresa",width : 100},
				{dataIndex : "codproveedor",header : "codproveedor",width : 100,hidden : true},
				{dataIndex : "desproveedor",header : "Proveedor",width : 100},
				{dataIndex : "identificacion",header : "identificacion",width : 100},
				{dataIndex : "telfijo",header : "Telef Fijo",width : 100},
				{dataIndex : "celular",header : "Celular",width : 100},
				{dataIndex : "email",header : "email",width : 100}, 
				{dataIndex : "contacto",header : "Contacto",width : 100},
				{dataIndex : "codestado",header : "Estado",width : 100,hidden : false, renderer: flagEstado,align:'center'},
				{dataIndex : "ucreacion",header : "U. creaci&oacute;n",width : 100,hidden : false},
				{dataIndex : "fechacreacion",header : "Fecha creaci&oacute;n",width : 100,hidden : false}
				],
		readerSistema : new Ext.data.XmlReader({
					success : "@success",
					record : "sistema"
				}, [{
							name : "codigo"
						}, {
							name : "descripcion"
						}]),
		readerDocumento : new Ext.data.XmlReader({
					success : "@success",
					record : "documento"
				}, [{
							name : "codigo"
						}, {
							name : "descripcion"
						}]),
		storeComboEmpresas : new Ext.data.Store({
					url : "../../servlet/ServicioTransporte",
					autoLoad : true,
					baseParams : {
						recursoOrden : "BADMINISTRACION_EMPRESAS",
						datosOrden : Ext
								.encode(parametrosTransportador.obtenerEmpresas)
					},
					reader : new Ext.data.XmlReader({
								record : "empresa",
								totalRecords : "@total_registros"
							}, [{
										name : "codigoempresa"
									}, {
										name : "nombre"
									}])
				})
	};

	var panelCentro = new Ext.grid.GridPanel({
		region : "center",
		stripeRows : true,
		border : false,
		plugins : [accionesCeldas],
		loadMask : true,
		//autoExpandColumn : "idfecha",
		store : modeloDatos.storeGridPrincipal,
		columns : modeloDatos.columnasGridPrincipal,
		tbar : new Ext.Toolbar({
			items : [{
						xtype : "tbseparator"
					}, {
						xtype : "button",
						text : "Nuevo ",
						icon : "../../imagenes/page_add.png",
						cls : "x-btn-text-icon",
						// disabled:!(document.parametrosSeguridad.puedeGuardar),
						listeners : {
							click : function() {
								document.pantallaSecundariaProceso
										.abrirVentana("I", null, null);
							}
						}
					}, {
						xtype : "button",
						text : "Inactivar ",
						icon : "../../imagenes/delete.png", 
						cls : "x-btn-text-icon",
						// disabled:!(document.parametrosSeguridad.puedeEliminar),
						listeners : {
							click : function() {
								var record = panelCentro.getSelectionModel().getSelected();
								if (record == undefined) {
									Ext.Msg.show({
										title : "Atenci&oacute;n",
										msg : "Por favor escoja un Registro para proceder a inactivarlo",
										icon : Ext.Msg.INFO,
										buttons : Ext.Msg.OK
									});
								} else {
									var mensajeConfirmacion = "Est&aacute; seguro que desea inactivr el proveedor?"
									Ext.MessageBox.confirm(
											"Confirmaci&oacute;n",
											mensajeConfirmacion, function(opc) {
												if (opc == "yes") {
													var codigo = record.get("codproveedor");
													var codempresa = record.get("Codempresa");
													document.pantallaSecundariaProceso.eliminar(codigo,codempresa);
												}
											});
								}
							}
						}
					}]
		}),
		bbar : new Ext.PagingToolbar({
					store : modeloDatos.storeGridPrincipal,
					displayInfo : true,
					displayMsg : "Mostrando {0} - {1} de {2}",
					pageSize : 10
				})
	});

	/**
	 * store para almacenar los datos de los combos de usuario, agencias y
	 * estados.
	 */
	var storeCombos = {
		storeComboSistema : new Ext.data.Store({
					reader : modeloDatos.readerSistema,
					url : '../../servlet/ServicioTransporte',
					baseParams : {
						recursoOrden : "BADMINISTRACION_PARAMETROS",
						datosOrden : Ext
								.encode(parametrosTransportador.listarSistemas)
					},
					autoLoad : true
				}),
		storeComboEmpresas : new Ext.data.Store({
					url : "../../servlet/ServicioTransporte",
					autoLoad : true,
					baseParams : {
						recursoOrden : "BADMINISTRACION_EMPRESAS",
						datosOrden : Ext
								.encode(parametrosTransportador.obtenerEmpresas)
					},
					reader : new Ext.data.XmlReader({
								record : "empresa",
								totalRecords : "@total_registros"
							}, [{
										name : "codigoempresa"
									}, {
										name : "nombre"
									}])
				}),
		storeComboDocumento : new Ext.data.Store({
					reader : modeloDatos.readerDocumento,
					url : '../../servlet/ServicioTransporte',
					baseParams : {
						recursoOrden : "BADMINISTRACION_PLANTILLAS",
						datosOrden : Ext
								.encode(parametrosTransportador.obtenerDocumentos)
					},
					autoLoad : false
				})
	};

	/* componentes de objeto Filtro */
	var componentesFiltro = {
		cmbSistemas : new Ext.form.ComboBox({
					fieldLabel : "Sistema",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeCombos.storeComboSistema,
					triggerAction : "all",
					// editable:false,
					hiddenName : "sistema",
					mode : "remote",
					emptyText : "Seleccionar el sistema",
					allowBlank : true
				}),
		cmbEmpresa : new Ext.form.ComboBox({
					fieldLabel : "Empresa",
					store : modeloDatos.storeComboEmpresas,
					mode : "remote",
					triggerAction : "all",
					editable : false,
					forceSelection : true,
					valueField : "codigoempresa",
					emptyText : "Seleccionar la empresa",
					displayField : "nombre"
				}),
		cmbDocumentos : new Ext.form.ComboBox({
					fieldLabel : "Documento",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeCombos.storeComboDocumento,
					triggerAction : "all",
					editable : false,
					hiddenName : "documento",
					mode : "remote",
					emptyText : "Seleccionar el Documento"
				}),
		txtCodigo : new Ext.form.TextField({
					fieldLabel : "C�digo",
					name : "codigo",
					width : 164
				}),
		
		txtnombreFILTRO : new Ext.form.TextField({
					fieldLabel : "Proveedor",
					name : "txtnombreFILTRO",
					readOnly : false,
					width : 164,
					maskRe : /[A-Za-z. ]/
		}),
				
		txtidentificacionFILTRO : new Ext.form.TextField({
					fieldLabel : "Identificacion",
					name : "txtidentificacionFILTRO",
					readOnly : false,
					width : 164,
					maskRe : /[\d\.]/,
					regex : /^\d+(\.\d{1,2})?$/
				}),
		cmbtipoidentificacionFILTRO : new Ext.form.ComboBox({
					fieldLabel : "Tipo Identif.",
					allowBlank : false,
					name : "cmbtipoidentificacionFILTRO",
					emptyText : "Seleccione uno ...",
					store : new Ext.data.SimpleStore({
								fields : ["codigo", "descripcion"],
								data : [["1", "CEDULA"], ["2", "RUC"],
										["3", "PASAPORTE"]]
							}),
					triggerAction : "all",
					mode : "local",
					width : 164,
					typeAhead : false,
					editable : false,
					disabled : false,
					forceSelection : true,
					displayField : "descripcion",
					valueField : "codigo",
					lazyRender : true
				})
	};
	/*
	componentesFiltro.cmbSistemas.on("select", function() {
		componentesFiltro.cmbDocumentos.store.baseParams.codsistema = componentesFiltro.cmbSistemas
				.getValue();
		componentesFiltro.cmbDocumentos.store.load();
		componentesFiltro.cmbDocumentos.setValue("");
		componentesFiltro.cmbDocumentos.enable();
	});
	*/
	/* botones de busqueda de datos */
	var botones = {
		cmdBorrar : new Ext.Button({
					text : "Borrar Datos",
					formBind : true,
					cls : "x-btn-text-icon",
					icon : "../../imagenes/page_delete.png"
				}),
		cmdBuscar : new Ext.Button({
					text : "Mostrar Registros",
					formBind : true,
					cls : "x-btn-text-icon",
					icon : "../../imagenes/buscar.png"
				})
	};

	/* panel filtro de busqueda */
	var panelFiltro = new Ext.form.FormPanel({
				region : "center",
				stripeRows : true,
				border : false ,
				monitorValid : true,
				labelWidth : 90,
				bodyStyle : "padding:6px",
				items : [
						new Ext.form.FieldSet({
							title : "Filtro de Busqueda",
							//autoHeight:true,
							height : 150,  
							style : "padding:10px",
 							width: 300, 
							items : [componentesFiltro.txtnombreFILTRO,
									componentesFiltro.txtidentificacionFILTRO,
									componentesFiltro.cmbtipoidentificacionFILTRO],
							buttons : [botones.cmdBorrar, botones.cmdBuscar]
						})]
			});

	/* evento click del boton borrar datos del fitro de busqueda */
	botones.cmdBorrar.on("click", function() {
				componentesFiltro.txtidentificacionFILTRO.setValue(null);
				componentesFiltro.cmbtipoidentificacionFILTRO.setValue(null);
				componentesFiltro.txtnombreFILTRO.setValue(null);
			});

	/* evento click del boton Buscar datos del fitro de busqueda */
	botones.cmdBuscar.on("click", function() {
		var nombre = componentesFiltro.txtnombreFILTRO.getValue();
		var identificacion = componentesFiltro.txtidentificacionFILTRO.getValue();
		var tipoidentificacion = componentesFiltro.cmbtipoidentificacionFILTRO.getRawValue();

		modeloDatos.storeGridPrincipal.baseParams.descripcion = nombre;
		modeloDatos.storeGridPrincipal.baseParams.identificacion = identificacion;
		modeloDatos.storeGridPrincipal.baseParams.tipoidentificacion = tipoidentificacion;

		modeloDatos.storeGridPrincipal.reload({
			params : {
				orden : "LISTAR_PROVEEDORES_X_FILTROS",
				start : 0,
				limit : 20,
				descripcion : nombre,
				identificacion : identificacion,
				tipoidentificacion : tipoidentificacion
			}
		});
	});

	panelCentro.on("dblclick", function() {
				var registro = panelCentro.getSelectionModel().getSelected();
				llamadaPantallaSecundariaDatosPlantilla(registro);
			});

	var llamadaPantallaSecundariaDatosPlantilla = function(registro) {
		if (registro != null) {
			document.pantallaSecundariaProceso.abrirVentana("M", registro
							.get("codproveedor"), registro.get("Codempresa"));
		}
	};

	var pantallaPrincipal = new PantallaPrincipalLocal({
				usaPanelFiltros : true,
				panelFiltros : panelFiltro,
				panelCentro : panelCentro
			});

	/* Actualiza los datos de la pantalla principal */
	this.actualizarGridPrincipal = function() {
		modeloDatos.storeGridPrincipal.removeAll();
		modeloDatos.storeGridPrincipal.load({
					params : {
						start : 0,
						limit : 20
					}
				});
	};

	modeloDatos.storeGridPrincipal.load({
				params : {
					start : 0,
					limit : 10
				}
			});
};
