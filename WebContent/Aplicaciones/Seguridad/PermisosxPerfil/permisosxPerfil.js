var MantenimientoArticulo = function() {
	var check = new Ext.grid.CheckboxSelectionModel();
	var codigoSistema = "";
	
	var storeGrid = {
		storePerfiles : new Ext.data.Store({
					url : "../../servlet/SAdminitracionPermisosxPerfil",
					autoLoad : true,
					baseParams : { 
						orden : "LISTAR_PERFILES",
						codempresa : document.parametrosSesion.codigoEmpresa,
						start : 0,
						limit : 0
					},
					reader : new Ext.data.XmlReader({
								success : "@success",
								record : "perfil",
								totalRecords : "@total_registros"
							}, [
								{name : "codPerfil"},
								{name : "descripcion"}
							   ]),
					listeners: {
						load: function(){
							combo5.setValue(1)
						}
					}
				}),
		storeModulos:  new Ext.data.Store({
					url : "../../servlet/SAdminitracionPermisosxPerfil",
					autoLoad : true,
					baseParams : { 
						orden : "LISTAR_MODULOS",
						codempresa : document.parametrosSesion.codigoEmpresa,
						start : 0,
						limit : 0
					},
					reader : new Ext.data.XmlReader({
								success : "@success",
								record : "modulos"
							}, [
								{name : "codigo"},
								{name : "descripcion"}
							   ]),
					listeners: {
						load: function(){
							combo3.setValue(0);
						}
					}
				})
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
			url : "../../servlet/SAdminitracionPermisosxPerfil",
			autoLoad : false,
			baseParams : {
				orden : "LISTAR_PERMISOS_PERFILES",
				start : 0,
				limit : 20,
				codempresa : document.parametrosSesion.codigoEmpresa,
				codperfil : 0,
				modulo: ''
			},
			reader : new Ext.data.XmlReader({
						success : "@success",
						record : "permisoxPerfil",
						totalRecords : "@totalRegistros" 
					}, [
											
						{name : "codOpcion"},
						{name : "titOpcion"},
						{name : "modulo"}, 
						{name : "abrir"}, 
						{name : "agregar"},
						{name : "modificar"},
						{name : "eliminar"},
						{name : "codPermisoxPerfil"}, 
						{name : "codPadre"},
						{name : "tipoPrograma"}
					])
		}), 
		columnasGridPrincipal : [new Ext.grid.RowNumberer(), check, 
				{dataIndex : "codOpcion",header : "codOpcion",width : 100,hidden : true},
				{dataIndex : "titOpcion",header : "Titulo",width : 250,hidden : false},
				{dataIndex : "modulo", id: "modulo",header : "Modulo",width : 100,hidden : false,align:'center'},
				{dataIndex : "abrir",header : "Puede abrir",width : 100,renderer: flagPermiso,align:'center'},
				{dataIndex : "agregar",header : "Puede agregar",width : 250,hidden : false,hidden : true}, 
				{dataIndex : "modificar",header : "Puede modificar", width : 100,hidden : true}, 
				{dataIndex : "eliminar",header : "Puede Eliminar", width : 100,hidden : true},
				{dataIndex : "codPermisoxPerfil",header : "codpermiso",width : 100,hidden : true},
				{dataIndex : "codPadre",header : "cod padre",width : 100,hidden : true}, 
				{dataIndex : "tipoPrograma",header : "tipo programa",width : 100,hidden : true}		
		]
	};
	/***/
	// ComboBox creation
		var combo3 = new Ext.form.ComboBox({
			 fieldLabel : "Modulos",
			 displayField : "descripcion",
	     	 valueField : "codigo",
			 store: storeGrid.storeModulos,
			 triggerAction : "all",
			 editable : false,
			 hiddenName : "cmbmodulos",
			 mode : "local",
			 width:150,
			 emptyText: 'Seleccione Modulo...',
			 allowBlank : false,
			 disabled : false
		});
		
		// put ComboBox in a Menu
		var menu = new Ext.menu.Menu({
		    id: 'mainMenu',
		    items: [
		        combo3 // A Field in a Menu
		    ]
		});
	
	/***/
	var labelcombo = new Ext.form.Label({
		fieldLabel : "<b>Perfil :</b> ", html:"<b>Perfil : </b> ",labelSeparator: ':'
	});
	
	var labelModulo = new Ext.form.Label({
		fieldLabel : "<b>Modulo :</b> ", html:"<b>Modulo : </b> ",labelSeparator: ':'
	});
	
	var btnguardarperfil = new Ext.Toolbar.Button({
		text : "GUARDAR ",
		icon : "../../imagenes/disk_black.png",
		cls : "x-btn-text-icon" 
	});
	var colorsStore = new Ext.data.SimpleStore({
		 fields: ['name'],
		 data: [['Blue'],['Red'],['White']]
	});
	var combo5 = new Ext.form.ComboBox({ 
		 fieldLabel : "Perfiles",
		 displayField : "descripcion",
     	 valueField : "codPerfil",
		 store: storeGrid.storePerfiles,
		 triggerAction : "all",
		 editable : false,
		 hiddenName : "cmbperfiles",
		 mode : "local",
		 width:150,
		 emptyText: 'Seleccione Perfil...',
		 allowBlank : false,
		 disabled : false
		 });
		 // Get a reference to the combobox using Ext.getCmp(id).
		  
	
	var panelCentro = new Ext.grid.EditorGridPanel({
		region : "center",
		//stripeRows : true, 
		border : false,
		//plugins : [accionesCeldas],
		loadMask : true,
		//viewConfig:'{autoFill:true}',
		//autoExpandColumn : "codestado", 
		store : modeloDatos.storeGridPrincipal,
		columns : modeloDatos.columnasGridPrincipal,
		tbar : new Ext.Toolbar({
			id:"tb",
			items : [{xtype : "tbseparator"},
					 labelcombo,
					 '  ',
					 combo5,
					 {xtype : "tbseparator"},
					 labelModulo,
					 ' ',
					 combo3,
					 ' ',
					 btnguardarperfil					 
					]
		}),
		stripeRows:true,
	   /* viewConfig:{			     
	    getRowClass : function (row, index) {
                        var cls = ''; 
                        var stock = parseInt(row.get('stock'));
                        var min = parseInt(row.get('cantmin'));
                        var max = parseInt(row.get('cantmax'));
                        //alert(row.get('stock')+" "+row.get('cantmin'));
                        if(stock <= min){
                               cls = 'requiereStock';
                        }else
                        if(stock >= min){ 
                        	if(stock >= max){
                        		cls = 'demasiadoStock';
                        	}else{
                               cls = 'noRequiereStock';
                        	}   
                        }
                        return cls; 
                        stock = 0; min = 0; max = 0;
                     }			
                   },*/
		bbar : new Ext.PagingToolbar({
					store : modeloDatos.storeGridPrincipal, 
					displayInfo : true,
					displayMsg : "Mostrando {0} - {1} de {2}",
					pageSize : 10
				}) 
	});
	
	//añadir Todos a ComboBox 
	//var tipoTodos=Ext.data.Record.create([ {name: 'codPerfil'}, {name: 'descripcion'}]);	
	//var filaTodos =new tipoTodos({codPerfil: '0',descripcion: "TODOS"});
	//storeGrid.storePerfiles.on('load', function(){ storeGrid.storePerfiles.insert(0, filaTodos);});
    	
	var storeCombos = {
		storeBodegasxAgencias5 : new Ext.data.Store({
					reader : new Ext.data.XmlReader({
								success : "@success",
								record : "bodega"
							}, [
								{name : "codigo"},
								{name : "descripcion"}
							   ]),
					url : "../../servlet/SAdministracionBodegas",
					autoLoad : true,
					baseParams : { 
						orden : "LISTAR_BODEGASXAGENCIAS",
						codempresa : document.parametrosSesion.codigoEmpresa,
						codagencia : document.parametrosSesion.codigoAgencia
					}
					
				})
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
					fieldLabel : "Cod. Alterno",
					name : "txtcodalterno",
					readOnly : false,
					width : 130,
					listeners : {
						specialkey : function(t, e) {
							if (e.getKey() === e.ENTER || e.TAB) {
								botones.cmdBuscar.fireEvent("click");
                            }
						}
					}
					//maskRe : /[\d\.]/,
					//regex : /^\d+(\.\d{1,2})?$/
				}),
		cmbBodegasxAgencias2 : new Ext.form.ComboBox({
					id:"cmbBodegasxAgencias2",
					fieldLabel : "<b>BODEGA</b>",
					valueField : "codigo",
					displayField : "descripcion",
					store : new Ext.data.Store({
							
							url : "../../servlet/SAdministracionBodegas",
							autoLoad : true,
							baseParams : {
								orden : "LISTAR_BODEGASXAGENCIAS",
								codempresa : document.parametrosSesion.codigoEmpresa,
								codagencia : document.parametrosSesion.codigoAgencia
							},
							reader : new Ext.data.XmlReader({
								record : "bodega",
								totalRecords : "@total_registros"
							}, [
								{name : "codigo"}, 
								{name : "descripcion"}
							   ])
						}),
					triggerAction : "all",
					editable : false,
					//hiddenName : "estadopedido",
					mode : "local",
					width:130,
					emptyText : "Seleccion..",
					allowBlank : false,
					disabled : false
					
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
							items : [ 
									//combo5,
									componentesFiltro.cmbBodegasxAgencias2,
									componentesFiltro.txtcodalterno,
									componentesFiltro.cmbEstado,
									panelMarca,panelLinea,panelSubLinea], 
							buttons : [botones.cmdBorrar, botones.cmdBuscar]
						})]
			});

	/* evento click del boton borrar datos del fitro de busqueda */
	botones.cmdBorrar.on("click", function() {
				componentesFiltro.txtcodalterno.setValue(null);
				componentesFiltro.cmbEstado.setValue(0);
				componentesFiltro.cmbBodegasxAgencias2.setValue(1);
				//componentesFiltro.cmbDocumentos.setValue(null);
				//componentesFiltro.txtCodigo.setValue(null);
	});

	/* evento click del boton Buscar datos del fitro de busqueda */
	botones.cmdBuscar.on("click", function() {
		//var codigoempresa = componentesFiltro.cmbEmpresa.getValue();
		//var Codalterno = componentesFiltro.txtcodalterno.getValue();
		var Codestado = componentesFiltro.cmbEstado.getValue();
		var codbodega = componentesFiltro.cmbBodegasxAgencias2.getValue();
		var codart = componentesFiltro.txtcodalterno.getValue();

		//modeloDatos.storeGridPrincipal.baseParams.codempresa = codigoempresa;
		modeloDatos.storeGridPrincipal.baseParams.codperfil = codbodega;
		modeloDatos.storeGridPrincipal.baseParams.modulo = codart;
		
		modeloDatos.storeGridPrincipal.reload({
			params : {
				orden : "LISTAR_ARTICULOS_FILTROS",
				start : 0,
				limit : 20,
				codempresa : document.parametrosSesion.codigoEmpresa,
				codperfil : combo5.getValue(),
				modulo: combo3.getValue()
			}
		});
		
	});

	panelCentro.on('rowclick',function(grid,index,column, e) {
		var sel = panelCentro.getSelectionModel().getSelectedCell();
		var x = panelCentro.store.getAt(sel[0]).get("abrir");
		switch (sel[1]){
			case 5:
				if(x=='S'){
					panelCentro.store.getAt(sel[0]).set("abrir",'N');
				}else{
					panelCentro.store.getAt(sel[0]).set("abrir",'S');		
				}
			break;
		}
		
		panelCentro.store.commitChanges();
		panelCentro.getView().refresh();
	});

	var llamadaPantallaSecundariaDatosPlantilla = function(registro) {
		if (registro != null) {
			//	document.pantallaSecundariaProceso.abrirVentana("M", registro.data);
		}
	};

	var pantallaPrincipal = new PantallaPrincipalLocal({
				usaPanelFiltros : false,
				panelFiltros : panelFiltro,
				panelCentro : panelCentro
			});
	
	var buscarPermiso = function (){
		var Codperfil = combo5.getValue();
		var codModulo = (combo3.getValue()==0?'':combo3.getValue());

		//modeloDatos.storeGridPrincipal.baseParams.codempresa = codigoempresa;
		modeloDatos.storeGridPrincipal.baseParams.codperfil = Codperfil;
		modeloDatos.storeGridPrincipal.baseParams.modulo = codModulo;
	
		modeloDatos.storeGridPrincipal.reload({
			params : {
				orden : "LISTAR_PERMISOS_PERFILES",
				start : 0,
				limit : 20,
				codempresa : document.parametrosSesion.codigoEmpresa,
				codperfil :Codperfil,
				modulo: codModulo
			}
		});
	}			

	combo3.on("select",function(){
		buscarPermiso();
	});
	
	combo5.on("select",function(){
		buscarPermiso();
	})
	
	/* Actualiza los datos de la pantalla principal */
	this.actualizarGridPrincipal = function() {
		modeloDatos.storeGridPrincipal.removeAll();
		modeloDatos.storeGridPrincipal.load({
					params : {
						start : 0,
						limit : 20,
						codempresa : document.parametrosSesion.codigoEmpresa,
						codperfil : combo5.getValue(),
						modulo: combo3.getValue()
					}
				});			
	};
	
	/*
	modeloDatos.storeGridPrincipal.load({
				params : { 
					start : 0,
					limit : 10
				}
			});
	*/
	componentesFiltro.cmbBodegasxAgencias2.on("select",function(){
		botones.cmdBuscar.fireEvent("click");
	});
	
	this.validarStock = function(){ 
		
		var store = panelCentro.getStore();
		var e = 1;
		alert("chi");
		store.each(function(record){
			if(record.get('codbodega')){
				if((record.get('stock')*1)>1){
			 		panelCentro.getView().getRow(e).style.backgroundColor = 'LightBlue';
			 	}else{
			 		panelCentro.getView().getRow(e).style.backgroundColor = 'LightYellow';
			 	}
			}
			e++;
		});	
	};
	
	panelCentro.on("active",function(grid,index,e){
		var clickedRow = grid.store.getAt(index);
                    alert(Ext.encode(clickedRow.data));
	});
	
	var reportePromocion = null;
	
	function preparaParametros(){
		var parametrosReporte = [
		    {key:"codempresa",value: document.parametrosSesion.codigoEmpresa},
			{key:"codagencia",value: document.parametrosSesion.codigoAgencia},
			{key:"codusuario",value: document.parametrosSesion.codigoUsuario},
			{key:"desagencia",value: document.parametrosGlobal.nombreAgencia},
			{key:"codbodegas", value: componentesFiltro.cmbBodegasxAgencias2.getValue()},
			{key:"codarti",value: componentesFiltro.txtcodalterno.getValue()},
			{key:"codestado", value: componentesFiltro.cmbEstado.getValue()}
		];
		reportePromocion = new CreadorReportes("REPORTE_STOCK_BODEGAS",null);
		reportePromocion.modificarParametros(parametrosReporte);		
	};
	
	var imprimirPDF = function (){
		preparaParametros(); 
		var tiraOrden = reportePromocion.obtenerTiraReporte(TiposExportacion.PDF);
		window.open(tiraOrden);
	};
	
	var exportarXLS = function (){
		preparaParametros(); 
		var tiraOrden = reportePromocion.obtenerTiraReporte(TiposExportacion.XLS);
		window.open(tiraOrden);
	};
	
	var visualizarPDF = function (){
		preparaParametros(); 
		var tiraOrden = reportePromocion.obtenerTiraReporte(TiposExportacion.VER_PDF);
		window.open(tiraOrden);
	};
	
	function obtenerJSONGrid(grilla){
		datos =  grilla.store;
		var cadena = "{data:[";
		var obj = ""; 
			
		for(i=0;i<datos.getCount();i++){
			record = datos.getAt(i);
			obj=record.data;
			if(obj.codalterno != ""){
				cadena += Ext.util.JSON.encode(record.data) + ",";
			}
		}
	
		cadena = cadena.substring(0,cadena.length-1) + "]}";
		
		return(cadena);
	}
	
	btnguardarperfil.on("click",function(){
		var cadena = obtenerJSONGrid(panelCentro);
		
		var paramsGuardar = {
			url : "../../servlet/SAdminitracionPermisosxPerfil",
			params : {
					orden : "GUARDAR_PERMISOS",
					codempresa : document.parametrosSesion.codigoEmpresa,
			        codperfil : combo5.getValue(),
			        detalle : cadena
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
	    		msg: "Eroor",//getMensajeAjax(A,B,'msg'),
	    		buttons: Ext.MessageBox.OK,
	    		icon: Ext.MessageBox.ERROR
	   			});
			}
		}
		
		Ext.Ajax.request(paramsGuardar);
	});
};
