var Plantillas = function() {
	var check = new Ext.grid.CheckboxSelectionModel();
	var codigoSistema = "";
	var fechaActual = new Date().dateFormat("d/m/Y");
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
			url : "../../servlet/SAdministracionPedidoCompra",
			baseParams : {
				orden : "LISTAR_PEDIDOS_X_FILTROS",
				start : 0,
				limit : 20,
				codempresa : document.parametrosSesion.codigoEmpresa,
				codigo : '',
				codproveedor:'',
				numdocumento : '',
				codestado : document.tipopedido, 
				fechadesde : fechaActual,
				fechahasta : fechaActual 
			
			},
			reader : new Ext.data.XmlReader({
						success : "@success",
						record : "pedido",
						totalRecords : "@totalRegistros"
					}, [
						{name : "codorden"},
						{name : "codagencia"}, 
						{name : "numdocumento"}, 
						{name : "codestado"},
						{name : "codtipopago"},
						{name : "destipopago"},
						{name : "codproveedor"}, 
						{name : "desproveedor"},
						{name : "fecharequerida"},
						{name : "subtotal"},
						{name : "descuento"},
						{name : "porciva"},
						{name : "iva"},
						{name : "total"},
						{name : "ucreacion"},
						{name : "fechacreacion"},
						{name : "umodificacion"},
						{name : "fechamodificacion"}
						])
		}),
		columnasGridPrincipal : [new Ext.grid.RowNumberer(), check, 
				{dataIndex : "codorden",header : "N° pedido",width : 100,hidden : false, renderer:obtenerNumeropedido},
				{dataIndex : "codagencia", id: "codagencia",header : "codagencia",width : 100,hidden : true},
				{dataIndex : "numdocumento",header : "Num. Documento",width : 100, hidden:true},
				{dataIndex : "codestado",header : "Estado",width : 180,hidden : false,renderer:renderizarEstado, align:'center'}, 
				{dataIndex : "destipopago",header : "Forma Pago", width : 100}, 
				{dataIndex : "desproveedor",header : "Proveedor", width : 100},
				{dataIndex : "fecharequerida",header : "Fecha Solicitada",width : 100,hidden : false,align:'center'},
				{dataIndex : "subtotal",header : "Subtotal",width : 100,renderer : Ext.util.Format.monedaSinSimbolo,align:'right'}, 
				{dataIndex : "descuento",header : "Descuento",width : 100,renderer : Ext.util.Format.monedaSinSimbolo,align:'right'},
				{dataIndex : "iva",header : "Impuesto",width : 100,renderer : Ext.util.Format.monedaSinSimbolo,align:'right'},
				{dataIndex : "total",header : "Total",width : 100,renderer : Ext.util.Format.monedaSinSimbolo,align:'right'},
				{dataIndex : "ucreacion",header : "U. Creaci&oacute;n",width : 100,align:'center'},
				{dataIndex : "fechacreacion",header : "Fecha Creaci&oacute;n",width : 100,align:'center'},
				{dataIndex : "umodificacion",header : "U. Modificaci&oacute;n",width:100,align:'center'}, 
				{dataIndex : "fechamodificacion",header : "Fecha Modificaci&oacute;n",width : 100,align:'center'}
				//{dataIndex : "codestado",id:"codestado",header : "iva", width : 150,hidden : false, sortable: true, renderer:flagEstado, align:'center'},
				//{header: 'Estado', dataIndex: 'codestado', width: 50, sortable: true, hidden:true},
				//{header: 'Estado', dataIndex: 'codestado', width: 80, sortable: true, renderer:renderizarEstado, align:'center'}
		
		]
		
	};
	
	var panelCentro = new Ext.grid.GridPanel({
		region : "center",
		stripeRows : true,
		border : false,
		plugins : [accionesCeldas],
		loadMask : true,
		//autoExpandColumn : "idfecha",
		viewConfig:{emptyText:"-- No Hay Datos que Mostrar --"},
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
										msg : "Por favor escoja un Pedido para proceder a eliminarlo",
										icon : Ext.Msg.INFO,
										buttons : Ext.Msg.OK
									});
								} else {
									var mensajeConfirmacion = "Est&aacute; seguro que desea Inactivar el Pedido?"
									Ext.MessageBox.confirm(
											"Confirmaci&oacute;n",
											mensajeConfirmacion, function(opc) {
												if (opc == "yes") {
													var codigo = record.get("codorden");
													document.pantallaSecundariaProceso.eliminar(codigo);
												}
											});
								}
							}
						}
					}
					/*{
							xtype : "button",
							text : "Crear pedido Solicitudx ",
							icon : "../../imagenes/add.png",
							cls : "x-btn-text-icon",
							disabled : false, 
							listeners : {
								click : function() {
									alert("ddd");
								}
							}
					}*/
					]
		}),
		bbar : new Ext.PagingToolbar({
					store : modeloDatos.storeGridPrincipal,
					displayInfo : true,
					displayMsg : "Mostrando {0} - {1} de {2}",
					pageSize : 20
				})
	});

	/**
	 * store para almacenar los datos de los combos de usuario, agencias y
	 * estados.
	 */
	var storeCombos = {
		
	};

	/* componentes de objeto Filtro */
	var componentesFiltro = {
		//long codpedido, String codproveedor, String numdocumento
		//maskRe:/[0-9.]/
		txtcodpedido : new Ext.form.TextField({
					fieldLabel : "Cod. Pedido",
					name : "txtcodpedido",
					readOnly : false,
					width : 130,
					maskRe : /[\d\.]/,
					regex : /^\d+(\.\d{1,2})?$/,
					listeners : {
						specialkey : function(t, e) {
							if (e.getKey() === e.ENTER || e.TAB) {
								botones.cmdBuscar.fireEvent("click");
                            }
						}
					}
		}),
		
		txtnumdocumento : new Ext.form.TextField({ 
					fieldLabel : "N° Documento",
					name : "txtnumdocumento",
					readOnly : false,
					width : 130,
					maskRe : /[\d\.]/,
					regex : /^\d+(\.\d{1,2})?$/
		}),
		
		txtcodProveedor : new Ext.form.TextField({
					fieldLabel : "Cod. Proveedor",
					name : "txtcodProveedor",
					readOnly : false,
					width : 130,
					maskRe : /[\d\.]/,
					regex : /^\d+(\.\d{1,2})?$/
		}),
		
		txtFechaDesde : new Ext.form.DateField({
					fieldLabel : "Fecha Desde",
					width : 130,
					value : new Date(),
					dateFormat:"d/m/Y",
					readOnly:false,
					allowBlank: true,
					maxValue:new Date()
		}),
		
		txtFechaHasta : new Ext.form.DateField({
					fieldLabel : "Fecha Hasta",
					width : 130,
					value : new Date(),
					dateFormat:"d/m/Y",
					readOnly:false,
					allowBlank: true,
					maxValue:new Date()
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
							height : 230, 
							style : "padding:10px",
 							width: 300, 
							items : [
									componentesFiltro.txtcodpedido,
									componentesFiltro.txtnumdocumento,
									componentesFiltro.txtcodProveedor,
									componentesFiltro.txtFechaDesde,
									componentesFiltro.txtFechaHasta
									],
							buttons : [botones.cmdBorrar, botones.cmdBuscar]
						})]
			});

	/* evento click del boton borrar datos del fitro de busqueda */
	botones.cmdBorrar.on("click", function() {
				componentesFiltro.txtcodpedido.setValue(null);
				componentesFiltro.txtnumdocumento.setValue(null);
				componentesFiltro.txtcodProveedor.setValue(null);
				componentesFiltro.txtFechaDesde.setValue(null);
				componentesFiltro.txtFechaHasta.setValue(null);

	});

	/* evento click del boton Buscar datos del fitro de busqueda */
	botones.cmdBuscar.on("click", function() {
		//long codpedido, String codproveedor, String numdocumento,
		var codpedido = componentesFiltro.txtcodpedido.getValue();
		var codproveedor = componentesFiltro.txtcodProveedor.getValue();
		var numdocumento = componentesFiltro.txtnumdocumento.getValue();
		var codigoempresa = document.parametrosSesion.codigoEmpresa;
		var fdesde = componentesFiltro.txtFechaDesde.getRawValue();
		var fhasta = componentesFiltro.txtFechaHasta.getRawValue();
		
		modeloDatos.storeGridPrincipal.baseParams.codempresa = codigoempresa;
		modeloDatos.storeGridPrincipal.baseParams.codigo = codpedido;
		modeloDatos.storeGridPrincipal.baseParams.codproveedor = codproveedor; 
		modeloDatos.storeGridPrincipal.baseParams.numdocumento = numdocumento;
		modeloDatos.storeGridPrincipal.baseParams.fechadesde = fdesde;
		modeloDatos.storeGridPrincipal.baseParams.fechahasta = fhasta;
		
		modeloDatos.storeGridPrincipal.reload({
			params : {
				orden : "LISTAR_PROVEEDORES_X_FILTROS",
				start : 0,
				limit : 20,
				codempresa : codigoempresa, 
				codigo : codpedido,
				codproveedor:codproveedor,
				numdocumento : numdocumento,
				codestado : document.tipopedido,
				fechadesde : fdesde,
				fechahasta : fhasta
			}
		});
	});

	panelCentro.on("dblclick", function() {
				var registro = panelCentro.getSelectionModel().getSelected();
				llamadaPantallaSecundariaDatosPlantilla(registro);
			});

	var llamadaPantallaSecundariaDatosPlantilla = function(registro) {
		if (registro != null) {
			document.pantallaSecundariaProceso.abrirVentana("M", registro.data);
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
					limit : 20
				}
			});
};
