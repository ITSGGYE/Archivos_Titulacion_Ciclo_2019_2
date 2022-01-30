var ConfiguracionArticulo = function() {
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
		
		storeGridPrincipal : configuracion.store,
		
		columnasGridPrincipal :	configuracion.cm
		
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
						alert("edo");
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
						alert("edo");
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
						alert("edo");
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
					fieldLabel : "Descripci&oacute;n",
					name : "txtcodalterno",
					readOnly : false,
					width : 130,
					maskRe:/[A-Za-z. ]/,
					listeners : {
						specialkey : function(t, e) {
							if (e.getKey() === e.ENTER || e.TAB) {
								botones.cmdBuscar.fireEvent("click");
				            }
						}
					}
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
							height : 120, 
							style : "padding:10px",
 							width: 290, 
							items : [componentesFiltro.txtcodalterno], 
							buttons : [botones.cmdBorrar, botones.cmdBuscar]
						})]
			});

	/* evento click del boton borrar datos del fitro de busqueda */
	botones.cmdBorrar.on("click", function() {
		componentesFiltro.txtcodalterno.setValue(null);
	});

	/* evento click del boton Buscar datos del fitro de busqueda */
	botones.cmdBuscar.on("click", function() {
		
		var descripcion = componentesFiltro.txtcodalterno.getValue();

		modeloDatos.storeGridPrincipal.baseParams.descripcion = descripcion;

		modeloDatos.storeGridPrincipal.reload({
			params : {
				orden : "LISTARMARCASFILTROS",
				start : 0,
				limit : 20,
				codempresa: document.parametrosSesion.codigoEmpresa, 
				codigo : '0',
				descripcion: descripcion,
				tiporespuesta:"XML"
			}
		});
	});

	panelCentro.on("dblclick", function() {
				var registro = panelCentro.getSelectionModel().getSelected();
				//llamadaPantallaSecundariaDatosPlantilla(registro);
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
};
