var MantenimientoArticulo = function() {
	var check = new Ext.grid.CheckboxSelectionModel();
	var codigoSistema = "";
	
	var parametrosTransportador = {
		
	};
	
	var renderizadorEstados = function(estado){
		return (estado==1)?"<img src=../../imagenes/flag_green.png alt='Activo'/>"+" Activo":(estado==2)?"<img src=../../imagenes/flag_red.png alt='Inactivo' /> "+" Inactivo":(estado==3)?"<img src=../../imagenes/flag_blue.png alt='Inactivo' /> "+" Anulado":(estado==14)?"<img src=../../imagenes/flag_grey.png alt='Inactivo' /> "+" Liquidado":"<img src=../../imagenes/flag_yellow.png alt='Inactivo' /> "+" En Tránsito";
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
			url : "../../servlet/SAdministracionArticulos",
			autoLoad : true,
			baseParams : {
				orden : "LISTAR_ARTICULOS_FILTROS",
				start : 0,
				limit : 20,
				codempresa : '1',
				codarticulo:'', 
				codalterno:'',
				codestado :'',
				codmarca:'',
				codlinea:'',
				codsublinea:''
			},
			reader : new Ext.data.XmlReader({
						success : "@success",
						record : "articulos",
						totalRecords : "@totalRegistros"
					}, [
						{name : "codagencia"},
						{name : "codarticulo"}, 
						{name : "codalterno"}, 
						{name : "descripcion"},
						{name : "unidadmedida"},
						{name : "unidadpresentacion"},
						{name : "marca"}, 
						{name : "linea"},
						{name : "sublinea"},
						{name : "ucreacion"},
						{name : "ufecha"},
						{name : "codestado"},
						{name : "codbarra"},
						{name : "descripcionlarga"},
						{name : "regsanitario"},
						{name : "codmarca"},
						{name : "codlinea"},
						{name : "codsublinea"},
						{name : "coduproveedor"},
						{name : "codupresentacion"},
						{name : "codumedida"},
						{name : "stock"},
						{name : "codumedida"},
						{name : "aceptadecimales"},
						{name : "calculaivacompra"},
						{name : "incluyeivacompra"},
						{name : "calculaivaventa"},
						{name : "incluyeivaventa"},
						{name : "seinventaria"},
						{name : "vendible"},
						{name : "perecible"},
						{name : "descuentoventa"},
						{name : "descuentomaxventa"},
						{name : "cantultcompra"},
						{name : "fechaultcompra"},
						{name : "cantmin"},
						{name : "cantmax"}
						])
		}),
		columnasGridPrincipal : [new Ext.grid.RowNumberer(), check, 
				{dataIndex : "codagencia",header : "codarticulo",width : 100,hidden : true},
				{dataIndex : "codarticulo", id: "codarticulo",header : "codarticulo",width : 100,hidden : true},
				{dataIndex : "codalterno",header : "Cod. Alterno",width : 100},
				{dataIndex : "descripcion",header : "Descripci&oacute;n",width : 250,hidden : false}, 
				{dataIndex : "unidadmedida",header : "U. Medida", width : 100}, 
				{dataIndex : "unidadpresentacion",header : "U. Medida Presentaci&acute;n", width : 100},
				{dataIndex : "marca",header : "Marca",width : 100,hidden : false},
				{dataIndex : "linea",header : "Linea",width : 100}, 
				{dataIndex : "sublinea",header : "Sublinea",width : 100}, 
				{dataIndex : "ucreacion",header : "U. Creaci&oacute;n",width : 100}, 
				{dataIndex : "ufecha",header : "Fecha Creaci&oacute;n",width : 100},
				//{dataIndex : "codestado",id:"codestado",header : "iva", width : 150,hidden : false, sortable: true, renderer:flagEstado, align:'center'},
				{header: 'Estado', dataIndex: 'codestado', width: 50, sortable: true, hidden:true},
				{header: 'Estado', dataIndex: 'codestado', width: 80, sortable: true, renderer:flagEstado, align:'center'}
		
		]
	};
	
	var panelCentro = new Ext.grid.GridPanel({
		region : "center",
		stripeRows : true,
		border : false,
		//plugins : [accionesCeldas],
		loadMask : true,
		viewConfig:'{autoFill:true}',
		//autoExpandColumn : "codestado",
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
										msg : "Por favor escoja un Articulo para proceder a eliminarlo",
										icon : Ext.Msg.INFO,
										buttons : Ext.Msg.OK
									});
								} else {
									var mensajeConfirmacion = "Est&aacute; seguro que desea Inactivar el Articulo?"
									Ext.MessageBox.confirm(
											"Confirmaci&oacute;n",
											mensajeConfirmacion, function(opc) {
												if (opc == "yes") {
													var codigo = record.get("codarticulo");
													document.pantallaSecundariaProceso.eliminar(codigo);
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
		
	};
	var botonMarca = new Ext.Button({
		text: 'Marca(s)',
		listeners: {
			click: this,
					click: function(){
							SelectorMarcas();
						}
					}
	});
		
	var panelMarca = new Ext.Panel({
		layout:"column",
		border:false,
		height:30,
		items:[
			new Ext.Panel({border:false,columnWidth:0.38,items:[botonMarca]}),
			new Ext.Panel({border:false,columnWidth:0.62,html:"<div style='vertical-align:middle;'><img align='middle' id='iconoSelectorMarcas' src='../../imagenes/exclamation.png'></div>"})
			]
	});
	
	var botonLinea = new Ext.Button({
		text: 'Linea(s)',
		listeners: {
			click: this,
					click: function(){
						SelectorLineas();
						}
					}
	});
		
	var panelLinea = new Ext.Panel({
		layout:"column",
		border:false,
		height:30,
		items:[
			new Ext.Panel({border:false,columnWidth:0.38,items:[botonLinea]}),
			new Ext.Panel({border:false,columnWidth:0.62,html:"<div style='vertical-align:middle;'><img align='middle' id='iconoSelectorLineas' src='../../imagenes/exclamation.png'></div>"})
			]
	});
	
	var botonSubLinea = new Ext.Button({
		text: 'SubLinea(s)',
		listeners: {
			click: this,
					click: function(){
						SelectorSubLineas();
						}
					}
	});
		
	var panelSubLinea = new Ext.Panel({
		layout:"column",
		border:false,
		height:30,
		items:[
			new Ext.Panel({border:false,columnWidth:0.38,items:[botonSubLinea]}),
			new Ext.Panel({border:false,columnWidth:0.62,html:"<div style='vertical-align:middle;'><img align='middle' id='iconoSelectorSubLineas' src='../../imagenes/exclamation.png'></div>"})
			]
	});
	/* componentes de objeto Filtro */
	var componentesFiltro = {
		
		txtCodigo : new Ext.form.TextField({
					fieldLabel : "Cï¿½digo",
					name : "codigo",
					width : 164
				}),
		txtcodalterno : new Ext.form.TextField({
					fieldLabel : "Cod. Alterno",
					name : "txtcodalterno",
					readOnly : false,
					width : 130
					//maskRe : /[\d\.]/,
					//regex : /^\d+(\.\d{1,2})?$/
				}),
		cmbEstado : new Ext.form.ComboBox({ 
					fieldLabel : "Estado",
					allowBlank : false,
					name : "cmbEstado",
					emptyText : "Seleccione uno ...",
					store : new Ext.data.SimpleStore({
								fields : ["codigo", "descripcion"],
								data : [["0", "TODOS"], ["1", "ACTIVO"],
										["2", "INACTIVOS"]]
							}),
					triggerAction : "all",
					mode : "local",
					width : 130,
					typeAhead : false,
					editable : true,
					disabled : false,
					forceSelection : true,
					displayField : "descripcion",
					valueField : "codigo",
					lazyRender : true,
					value: 0
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
				labelWidth : 100, 
				bodyStyle : "padding:6px",
				items : [
						new Ext.form.FieldSet({
							title : "Filtro de Busqueda",
							//autoHeight:true,
							height : 230, 
							style : "padding:10px",
 							width: 290, 
							items : [componentesFiltro.txtcodalterno,
									componentesFiltro.cmbEstado,
									panelMarca,panelLinea,panelSubLinea], 
							buttons : [botones.cmdBorrar, botones.cmdBuscar]
						})]
			});

	/* evento click del boton borrar datos del fitro de busqueda */
	botones.cmdBorrar.on("click", function() {
				componentesFiltro.txtcodalterno.setValue(null);
				componentesFiltro.cmbEstado.setValue(0);
				try {Selectores.marcas.limpiar();} catch (e) {}
				try {Selectores.lineas.limpiar();} catch (e) {}
				try {Selectores.sublineas.limpiar();} catch (e) {} 
				//alert("pedo "+Selectores.marcas.getRegistroSel());
	});

	/* evento click del boton Buscar datos del fitro de busqueda */
	botones.cmdBuscar.on("click", function() {
		//var codigoempresa = componentesFiltro.cmbEmpresa.getValue();
		var Codalterno = componentesFiltro.txtcodalterno.getValue();
		var Codestado = componentesFiltro.cmbEstado.getValue();
		var codmarcas = Selectores.codmarcas;
		var codLineas = Selectores.codlineas;
		var codSubLineas = Selectores.codsublineas;
		//var codigo = componentesFiltro.txtCodigo.getValue();

		//modeloDatos.storeGridPrincipal.baseParams.codempresa = codigoempresa;
		modeloDatos.storeGridPrincipal.baseParams.codalterno = Codalterno;
		modeloDatos.storeGridPrincipal.baseParams.codestado = Codestado;
		modeloDatos.storeGridPrincipal.baseParams.codmarca = codmarcas;
		modeloDatos.storeGridPrincipal.baseParams.codlinea = codLineas;
		modeloDatos.storeGridPrincipal.baseParams.codsublinea = codSubLineas;

		modeloDatos.storeGridPrincipal.reload({
			params : {
				orden : "LISTAR_ARTICULOS_FILTROS",
				start : 0,
				limit : 20,
				codempresa : document.parametrosSesion.codigoEmpresa,
				codarticulo:'', 
				codalterno: Codalterno,
				codestado : Codestado,
				codmarca: codmarcas,
				codlinea: codLineas,
				codsublinea: codSubLineas
			}
		});
	});

	panelCentro.on("dblclick", function() {
				var registro = panelCentro.getSelectionModel().getSelected();
				//alert(registro);
				//var ok = (registro.data);
				//alert(ok.codupresentacion); 
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
					limit : 10
				}
			});
	
	var Selectores = {
		marcas: "",
		lineas: "",
		sublineas:"",
		codmarcas:"",
		codlineas:"",
		codsublineas:""
	};		
	
	/**
	 * Selectores 1.0
	 */
	var SelectorMarcas = function(){
		var JsonRetorno = null;
		var check1 = new Ext.grid.CheckboxSelectionModel({singleSelect:false}); 
		var modelo = {
			storeGrid : new Ext.data.Store({
				url : "../../servlet/SAdministracionUMedidas",
				autoLoad :false,
				baseParams : {
					orden : "AGRUPADOR_MARCAS",
					start : 0,
					limit : 20,
					codempresa : document.parametrosSesion.codigoEmpresa,
					codigo : '0', 
					descripcion : '',
					tiporespuesta : "XML"
				},
				reader : new Ext.data.XmlReader({
							success : "@success",
							record : "marcas",
							totalRecords : "@totalRegistros"
						}, [
							{name : "codigo"},  
							{name : "descripcion"}
							])
			}),
			columnasGrid : [new Ext.grid.RowNumberer(), check1, 
					{dataIndex : "codigo",header : "Codigo Marca",width : 100,hidden : false},
					{dataIndex : "descripcion",header : "Descripci&oacute;n",width : 200,hidden : false}
					]
			
		};
		
			Selectores.marcas = new SelectoresFiltros({
				tituloVentana: "Panel b&uacute;squeda Marcas",
				ancho: 400,
				alto: 500,
				store : modelo.storeGrid,
				cm : modelo.columnasGrid,
				registrosPorPagina: 20,
				tituloOpcionCodigo:"Codigo",
				tituloOpcionDescripcion:"Descripcion",
				apuntador : this,
				sm: check1,
				valoresPrecargados: Selectores.codmarcas,
				nombreSelector: "iconoSelectorMarcas"
			});
			
			this.seleccionados = function(data){
				Selectores.codmarcas = data.toString();
			};
			
			Selectores.marcas.abrirVentanaFiltros();
	};
	
	/**
	 * Selectores 1.0
	 */
	var SelectorLineas = function(){
		var JsonRetorno = null;
		var check1 = new Ext.grid.CheckboxSelectionModel({singleSelect:false}); 
		var modelo = {
			storeGrid : new Ext.data.Store({
				url : "../../servlet/SAdministracionUMedidas",
				autoLoad :false,
				baseParams : {
					orden : "AGRUPADOR_LINEAS",
					start : 0,
					limit : 20,
					codempresa : document.parametrosSesion.codigoEmpresa,
					codigo : '0', 
					descripcion : '',
					tiporespuesta : "XML"
				},
				reader : new Ext.data.XmlReader({
							success : "@success",
							record : "lineas",
							totalRecords : "@totalRegistros"
						}, [
							{name : "codigo"},  
							{name : "descripcion"}
							])
			}),
			columnasGrid : [new Ext.grid.RowNumberer(), check1, 
					{dataIndex : "codigo",header : "Codigo Linea",width : 100,hidden : false},
					{dataIndex : "descripcion",header : "Descripci&oacute;n",width : 100,hidden : false}
					]
			
		};
		
			Selectores.lineas = new SelectoresFiltros({
				tituloVentana: "Panel b&uacute;squeda Lineas",
				ancho: 400,
				alto: 500,
				store : modelo.storeGrid,
				cm : modelo.columnasGrid,
				registrosPorPagina: 20,
				tituloOpcionCodigo:"Codigo",
				tituloOpcionDescripcion:"Descripcion",
				apuntador : this,
				sm: check1,
				valoresPrecargados: Selectores.codlineas,
				nombreSelector: "iconoSelectorLineas"
			});
			
			this.seleccionados = function(data){
				Selectores.codlineas = data.toString();
			};
			
			Selectores.lineas.abrirVentanaFiltros();
	};
	
	/**
	 * Selectores 1.0
	 */
	var SelectorSubLineas = function(){
		var JsonRetorno = null;
		var check1 = new Ext.grid.CheckboxSelectionModel({singleSelect:false}); 
		var modelo = {
			storeGrid : new Ext.data.Store({
				url : "../../servlet/SAdministracionUMedidas",
				autoLoad :false,
				baseParams : {
					orden : "AGRUPADOR_SUBLINEAS",
					start : 0,
					limit : 20,
					codempresa : document.parametrosSesion.codigoEmpresa,
					codigo : '0', 
					descripcion : '',
					tiporespuesta : "XML"
				},
				reader : new Ext.data.XmlReader({
							success : "@success",
							record : "sublineas",
							totalRecords : "@totalRegistros"
						}, [
							{name : "codigo"},  
							{name : "descripcion"}
							])
			}),
			columnasGrid : [new Ext.grid.RowNumberer(), check1, 
					{dataIndex : "codigo",header : "Codigo SubLinea",width : 100,hidden : false},
					{dataIndex : "descripcion",header : "Descripci&oacute;n",width : 100,hidden : false}
					]
			
		};
		
			Selectores.sublineas = new SelectoresFiltros({
				tituloVentana: "Panel b&uacute;squeda SubLineas",
				ancho: 400,
				alto: 500,
				store : modelo.storeGrid,
				cm : modelo.columnasGrid,
				registrosPorPagina: 20,
				tituloOpcionCodigo:"Codigo",
				tituloOpcionDescripcion:"Descripcion",
				apuntador : this,
				sm: check1,
				valoresPrecargados: Selectores.codsublineas,
				nombreSelector: "iconoSelectorSubLineas"
			});
			
			this.seleccionados = function(data){
				//alert(data);
				Selectores.codsublineas = data.toString();
			};
			
			Selectores.sublineas.abrirVentanaFiltros();
	};
};
