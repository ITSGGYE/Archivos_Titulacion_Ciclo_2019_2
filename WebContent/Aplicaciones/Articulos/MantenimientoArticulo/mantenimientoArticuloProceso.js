var MantenimientoArticuloProceso = function() {

	var configuraciones = {
		apuntador : this,
		modoActual : null,
		parametro_cambiofecha : null,
		parametro_bloqueo : null,
		codProveedor : null
	};
	
	var agruparCamposPanelx3 = function(componenteA,componenteB,componenteC,porcentajeComponenteA,porcentajeComponenteB,porcentajeComponenteC,anchoPanel,labelWidth1,labelWidth2,labelWidth3){		
		var panelContenedor = new Ext.Panel({
			border:false,
			width:anchoPanel,
			layout:"column",
			//labelWidth:labelWidth,
			items:[
				new Ext.Panel({border:false,layout:"form",columnWidth:porcentajeComponenteA,items:[componenteA],labelWidth:labelWidth1}),
				new Ext.Panel({border:false,layout:"form",columnWidth:porcentajeComponenteB,items:[componenteB],style:"text-align:'center';margin-left:8px",labelWidth:labelWidth2}),
				new Ext.Panel({border:false,layout:"form",columnWidth:porcentajeComponenteC,items:[componenteC],labelWidth:labelWidth3})
			]
		});
		
		return panelContenedor;
	};
	
	var agruparCamposPanel = function(componenteA,componenteB,porcentajeComponenteA,porcentajeComponenteB,anchoPanel,labelWidth1,labelWidth2){		
		var panelContenedor = new Ext.Panel({
			border:false,
			width:anchoPanel,
			layout:"column",
			//labelWidth:labelWidth,
			items:[
				new Ext.Panel({border:false,layout:"form",columnWidth:porcentajeComponenteA,items:[componenteA],labelWidth:labelWidth1}),
				new Ext.Panel({border:false,layout:"form",columnWidth:porcentajeComponenteB,items:[componenteB],style:"text-align:'center';margin-left:8px",labelWidth:labelWidth2})
			]
		});
		
		return panelContenedor;
	};
	
	var campoCabecera = [["S", "S"], ["1", "1"], ["2", "2"], ["3", "3"]];

	var ptr = this;

	var parametrosTransportador = {
		
		listarDetallePlantillas : {
			orden : "LISTAR_DETALLE_PLANTILLA",
			nombreMetodo : "obtenerDetallePlantilla",
			tipo : "XML",
			parametros : [{
						nombre : "codempresa",
						prototipo : "long",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codplantilla",
						prototipo : "String", 
						tipoParametro : "NORMAL"
					}]
		},
		
		consultarPlantilla : {
			orden : "CONSULTAR_PLANTILLA",
			nombreMetodo : "consultarPlantilla",
			tipo : "JSON",
			parametros : [{
						nombre : "codplantilla",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codempresa",
						prototipo : "long",
						tipoParametro : "NORMAL"
					}]
		},
		eliminarPlantilla : {
			orden : "ELIMINAR_PLANTILLA",
			nombreMetodo : "eliminarPlantilla",
			tipo : "JSON",
			parametros : [{
						nombre : "codplantilla",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codempresa",
						prototipo : "long",
						tipoParametro : "NORMAL"
					}]
		}
	};

	

	var storeDatos = {
		
	

		storeComboEmpresasLocal : new Ext.data.SimpleStore({
					autoLoad : true,
					fields : ["codigo", "descripcion"],
					data : [["1", "HUMTRUSA S.A"]]
				}),
		storeComboFormaPago : new Ext.data.SimpleStore({
					autoLoad : true,
					fields : ["codigo", "descripcion"],
					data : [["1", "CONTADO"],
							["2", "5 DIAS"],
							["3", "15 DIAS"],
							["4", "30 DIAS"],
							["5", "60 DIAS"]]
				}),
		storeComboEstadoPedido : new Ext.data.SimpleStore({
					autoLoad : true,
					fields : ["codigo", "descripcion"],
					data : [["0", "NUEVO"],
							["1", "ACTIVO"],
							["2", "APROBADO"],
							["3", "ANULADO"],
							["4", "COMPLETO"]]
				})
	
	};


	var componentesxempresa = {
		txtStockMinimo: new Ext.form.TextField({name:"stockMinimo",fieldLabel:"Stock M&iacute;nimo",maskRe:/[0-9,.]/,cls:"campo_numerico",allowBlank:false}),
		txtStockMaximo: new Ext.form.TextField({name:"stockMaximo",fieldLabel:"Stock M&aacute;ximo",maskRe:/[0-9,.]/,cls:"campo_numerico",allowBlank:false}),
		chkSeInventaria:  new Ext.form.Checkbox({name:"seInventaria",fieldLabel:"Se Inventar&iacute;a"}),
		txtStockMinimo: new Ext.form.TextField({name:"stockMinimo",fieldLabel:"Stock M&iacute;nimo",maskRe:/[0-9,.]/,cls:"campo_numerico",allowBlank:false}),
		txtPrecioCompra: new Ext.form.NumberField({name:"precioCompra",fieldLabel:"Precio Ult Compra Dolares",decimalPrecision:6,allowBlank:false,allowDecimals:true}),
		txtPorcDescuentoCompra: new Ext.form.TextField({name:"porcDescuentoCompra",fieldLabel:"% Dsct. Compra",maskRe:/[0-9]/,cls:"campo_numerico",allowBlank:false}),
		txtPorcDescuentoVenta: new Ext.form.TextField({name:"porcDescuentoVenta",fieldLabel:"% Dsct. Base Venta",maskRe:/[0-9]/,cls:"campo_numerico",allowBlank:false}),
		txtPorcDescuentoMaximo: new Ext.form.TextField({name:"porcDescuentoMaximo",fieldLabel:"% Dsct. Maximo Venta",maskRe:/[0-9]/,cls:"campo_numerico",allowBlank:false}),
		txtStockEmpresa: new Ext.form.TextField({name:"stockEmpresa",width:80,fieldLabel:"Stock General",readOnly:true}),
		txtUltimaCompra: new Ext.form.TextField({name:"ultimaCompra",fieldLabel:"P. Ultima Compra",maskRe:/[0-9]/,allowBlank:true, readOnly: true}),
		txtFechaUltimaCompra: new Ext.form.TextField({name:"fechaUltimaCompra",fieldLabel:"Fecha Ultima Compra",allowBlank:true, readOnly: true}),
		chkIncluyeIvaVenta: new Ext.form.Checkbox({name:"incluyeIvaVenta",fieldLabel:"Incluye IVA Vta."}),
		chkVendible:  new Ext.form.Checkbox({name:"vendible",fieldLabel:"Vendible"}),		
		
		tfMarca : new Ext.form.TriggerField({
				fieldLabel : "Marca",
				triggerClass :"x-form-browse-trigger",
				allowBlank : false,
				width: 100,
				onTriggerClick : function() {
					abrirAgrupadorMarcas(); 
				},
				listeners : {
					//scope : this,
					specialkey : function(t, e) {
						//alert("listener special key ");
						AgrupadorxSpecialKey();
					}
				}
		}),
		txtMarca : new Ext.form.TextField({id:"txtMarca",
				fieldLabel : "",
				name : "txtMarca",
				labelSeparator :" ",
				readOnly : false,
				width : 150
		}),
		tfLinea : new Ext.form.TriggerField({
				fieldLabel : "Linea",
				triggerClass :"x-form-browse-trigger",
				allowBlank : false,
				width: 100,
				onTriggerClick : function() {
					abrirAgrupadorLineas();
				},
				listeners : {
					specialkey : function(t, e) {
						AgrupadorLineaSpecialKey();
					}
				}
		}),
		
		txtLinea : new Ext.form.TextField({id:"txtLinea",
				fieldLabel : "",
				name : "txtLinea",
				labelSeparator :" ",
				readOnly : false,
				width : 150
		}),
		tfSublineas : new Ext.form.TriggerField({
				fieldLabel : "Sublinea",
				triggerClass :"x-form-browse-trigger",
				allowBlank : false,
				width: 100,
				onTriggerClick : function() {
					abrirAgrupadorSubLineas();
				},
				listeners : {
					specialkey : function(t, e) {
						AgrupadorSubLineaSpecialKey();
					}
				}
		}),
		txtSubLinea : new Ext.form.TextField({id:"txtSubLinea",
				fieldLabel : "",
				name : "txtSubLinea",
				labelSeparator :" ",
				readOnly : false,
				width : 150
		})
	}
		
	var componentes = {
		
		txtcodArticulo : new Ext.form.TextField({
					fieldLabel : "Cod. Articulo",
					name : "txtcodArticulo",
					readOnly : true,
					width : 164,
					value : "",
					allowBlank: true,
					disabled : true,
					emptyText : "Cod. Articulo",
					lazyRender : true		
		}),
		
		txtcodAlterno : new Ext.form.TextField({
					fieldLabel : "Cod. Alterno",
					name : "txtcodAlterno",
					readOnly : false,
					width : 164,
					value : "",
					readOnly:false,
					allowBlank: false,
					disabled : false,
					emptyText : "Cod. Alterno",
					lazyRender : true		
		}),
		
		txtcodBarra : new Ext.form.TextField({
					fieldLabel : "Cod. Barra",
					name : "txtcodBarra",
					readOnly : false,
					width : 164,
					value : "",
					readOnly:false,
					allowBlank: true,
					disabled : false,
					emptyText : "Cod. Barra"
		}),
		
		txtdescripcion: new Ext.form.TextField({
					fieldLabel : "Descripci&oacute;n",
					name : "txtdescipcion",
					readOnly : false,
					width : 164,
					value : "",
					readOnly:false,
					allowBlank: true,
					disabled : false,
					emptyText : "Descripcion"
		}),
			
		txtdescripcioncorta: new Ext.form.TextField({
					fieldLabel : "Descripci&oacute;n corta",
					name : "txtdescipcion",
					readOnly : false,
					width : 164,
					value : "",
					readOnly:false,
					allowBlank: false,
					disabled : false,
					emptyText : "Descripcion corta"
		}),
		
		chkCalculaIvaVenta: new Ext.form.Checkbox({name:"calculaIva",fieldLabel:"Calcula IVA Vta.", checked: true /*readOnly: true*/}),
		chkCalculaIvaCompra: new Ext.form.Checkbox({name:"calculaIvaCompras",fieldLabel:"Calcula IVA Compra", checked: true /*readOnly: true*/}),
		chkIncluyeIvaCompra: new Ext.form.Checkbox({name:"incluyeIvaCompra",fieldLabel:"Incl. IVA Compra"}),
		chkEsPerecible: new Ext.form.Checkbox({name:"perecible",fieldLabel:"<b>ART. PERECIBLE</b>"}),
		chkAceptaDecimales: new Ext.form.Checkbox({name:"aceptaDecimales",fieldLabel:"Acepta Decimales"}),
		
		tfunidadPresentacion : new Ext.form.TriggerField({
				fieldLabel : "U.Presentac..",
				triggerClass :"x-form-browse-trigger",
				allowBlank : false,
				width : 100,
				onTriggerClick : function() {
					abrirAgrupadorUnidadesMedidas("upresentacion");
				},
				listeners : {
					specialkey : function(t, e) {
						AgrupadorUMedidaSpecialKey("upresentacion");
					}
				}
		}),
		txtunidadPresentacion : new Ext.form.TextField({id:"txtunidadPresentacion",
				fieldLabel : "",
				name : "txtunidadPresentacion",
				labelSeparator :" ",
				readOnly : false,
				width : 150
		}),
		
		tfunidadProveedor : new Ext.form.TriggerField({
				fieldLabel : "U.Proveedor",
				triggerClass :"x-form-browse-trigger",
				allowBlank : false,
				width : 100,
				onTriggerClick : function() {
					abrirAgrupadorUnidadesMedidas("uproveedor");
				},
				listeners : {
					specialkey : function(t, e) {
						AgrupadorUMedidaSpecialKey("uproveedor");
					}
				}
		}),
		txtunidadProveedor : new Ext.form.TextField({id:"txtunidadProveedor",
				fieldLabel : "",
				name : "txtunidadProveedor",
				labelSeparator :" ",
				readOnly : false,
				width : 150
		}),
		
		tfunidadMedida : new Ext.form.TriggerField({
				fieldLabel : "U.Medida", 
				triggerClass :"x-form-browse-trigger",
				allowBlank : false,
				width : 100,
				onTriggerClick : function() {
					abrirAgrupadorUnidadesMedidas("umedida");
				},
				listeners : {
					specialkey : function(t, e) {
						AgrupadorUMedidaSpecialKey("umedida");
					}
				}
		}),
		txtunidadMedida : new Ext.form.TextField({id:"txtunidadMedida",
				fieldLabel : "",
				name : "txtunidadMedida",
				labelSeparator :" ",
				readOnly : false,
				width : 150
		}),
		
		txtregistroSan: new Ext.form.TextField({
					fieldLabel : "Registro Sanitario",
					name : "txtregistroSan",
					readOnly : false,
					width : 164,
					value : "",
					readOnly:false,
					allowBlank: true,
					disabled : false,
					emptyText : "Registro Sanitario"
		})
		
		
	};
	
	componentes.chkCalculaIvaCompra.on("check",function(checked){
		if(checked.getValue()){
			componentes.chkIncluyeIvaCompra.setValue(false);
		}else{
			componentes.chkIncluyeIvaCompra.setValue(true);
		}
	});
	componentes.chkIncluyeIvaCompra.on("check",function(checked){
		if(checked.getValue()){
			componentes.chkCalculaIvaCompra.setValue(false);
		}else{
			componentes.chkCalculaIvaCompra.setValue(true);
		}
	});
	
	componentes.chkCalculaIvaVenta.on("check",function(checked){
		if(checked.getValue()){
			componentesxempresa.chkIncluyeIvaVenta.setValue(false);
		}else{
			componentesxempresa.chkIncluyeIvaVenta.setValue(true);
		}
	});
	componentesxempresa.chkIncluyeIvaVenta.on("check",function(checked){
		if(checked.getValue()){ 
			componentes.chkCalculaIvaVenta.setValue(false);
		}else{
			componentes.chkCalculaIvaVenta.setValue(true);
		}
	});
	/*
	 * componentes.cmbEmpresas.on("select",function(){
	 * componentes.cmbFechas.store.baseParams.codempresa =
	 * componentes.cmbEmpresas.getValue();
	 * componentes.cmbObservaciones.store.baseParams.codempresa =
	 * componentes.cmbEmpresas.getValue();
	 * componentes.cmbAgencias.store.baseParams.codigoEmpresa =
	 * componentes.cmbEmpresas.getValue(); componentes.cmbAgencias.store.load();
	 * componentes.cmbAgencias.setValue(""); componentes.cmbAgencias.enable();
	 * });

	componentes.cmbSistemas.on("select", function() {
		componentes.cmbFechas.store.baseParams.codsistema = componentes.cmbSistemas
				.getValue();
		componentes.cmbObservaciones.store.baseParams.codsistema = componentes.cmbSistemas
				.getValue();
		componentes.cmbDocumentos.store.baseParams.codsistema = componentes.cmbSistemas
				.getValue();
		componentes.cmbDocumentos.store.load();
		componentes.cmbDocumentos.setValue("");
		componentes.cmbDocumentos.enable();
	});

	componentes.cmbDocumentos.on("select", function() {
		componentes.cmbFechas.store.baseParams.coddocumento = componentes.cmbDocumentos
				.getValue();
		componentes.cmbFechas.store.load();
		componentes.cmbFechas.setValue("");
		componentes.cmbFechas.enable();

		componentes.cmbObservaciones.store.baseParams.coddocumento = componentes.cmbDocumentos
				.getValue();
		componentes.cmbObservaciones.store.load();
		componentes.cmbObservaciones.setValue("");
		componentes.cmbObservaciones.enable();

	});
		 */
	/**
	 * Botones de la pantalla
	 */
	var botones = {
		cmdGuardar : new Ext.Button({
					text : "Guardar",
					formBind : true,
					cls : "x-btn-text-icon",
					icon : "../../imagenes/disk.png"
				}),
		cmdCancelar : new Ext.Button({
					text : "Cancelar",
					cls : "x-btn-text-icon", 
					icon : "../../imagenes/door_out.png"
				}),
		cmdEliminar : new Ext.Button({
					text : "Inactivar",
					icon : "../../imagenes/page_delete.png",
					cls : "x-btn-text-icon"
				})
	};

	var checkColumnCabecera = new Ext.grid.CheckColumn({
				header : '',
				dataIndex : 'cabeceradetalle',
				width : 80,
				name : 'cabeceradetalle',
				header : 'Cabecera',
				// renderer:return "<a href='#'><img
				// src=../../imagenes/money_add.png alt='Asignar dinero'
				// onclick='asignarDinero(this);'/></a>";
				check : function(t) {/* recalculaRetenFuente(t); */
				}

			});

	var checkColumnSumariza = new Ext.grid.CheckColumn({
				header : '',
				dataIndex : 'sumariza',
				width : 80,
				name : 'sumariza',
				header : 'Sumariza',
				// renderer:return "<a href='#'><img
				// src=../../imagenes/money_add.png alt='Asignar dinero'
				// onclick='asignarDinero(this);'/></a>";
				check : function(t) {/* recalculaRetenFuente(t); */
				}

			});
	
	
	var PanelgridDatos = new Ext.Panel({
		//width : 330,
		height : 200,
		layout : "form", 
		region : "center", 
		labelWidth : 100,
		//style : "padding:10px",
		border : true,
		items:[
				new Ext.grid.EditorGridPanel({
				id : "gridDatos",
				name : "gridDatos",
				region : "center",
				enableColumnMove : false,
				clicksToEdit : 1,
				height: 259,
				autoScrolls : true,
				stripeRows : true,
				border : false,
				loadMask : true,
				plugins : [checkColumnCabecera, checkColumnSumariza],
				store : storeDatos.storeGrid,
				columns : [
						new Ext.grid.RowNumberer(), 
						{dataIndex : "codarticulo",name : "codarticulo",header : "codarticulo",width : 100,hidden : true,hideable : true},
						{
							dataIndex : 'codalterno',
							name : 'codalterno',
							header : 'Cod Alterno',
							width : 100,
							editor : new Ext.form.ChooserField({
										allowBlank : false,
										onTriggerClick : function() {
											//abrirAgrupador(this, "A");
											alert("on tigger");
											AgrupadorArticulo();
										},
										listeners : {
											scope : this,
											specialkey : function(t, e) {
												alert("listener special key");
												//AgrupadorxSpecialKey();
											}
										}
									})
						}, {
							dataIndex : 'descripcion',
							type : 'string',
							name : 'descripcion',
							header : 'Descripci&oacute;n',
							width : 240
							//editor : new Ext.form.TextField({value:""})
						},{
							dataIndex : 'unidad',
							type : 'string',
							name : 'unidad',
							header : 'U. medida',
							width : 80,
							align:'center',
							editor : new Ext.form.TextField({value:"UND"})
						}, {
							dataIndex : 'cantsolicitada',
							type : 'string',
							name : 'cantsolicitada',
							header : 'Cant. Solicitada',
							width : 90,
							align:'right',
							editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						}, {
							dataIndex : 'cantrecibida',
							type : 'string',
							name : 'cantrecibida',
							header : 'Cant. Recibida',
							width : 90,
							align:'right',
							editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'precio',
							type : 'string',
							name : 'precio',
							header : 'P. Unit',
							width : 100,
							align:'right',
							editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'subtotal',
							type : 'string',
							name : 'subtotal',
							header : 'SubTotal',
							width : 100,
							align:'right',
							editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'porcdescuento',
							type : 'string',
							name : 'porcdescuento',
							header : '(%) Dsct',
							width : 100,
							align:'right',
							editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'descuento',
							type : 'string',
							name : 'descuento',
							header : 'Descuento',
							width : 100,
							align:'right',
							editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo4
						},{
							dataIndex : 'porciva',
							type : 'string',
							name : 'porciva',
							header : '(%) Iva',
							width : 100,
							align:'right',
							editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.12}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'iva',
							type : 'string',
							name : 'iva',
							header : 'IVA', 
							width : 100,
							align:'right',
							editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo4
						},{
							dataIndex : 'total',
							type : 'string',
							name : 'Total',
							header : 'Total',  
							width : 100,
							align:'right',
							editor : new Ext.form.NumberField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo4
						}
						// checkColumnCabecera,
						//checkColumnSumariza
						],
				tbar : new Ext.Toolbar({
							items : [{
										xtype : "tbseparator"
									}, {
										xtype : "button",
										text : "Nuevo ",
										icon : "../../imagenes/page_add.png",
										cls : "x-btn-text-icon",
										listeners : {
											click : function() {
												agregarDetalle();
											}
										}
									}, {
										xtype : "button",
										text : "Eliminar ",
										icon : "../../imagenes/delete.png",
										cls : "x-btn-text-icon",
										listeners : {
											click : function() {
												eliminarDetalle();
											}
										}
									}, {
										xtype : "tbseparator"
										}
									]
						})
			
			})
			]
	});
 	
	var tamanolabel3 = {
		columna1 : 80,
		columna2 : 90		
	};
	
	//COMPONENTES DEL PANEL 4
	var componentesFieldSet4 = {
		flsDatosmedida : new Ext.form.FieldSet({
		title:"-DATOS U.MEDIDA Y  CATEGORIAS",
		//height:120,
		autoHeight: true,
		width:380,
		//style:"padding:5px",
		
		items : [
			new Ext.Panel({ 
				width : 390,
				border :true, 
				layout : "form",
				//labelWidth : 100,
				//style : "padding:10px",
				labelWidth:100, 
				bodyStyle:"padding:5px 5px",
				border : false, 
				items : [
						agruparCamposPanel(componentesxempresa.tfMarca,componentesxempresa.txtMarca,0.4,0.4,452,71,1),
						agruparCamposPanel(componentesxempresa.tfLinea,componentesxempresa.txtLinea,0.4,0.4,452,71,1),
						agruparCamposPanel(componentesxempresa.tfSublineas,componentesxempresa.txtSubLinea,0.4,0.4,452,71,1),
						agruparCamposPanel(componentes.tfunidadProveedor,componentes.txtunidadProveedor,0.4,0.4,452,71,1),
						agruparCamposPanel(componentes.tfunidadMedida,componentes.txtunidadMedida,0.4,0.4,452,71,1),
						agruparCamposPanel(componentes.tfunidadPresentacion,componentes.txtunidadPresentacion,0.4,0.4,452,71,1)
						]
				}) 
			]
		 
		})
	};
	
 	var tamanolabel2 = {
		columna1 : 80,
		columna2 : 90		
	};
	
	//COMPONENTES DEL PANEL 3
	var componentesFieldSet3 = {
		flsArticuloxe : new Ext.form.FieldSet({
		title:"-DATOS ARTICULO EMPRESA",
		//height:120,
		autoHeight: true,
		width:380,
		style:"padding:5px",
		
		items : [
			new Ext.Panel({ 
				width : 380,
				border :true, 
				layout : "form",
				//labelWidth : 100,
				//style : "padding:10px",
				labelWidth:140,
				bodyStyle:"padding:5px",
				border : false,
				items : [
						//componentesxempresa.txtPrecioCompra,
						//componentesxempresa.txtPorcDescuentoCompra,
						componentesxempresa.txtPorcDescuentoVenta,
						componentesxempresa.txtPorcDescuentoMaximo,
						componentesxempresa.txtUltimaCompra,
						componentesxempresa.txtFechaUltimaCompra,
						componentesxempresa.txtStockEmpresa,
						componentesxempresa.txtStockMinimo,
						componentesxempresa.txtStockMaximo
						]
				}) 
			]
		
		})
	};
	
	
	var tamanolabel1 = {
		columna1 : 80,
		columna2 : 80,
		columna3 : 80
	};
	var componentesFieldSet = {
		flspedido : new Ext.form.FieldSet({
		title:"-DATOS ARTICULO",
		//height:120,
		autoHeight: true,
		width:800,
		style:"padding:5px",
		
		items : [
			new Ext.Panel({ 
				width : 800,
				border :true, 
				layout : "form",
				//labelWidth : 100,
				//style : "padding:10px",
				labelWidth:100,
				bodyStyle:"padding:5px",
				border : false,
				items : [
						agruparCamposPanel(componentes.txtcodArticulo,new Ext.Panel({frame :false,border:false}),0.6,0.3,830,80,1),
						
						agruparCamposPanelx3(componentes.txtcodAlterno,componentes.chkAceptaDecimales,componentesxempresa.chkSeInventaria,0.4,0.3,0.3,830,tamanolabel1.columna1,tamanolabel1.columna2,tamanolabel1.columna3),
						agruparCamposPanelx3(componentes.txtcodBarra,componentes.chkCalculaIvaCompra,componentesxempresa.chkVendible,0.4,0.3,0.3,830,tamanolabel1.columna1,tamanolabel1.columna2,tamanolabel1.columna3),
						agruparCamposPanelx3(componentes.txtdescripcioncorta,componentes.chkIncluyeIvaCompra,componentes.chkEsPerecible,0.4,0.3,0.3,830,tamanolabel1.columna1,tamanolabel1.columna2,tamanolabel1.columna3),
						agruparCamposPanelx3(componentes.txtdescripcion,componentes.chkCalculaIvaVenta,new Ext.Panel({frame :false,border:false}),0.4,0.3,0.3,830,tamanolabel1.columna1,tamanolabel1.columna2,tamanolabel1.columna3),
						agruparCamposPanelx3(componentes.txtregistroSan,componentesxempresa.chkIncluyeIvaVenta,new Ext.Panel({frame:false,border:false}),0.4,0.3,0.3,830,tamanolabel1.columna1,tamanolabel1.columna2,tamanolabel1.columna3)
						//componentes.txttelefonoCelular,
						//componentes.txttelefonoFijo1 
						]
			}) 
		]
		
		})
	};
	
	/* Panel 3 donde finalmente estaran los componentes */
	var panel3 = new Ext.Panel({
			layout : "column",
			region : "center",
			collapsible : true,
			//height : 150, 
			autoHeight: true,
			border : false,
			items : [
				new Ext.Panel({ 
					bodyStyle:"padding:10px",
					border : false,
					items:[
						componentesFieldSet3.flsArticuloxe
					]
					
				})
			]
	});
	
	
	/* Panel 4 donde finalmente estaran los componentes */
	var panel4 = new Ext.Panel({
			layout : "column",
			region : "right",
			collapsible : true,
			//height : 150, 
			autoHeight: true,
			border : false,
			items : [
					new Ext.Panel({ 
					bodyStyle:"padding:10px 14px ",
					border : false, 
					items:[
						componentesFieldSet4.flsDatosmedida
					]
				})
			]
	});
	
	
	
	/* Panel secundario donde finalmente estaran los componentes */
	var panelSecundario = new Ext.Panel({
				layout : "form",
				region : "north",
				collapsible : true,
				//height : 150,
				region : 'center',
				width: 814,
				autoHeight: true,
				autoScrolls: true, 
				border : false,
				items : [
					 new Ext.Panel({
						layout:"column",
						region : "north",
						collapsible : true,
						//height : 150, 
						autoHeight: true,
						border : false,
						items : [
							new Ext.Panel({
								layout:"form",
								//columnWidth:0.9,
								bodyStyle:"padding:10px",
								border : false,
								//labelWidth:280,
								//columnWidth : 280,
								items:[
									componentesFieldSet.flspedido
								]
								
							})
					]}),
					agruparCamposPanel(panel3,panel4,0.5,0.5,821,80,80) 
					
				]
			});
	
	botones.cmdGuardar.on("click", function() {
		var mensajeConfirmacion = "Est&aacute; seguro que desea Guardar el Registro?"
		Ext.MessageBox.confirm("Confirmaci&oacute;n", mensajeConfirmacion,
				function(opc) {
					if (opc == "yes") { 
						/*
						 * if(configuraciones.modoActual=="M"){
						 * controladorBloqueos.terminarBloqueo("WMSMOVIMIENTOS",componentes.txtCodigo.getValue()); }
						 */
						GuardarArticulo();
						/*
						 * configuraciones.modoActual = null;
						 * vntPrincipal.setVisible(false);
						 * panelPrincipal.getForm().reset();
						 */
					}
				});
	});

	botones.cmdCancelar.on("click", function() {
		var mensajeConfirmacion = "Cualquier cambio no guardado ser&aacute; perdido, Est&aacute; seguro que desea continuar?"
		Ext.MessageBox.confirm("Confirmaci&oacute;n", mensajeConfirmacion,
				function(opc) {
					if (opc == "yes") {
						if (configuraciones.modoActual == "M") {
		
						}

						configuraciones.modoActual = null;
						vntPrincipal.setVisible(false);
						panelPrincipal.getForm().reset();
					}
				});
	});

	botones.cmdEliminar.on("click", function() {
		var mensajeConfirmacion = "¿Est&aacute; seguro que desea eliminar el registro?"
		Ext.MessageBox.confirm("Confirmaci&oacute;n", mensajeConfirmacion, function(
						opc) {
					if (opc == "yes") {
						var codigo = componentes.txtcodArticulo.getValue();
						//var codempresa = componentes.cmbEmpresas.getValue();
						document.pantallaSecundariaProceso.eliminar(codigo);
					}
				});
	});

	Ext.getCmp("gridDatos").on('afteredit', function(e) {
				/*
				 * if(e.column==8){
				 * 
				 *  }
				 */

			});
	

	/* Panel principal de la pantalla */
	var panelPrincipal = new Ext.form.FormPanel({
		// region:"center",
		layout : "border", 
		labelWidth : 70,
		style : "padding:0px",
		monitorValid : true,
		buttonAlign : "center",
		region : "center",
		items : [panelSecundario],
		buttons : [ botones.cmdGuardar,botones.cmdEliminar,botones.cmdCancelar]
	});

	/* Ventana del proceso */
	var vntPrincipal = new Ext.Window({
		xtype : "window",
		iconCls: "iconoMarca",
		title : "Mantenimiento de Articulos",
		width : 841,
		height : 580, 
		resizable : false,
		modal : true,
		closable : false, 
		closeAction : "hide", 
		layout : "border",
		draggable : false, 
		items : [panelPrincipal]
			
		});

	/* Prepara los componentes de la ventana principal */
	var prepararVentana = function() {
		panelPrincipal.getForm().reset();
	
		botones.cmdCancelar.setVisible(true);
		
		if (configuraciones.modoActual == "I") {
			componentes.txtcodArticulo.getEl().up('.x-form-item').setDisplayed(false);
			botones.cmdEliminar.setVisible(false);
		} else {
			componentes.txtcodArticulo.getEl().up('.x-form-item').setDisplayed(true);
			botones.cmdEliminar.setVisible(true);
		}

	};
	
	var guardado = function() {
			var accion =null;
			if("I" == configuraciones.modoActual){
				 accion={
					orden : "MANTENIMIENTO_PROVEEDORES",
					codEmpresa : '1',
					codProveedor: configuraciones.codProveedor|| 0 ,
					nombres : componentes.txtnombres.getValue(),
					apellidos : componentes.txtapellidos.getValue(),
					tipoidentificacion : componentes.cmbtipoidentificacion.getRawValue(),
					identificacion : componentes.txtidentificacion.getValue(),
					estransportista : componentes.cmbesTransportista.getValue(),
					telefonofijo1 : componentes.txttelefonoFijo1.getValue(),
					telefonofijo2 : componentes.txttelefonoFijo2.getValue(),
					celular : componentes.txttelefonoCelular.getValue(),
					fax : componentes.txtFax.getValue(),
					email : componentes.txtEmail.getValue(),
					fechaValidez : componentes.dffechaValidez.getRawValue(),
					modo : configuraciones.modoActual
				}
			}else if("M" == configuraciones.modoActual){
				 accion = {
					orden : "MANTENIMIENTO_PROVEEDORES",
					codEmpresa:"1",
					codProveedor: configuraciones.codProveedor,
					nombres : componentes.txtnombres.getValue(),
					apellidos : componentes.txtapellidos.getValue(),
					tipoidentificacion : componentes.cmbtipoidentificacion.getRawValue(),
					identificacion : componentes.txtidentificacion.getValue(),
					estransportista : componentes.cmbesTransportista.getValue(),
					telefonofijo1 : componentes.txttelefonoFijo1.getValue(),
					telefonofijo2 : componentes.txttelefonoFijo2.getValue(),
					celular : componentes.txttelefonoCelular.getValue(),
					fax : componentes.txtFax.getValue(),
					email : componentes.txtEmail.getValue(),
					fechaValidez : componentes.dffechaValidez.getRawValue(),
					modo : configuraciones.modoActual
				}
			}
			
		
		var paramsGuardado = {
			url : "servlet/SAdministracionProveedores",
			params : accion,
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
										vntPrincipal.setVisible(false);
										panelPrincipal.getForm().reset();
										document.pantallaPrincipalProceso
												.actualizarGridPrincipal();
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
			}
		};

		Ext.Ajax.request(paramsGuardado);

	}

	
	/**
	 * metodo que me permite mostrar y cargar datos
	 */
	var cargarRegistro = function(data) {
		componentes.txtcodArticulo.setValue(data.codarticulo);
		componentes.txtcodAlterno.setValue(data.codalterno);
		componentes.txtcodBarra.setValue(data.codbarra);
		componentes.txtdescripcion.setValue(data.descripcionlarga);
		componentes.txtdescripcioncorta.setValue(data.descripcion);
		componentes.txtregistroSan.setValue(data.regsanitario);
		componentes.chkAceptaDecimales.setValue( ("S"==data.aceptadecimales?true:false));
		componentes.chkCalculaIvaCompra.setValue( ("S"==data.calculaivacompra?true:false));
		componentes.chkIncluyeIvaCompra.setValue( ("S"==data.incluyeivacompra?true:false));
		componentes.chkCalculaIvaVenta.setValue( ("S"==data.calculaivaventa?true:false));
		componentesxempresa.chkIncluyeIvaVenta.setValue( ("S"==data.incluyeivaventa?true:false));
		componentesxempresa.chkSeInventaria.setValue( ("S"==data.seinventaria?true:false));
		componentesxempresa.chkVendible.setValue( ("S"==data.vendible?true:false));
		componentes.chkEsPerecible.setValue( ("S"==data.perecible?true:false));
		componentesxempresa.txtPorcDescuentoVenta.setValue( ("0"!=data.descuentoventa?data.descuentoventa:0.00));
		componentesxempresa.txtPorcDescuentoMaximo.setValue(("0"!=data.descuentomaxventa?data.descuentomaxventa:0.00));
		componentesxempresa.txtUltimaCompra.setValue(("0"!=data.cantultcompra?data.cantultcompra:0.00));
		componentesxempresa.txtFechaUltimaCompra.setValue(data.fechaultcompra);
		componentesxempresa.txtStockEmpresa.setValue(("0"!=data.stock?data.stock:0.00));
		//omponentesxempresa.txtStockEmpresa.setValue(("S"==data.stock?true:false)); 
		componentesxempresa.txtStockMinimo.setValue(("0"!=data.cantmin?data.cantmin:0.00));
		componentesxempresa.txtStockMaximo.setValue(("0"!=data.cantmax?data.cantmax:0.00));
		
		componentesxempresa.tfMarca.setValue(data.codmarca);
		componentesxempresa.tfLinea.setValue(data.codlinea);
		componentesxempresa.tfSublineas.setValue(data.codsublinea);
		
		componentes.tfunidadProveedor.setValue(data.coduproveedor);
		componentes.tfunidadPresentacion.setValue(data.codupresentacion);
		componentes.tfunidadMedida.setValue(data.codumedida);
		
		var time = 200;
		
		(function(){
			componentesxempresa.tfMarca.fireEvent("specialkey");
			(function(){
				componentesxempresa.tfLinea.fireEvent("specialkey");
				(function(){
					componentesxempresa.tfSublineas.fireEvent("specialkey");
					(function(){
						componentes.tfunidadProveedor.fireEvent("specialkey");
						(function(){
							componentes.tfunidadPresentacion.fireEvent("specialkey");
								(function(){
									componentes.tfunidadMedida.fireEvent("specialkey");
								}).defer(time);
						}).defer(time);
					}).defer(time);
				}).defer(time);
			}).defer(time);
		}).defer(time);
	};

	/* Abre la ventana en el modo indicado */
	this.abrirVentana = function(modo, data) {
		var gridDatos = Ext.getCmp("gridDatos");
		configuraciones.modoActual = modo;
		
		vntPrincipal.setVisible(true);
		vntPrincipal.center();
		
		prepararVentana(); 
		// Ext.getCmp("porvariable").setValue(true);

		if (modo == "M")
			cargarRegistro(data);
		
	};

	this.eliminar = function(codigo) {

		var parametros = {
			url : "../../servlet/SAdministracionArticulos",
			params : {
				orden : "INACTIVAR_ARTICULO",
				codarticulo : codigo,
				codempresa : document.parametrosSesion.codigoEmpresa,
				codusuario : document.parametrosSesion.codigoUsuario
			},
			callback : function(option, success, response) {
				var respuesta = Ext.decode(response.responseText);

				if (respuesta.exito) {

					Ext.Msg.show({
								title : "Atenci&oacute;n",
								msg : respuesta.mensaje,
								icon : Ext.Msg.INFO,
								buttons : Ext.Msg.OK,
								fn : function() {
									vntPrincipal.setVisible(false);
									panelPrincipal.getForm().reset();
									document.pantallaPrincipalProceso.actualizarGridPrincipal();
									configuraciones.modoActual = null;
								}
							})

				} else {
					Ext.Msg.show({
								title : "Error",
								msg : respuesta.mensaje,
								icon : Ext.Msg.ERROR,
								buttons : Ext.Msg.OK
							});
				}
			}
		}

		Ext.Ajax.request(parametros);
	}
		
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var abrirAgrupadorMarcas = function(){
	
		var JsonRetorno = null;
		var check1 = new Ext.grid.CheckboxSelectionModel();
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
					descripcion : '' 
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
					{dataIndex : "descripcion",header : "Descripci&oacute;n",width : 100,hidden : false}
					]
			
		};
		
			var ventana = new busquedasFiltros({
				tituloVentana: "Panel b&uacute;squeda Articulos",
				ancho: 600,
				alto: 400,
				store : modelo.storeGrid,
				cm : modelo.columnasGrid,
				registrosPorPagina: 20,
				tituloOpcionCodigo:"Codigo",
				tituloOpcionDescripcion:"Descripcion",
				apuntador : this
			});
				
			this.getDataSelection = function(data){
				if (data == null)
					return; 
				
				JsonRetorno = data;
				seteo(data);
			}
				
			this.seleccionado = function(){
				return JsonRetorno;	
			};
			
			function seteo(data){
				componentesxempresa.tfMarca.setValue(data.codigo);
				componentesxempresa.txtMarca.setValue(data.descripcion);
			}
			ventana.abrirVentanaFiltros();
	};
	
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var abrirAgrupadorLineas = function(){
	
		var JsonRetorno = null;
		var check1 = new Ext.grid.CheckboxSelectionModel();
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
					descripcion : '' 
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
		
			var ventana = new busquedasFiltros({
				tituloVentana: "Panel b&uacute;squeda Articulos",
				ancho: 600,
				alto: 400,
				store : modelo.storeGrid,
				cm : modelo.columnasGrid,
				registrosPorPagina: 20,
				tituloOpcionCodigo:"Codigo",
				tituloOpcionDescripcion:"Descripcion",
				apuntador : this
			});
				
			this.getDataSelection = function(data){
				if (data == null)
					return; 
				
				JsonRetorno = data;
				seteo(data);
			}
				
			this.seleccionado = function(){
				return JsonRetorno;	
			};
			
			function seteo(data){
				componentesxempresa.tfLinea.setValue(data.codigo);
				componentesxempresa.txtLinea.setValue(data.descripcion);
			}
			ventana.abrirVentanaFiltros();
	};
	
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var abrirAgrupadorSubLineas = function(){
	
		var JsonRetorno = null;
		var check1 = new Ext.grid.CheckboxSelectionModel();
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
					descripcion : '' 
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
		
			var ventana = new busquedasFiltros({
				tituloVentana: "Panel b&uacute;squeda Articulos",
				ancho: 600,
				alto: 400,
				store : modelo.storeGrid,
				cm : modelo.columnasGrid,
				registrosPorPagina: 20,
				tituloOpcionCodigo:"Codigo",
				tituloOpcionDescripcion:"Descripcion",
				apuntador : this
			});
				
			this.getDataSelection = function(data){
				if (data == null)
					return; 
				
				JsonRetorno = data;
				seteo(data);
			}
				
			this.seleccionado = function(){
				return JsonRetorno;	
			};
			
			function seteo(data){
				componentesxempresa.tfSublineas.setValue(data.codigo);
				componentesxempresa.txtSubLinea.setValue(data.descripcion);
			}
			ventana.abrirVentanaFiltros();
	};
	
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var abrirAgrupadorUnidadesMedidas = function(modo){
	
		var JsonRetorno = null;
		var check1 = new Ext.grid.CheckboxSelectionModel();
		var modelo = {
			storeGrid : new Ext.data.Store({
				url : "../../servlet/SAdministracionUMedidas",
				autoLoad :false,
				baseParams : {
					orden : "AGRUPADOR_UMEDIDAS",
					start : 0,
					limit : 20,
					codempresa : document.parametrosSesion.codigoEmpresa,
					codigo : '0', 
					descripcion : '' 
				},
				reader : new Ext.data.XmlReader({
							success : "@success",
							record : "medida",
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
		
			var ventana = new busquedasFiltros({
				tituloVentana: "Panel b&uacute;squeda Articulos",
				ancho: 600,
				alto: 400,
				store : modelo.storeGrid,
				cm : modelo.columnasGrid,
				registrosPorPagina: 20,
				tituloOpcionCodigo:"Codigo",
				tituloOpcionDescripcion:"Descripcion",
				apuntador : this
			}); 
				
			this.getDataSelection = function(data){
				if (data == null)
					return; 
				
				JsonRetorno = data;
				seteo(data);
			}
				
			this.seleccionado = function(){
				return JsonRetorno;	
			};
			
			function seteo(data){
				switch(modo){
					case "umedida":
						componentes.tfunidadMedida.setValue(data.codigo);
						componentes.txtunidadMedida.setValue(data.descripcion);
						break;
					case "uproveedor":
						componentes.tfunidadProveedor.setValue(data.codigo);
						componentes.txtunidadProveedor.setValue(data.descripcion);
						break;
					case "upresentacion":
						componentes.tfunidadPresentacion.setValue(data.codigo);
						componentes.txtunidadPresentacion.setValue(data.descripcion);
						break;
					default: 
						break;
				}
				 
			}
			ventana.abrirVentanaFiltros();
	};
	
	/**************************/
	/**
	*	Obtiene la cadena JSON con los registros del grid dinamico
	*/
	
	function obtenerJSONGrid(grilla){
		datos = Ext.getCmp(grilla).store;
		var cadena = "{data:[";
			
		for(i=0;i<datos.getCount();i++){
			record = datos.getAt(i);
			cadena += Ext.util.JSON.encode(record.data) + ",";
		}
	
		cadena = cadena.substring(0,cadena.length-1) + "]}";
		
		return(cadena);
	}
	
	function obtenerJSONGridObj(grid){
		datos = grid.store;
		var cadena = "{data:[";
			
		for(i=0;i<datos.getCount();i++){
			record = datos.getAt(i);
			cadena += Ext.util.JSON.encode(record.data) + ",";
		}
	
		cadena = cadena.substring(0,cadena.length-1) + "]}";
		
		return(cadena);
	}

	/**
	 * Calculos Grid
	 */
	function calcularValoresGenerales(grid) { //subtotal,neto,descuento,iva,total
		var store = grid.getStore();
		if(store.getCount() <= 0){
			setTotales('0.00','0.00','0.00','0.00');
			return;
		}
		var Subtotal = 0;
		var Descuento = 0;	
		var Iva = 0;
		var neto = 0;
		var Total = 0;
			
		store.each(function(record){
			if(record.get('codarticulo')){
				Subtotal += record.get('subtotal')*1;
				Descuento += record.get('descuento')*1;
				Iva += record.get('iva')*1;
				//Neto += record.get('neto')*1;
				Total += record.get('total')*1;
			}
		});
		setTotales((Subtotal*1),(neto*1),(Descuento*1),(Iva*1),(Total*1));
	}
	
	function calcularValoresDetalle(record){
		
		var cantidad = record.get("cantsolicitada") || 0;
		var precio = record.get("precio") || 0;
		var subtotal = record.get("subtotal") || 0;
		var porcdescuento = record.get("porcdescuento") || 0;
		var descuento = record.get("descuento") || 0;
		var porciva = record.get("porciva") || 0;
		var iva = record.get("iva") || 0;
		var total = record.get("total") || 0;
		//var neto = record.get("valorneto") || 0;
		//var impuesto = record.get("impuesto") || 0; 
				
		subtotal = (precio-0).toFixed(4) * cantidad;		
		subtotal = (subtotal-0).toFixed(2);
		
		descuento = subtotal * porcdescuento /100; 		
		descuento = (descuento-0).toFixed(4);
		
		porcdescuento = (porcdescuento-0).toFixed(4);
		
		iva = (subtotal * porciva);
		
		console.log(subtotal +" "+descuento +" "+iva );
		total = ((subtotal-descuento)+iva);
		total = (total-0).toFixed(4);
		//neto = subtotal - descuento;
		
		var grid = Ext.getCmp('gridDatos');
		var store = grid.getStore();
		store.suspendEvents();
		
		record.set("precio", (precio-0).toFixed(4));
		record.set("subtotal", (subtotal-0).toFixed(2));
		record.set("descuento", (descuento-0).toFixed(4));
		record.set("porcdescuento",(porcdescuento-0).toFixed(4));
		//record.set("valorneto", (neto-0).toFixed(2));
		record.set("total", (total-0).toFixed(4));
		//record.set("porcdescuento",(porcdescuento-0).toFixed(4)||0);
		record.set("iva",(iva-0).toFixed(4)||0);
		/***********	RESUMIR EVENTOS Y DISPARAR LOS CAMBIOS	**********/	
		store.resumeEvents();
		record.commit();
	}
	/*************************/
	/**
	 * Acciones Grid
	 */
	Ext.getCmp("gridDatos").on('beforeedit',function(e){
	 
		//alert("beforeedit")
	});
	
	Ext.getCmp("gridDatos").on('afteredit',function(e){
	 	calcularValoresDetalle(e.record);
	 	calcularValoresGenerales(Ext.getCmp("gridDatos"));
		//alert("afteredit");
	});
	
	Ext.getCmp("gridDatos").on('validateedit',function(e){
		//alert("validateedit");
		var gridDatos = Ext.getCmp("gridDatos");
		
		switch(e.field){
				case 'cantsolicitada':
					//if(e.value == 0 || e.value == ''){ return false; }
					e.value = e.value || '0';
					if((e.value*1) <= 0.00){
						Ext.MessageBox.show({
							title: 'Atención',
							msg: 'La Cantidad Solicitada no puede ser menor a 0.',
							buttons: Ext.MessageBox.OK,
							scope:this,
							fn:function(){
								var celda = gridDatos.getSelectionModel().getSelectedCell();					
								gridDatos.startEditing(celda[0],celda[1]);	 
							},
							icon: Ext.MessageBox.INFO			
						});						
						return false;
					}
					return true;
					break;
			
				case 'codalterno':					
					//global = e.record.get('codalterno');										
					return true;
					break;
					
				default :
					return true;
		}		
	});
	
	Ext.getCmp("gridDatos").on("render", function () {
			var gridDatos = Ext.getCmp("gridDatos");
			var mapGridDetalle = new Ext.KeyMap(gridDatos.body,[
				{ 
				 	key:Ext.EventObject.ENTER, 
				 	fn:agregarDetalle(),
				 	scope:this
				},
				{
					key:Ext.EventObject.F2,
					fn:function(){														
						var celda = gridDatos.getSelectionModel().getSelectedCell();					
						gridDatos.startEditing(celda[0],celda[1]);
					}
				}]);
		});
	/************************/
	/**
	 *Eliminar Detalles Grid
	 */
	var eliminarDetalle = function() {
		var gridDatos = Ext.getCmp("gridDatos");
		var sel = gridDatos.getSelectionModel().getSelectedCell();
		var borrame = gridDatos.getStore().getAt(sel[0]);

		var cantreg = gridDatos.store.getCount();

		var existe = 0;

		for (r = 0; r < cantreg; r++) {
			var reg = gridDatos.store.getAt(r);
			if ((reg.get('codalterno') == borrame.get('codalterno'))) {
				existe++;
			}
		}
		/*
		if (existe > 0) {
			Ext.Msg.show({
						title : "Error",
						msg : "El Articulo ya est&aacute; Seleccionado.",
						icon : Ext.Msg.ERROR,
						buttons : Ext.Msg.OK
					});
		}
		*/
		gridDatos.getStore().remove(borrame);
		gridDatos.store.commitChanges();
		gridDatos.getView().refresh();
		
		calcularValoresGenerales(gridDatos);
 
	};
	
	
	/**********************/
	/**
	 * Agregar Detalle Al Grid
	 */
	var agregarDetalle = function() {
		
		var retorno = validarGrid();
		if(retorno == null)
			return;	
		
		var grid = Ext.getCmp("gridDatos");
		var gridDatos = Ext.getCmp("gridDatos");
		gridDatos.store.commitChanges();
		// var sel = grid.getSelectionModel().getSelectedCell();
		
		var recd = grid.store.getAt(grid.store.getCount() - 1);
	
		var sel = gridDatos.getSelectionModel().getSelectedCell();
		
		var aux = gridDatos;
		var Fila = Ext.data.Record.create([
				{name : "codalterno"},
				{name : "descripcion"},
				{name : "unidad"},
				{name : "cantsolicitada"},
				{name : "cantrecibida"},
				{name : "precio"},
				{name : "subtotal"},
				{name : "porcdescuento"},
				{name : "descuento"},
				{name : "porciva"},
				{name : "iva"},
				{name : "total"}
				]);
		var tmpEst = new Fila({
					codalterno : '',
					descripcion : '',
					unidad : '',
					cantsolicitada : '0',
					cantrecibida : '0.00',
					precio : '0',
					subtotal:'0.00',
					porciva : '0',
					iva : '0',
					porcdescuento:'0'
				});
		aux.stopEditing();
		aux.store.insert(aux.store.getCount(), tmpEst);
		aux.getView().refresh();
		aux.startEditing(aux.store.getCount() - 1, 2);

	};
	
	function validarGrid (){ 
		var grid = Ext.getCmp("gridDatos");
		var filas = grid.store.getCount(); 
		var sel = grid.getSelectionModel().getSelectedCell();
		var filaAnterior = null;
		var retorno = "";
		var mensaje = "Debe Seleccionar un Articulo";
		var mensajeProveedor = "Debe Seleccionar un Proveedor";
		
		var proveedor = componentes.tfcodProveedor.getValue();
		
		if(proveedor == null || proveedor == ""){
			Ext.MessageBox.show({title:"Atenci\xf3n", msg:mensajeProveedor, buttons:Ext.MessageBox.OK, icon:Ext.MessageBox.ERROR});
			return;
		}
		
		if(filas > 0){
			filaAnterior = grid.store.getAt(sel[0]).get("codalterno");
			//alert(filaAnterior);
			if(filaAnterior <= 0 ){
				 //Ext.MessageBox.ERROR({ });
				 Ext.MessageBox.show({title:"Atenci\xf3n", msg:mensaje, buttons:Ext.MessageBox.OK, icon:Ext.MessageBox.ERROR});
				 retorno = null;
			}
		}
		return retorno;
	}
	
	function validarExisteArt(codigo){
	 	var gridDatos = Ext.getCmp("gridDatos");
	 	var cantreg = gridDatos.store.getCount();
		var existe = 0;
		var mensaje = "Este Articulo ya Fue Seleccionado";
		for (r = 0; r < cantreg; r++) {
			var reg = gridDatos.store.getAt(r);
			if (reg.get('codarticulo') == codigo) {
				existe++;
			}
		}
		if(existe > 0){
			 Ext.MessageBox.show({title:"Atenci\xf3n", msg:mensaje, buttons:Ext.MessageBox.OK, icon:Ext.MessageBox.ERROR,fn:function(){
				gridDatos.startEditing(gridDatos.store.getCount() - 1, 2);
			}});
			 return true;
		}
		return false;
	}
	
	var insertGridArt = function (data){
			//alert("hoa"+data.descripcion)
			var gridDatos = Ext.getCmp("gridDatos");
			var sel = gridDatos.getSelectionModel().getSelectedCell();
			var record = gridDatos.store.getAt(sel[0]);
			
			var existe = validarExisteArt(data.codarticulo);
			if(existe){
				gridDatos.startEditing(gridDatos.store.getCount() - 1, 2);
			}else{
		
			//record.set("numcuenta",codigo);
			record.set("codarticulo",data.codarticulo);
			record.set("codalterno", data.codalterno);
			record.set("descripcion", data.descripcion);
			record.set("unidad", data.unidad);
			record.set("precio", data.precio);
			record.set("cantsolicitada", 0);
			record.set("subtotal", 0);
			record.set("porcdescuento", 0);
			record.set("descuento", 0);
			record.set("porciva", Ext.util.Format.monedaSinSimbolo((data.iva/100)));
			record.set("iva", 0);
			record.set("total", 0);
			
			
			gridDatos.store.commitChanges();
			gridDatos.startEditing(gridDatos.store.getCount() - 1, 5);
			
			}
	}
	
	/*************************************************************************************************************************/
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	
	var check = new Ext.grid.CheckboxSelectionModel();
	var modeloDatos = {
		storeGridPrincipal : new Ext.data.Store({
			url : "../../servlet/SAdministracionProveedores",
			autoLoad :false,
			baseParams : {
				orden : "LISTAR_PROVEEDORES_X_FILTROS",
				start : 0,
				limit : 20,
				codempresa : '',
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
						{name : "codagencia"}, 
						{name : "desagencia"},
						{name : "codproveedor"},
						{name : "desproveedor"},
						{name : "identificacion"},
						{name : "telfijo"}, 
						{name : "email"}, 
						{name : "fechavali"},
						{name : "documento"}, 
						{name : "fecha"}
						])
		}),
		columnasGridPrincipal : [new Ext.grid.RowNumberer(), check, 
				{dataIndex : "codempresa",header : "Codempresa",width : 100,hidden : true},
				{dataIndex : "desempresa",header : "Empresa",cellActions : [{iconCls : "icono-seleccion",qtip : "Visualizar"}],width : 100},
				{dataIndex : "codagencia",header : "codagencia",width : 100,hidden : true}, 
				{dataIndex : "desagencia",header : "Agencia",cellActions : [{iconCls : "icono-seleccion",qtip : "Visualizar"}],width : 100}, 
				{dataIndex : "codproveedor",header : "codproveedor",width : 100,hidden : true},
				{dataIndex : "desproveedor",header : "Proveedor",width : 100}, 
				{dataIndex : "identificacion",header : "identificacion",width : 100}, 
				{dataIndex : "telfijo",header : "Telef Fijo",width : 100}, 
				{dataIndex : "email",header : "email",width : 100},
				{dataIndex : "fechavali",header : "Validez",width : 100},
				{dataIndex : "documento",header : "Documento",width : 100,hidden : true},
				{dataIndex : "fecha",header : "Fecha",width : 100,id : "idfecha",hidden : true}
				]
		
	};
	
	var ventanaF = new busquedasFiltros({
		tituloVentana: "Panel b&uacute;squeda Proveedores",
		ancho: 600,
		alto: 400,
		store : modeloDatos.storeGridPrincipal,
		cm : modeloDatos.columnasGridPrincipal,
		registrosPorPagina: 20,
		tituloOpcionCodigo:"Codigo",
		tituloOpcionDescripcion:"Descripcion",
		apuntador : this
	});
	
	function abrirAgrupadorProveedor(){
		ventanaF.abrirVentanaFiltros();
	};
		
	this.getDataSelection = function(data){
		if (data == null)
			return;
		
		seteoProveedor(data);
	}
	
	function seteoProveedor(data){
		componentes.tfcodProveedor.setValue(data.codproveedor),
		componentes.txtEmail.setValue(data.desproveedor),
		componentes.txtFax.setValue(data.identificacion),
		componentes.cmbesTransportista.setValue("S"),
		componentes.txttelefono.setValue(data.telfijo)
	}
	
	/*************************************************************************************************************************/
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var AgrupadorArticulo = function(){
	
		var JsonRetorno = null;
		var check1 = new Ext.grid.CheckboxSelectionModel();
		var modeloArticulo = {
			storeGridArticulos : new Ext.data.Store({
				url : "../../servlet/SAdministracionArticulos",
				autoLoad :false,
				baseParams : {
					orden : "LISTAR_ARTICULOS_PEDIDOS",
					start : 0,
					limit : 20,
					codempresa : document.parametrosSesion.codigoEmpresa,
					codigo : '0', 
					descripcion : ''
				},
				reader : new Ext.data.XmlReader({
							success : "@success",
							record : "articulo",
							totalRecords : "@totalRegistros"
						}, [
							{name : "codarticulo"}, 
							{name : "codalterno"}, 
							{name : "descripcion"},
							{name : "unidad"}, 
							{name : "precio"},
							{name : "stock"},
							{name : "marca"},
							{name : "linea"},
							{name : "sublinea"},
							{name : "iva"}
							/*
							{name : "fechavali"},
							{name : "documento"}, 
							{name : "fecha"}*/
							])
			}),
			columnasGridArticulos : [new Ext.grid.RowNumberer(), check1, 
					{dataIndex : "codarticulo",header : "codarticulo",width : 100,hidden : true},
					{dataIndex : "codalterno",header : "Cod. Articulo",cellActions : [{iconCls : "icono-seleccion",qtip : "Visualizar"}],width : 100},
					{dataIndex : "descripcion",header : "Descripci&oacute;n",width : 100,hidden : false}, 
					{dataIndex : "unidad",header : "U. Medida", cellActions : [{iconCls : "icono-seleccion",qtip : "Visualizar"}],width : 100}, 
					{dataIndex : "precio",header : "Precio",width : 100,hidden : false},
					{dataIndex : "stock",header : "Stock",width : 100}, 
					{dataIndex : "marca",header : "Marca",width : 100}, 
					{dataIndex : "linea",header : "Linea",width : 100}, 
					{dataIndex : "sublinea",header : "SubLinea",width : 100},
					{dataIndex : "iva",header : "iva",width : 100,hidden : true, hideable:true}
					/*{dataIndex : "fechavali",header : "Validez",width : 100},
					{dataIndex : "documento",header : "Documento",width : 100,hidden : true},
					{dataIndex : "fecha",header : "Fecha",width : 100,id : "idfecha",hidden : true}*/
					]
			
		};
		
			var ventanaArticulos = new busquedasFiltros({
				tituloVentana: "Panel b&uacute;squeda Articulos",
				ancho: 600,
				alto: 400,
				store : modeloArticulo.storeGridArticulos,
				cm : modeloArticulo.columnasGridArticulos,
				registrosPorPagina: 20,
				tituloOpcionCodigo:"Codigo",
				tituloOpcionDescripcion:"Descripcion",
				apuntador : this
			});
			
			//this.abrirAgrupadorArticulos = function(){
				//ventanaArticulos.abrirVentanaFiltros();
			//};
				
			this.getDataSelection = function(data){
				if (data == null)
					return; 
				
				JsonRetorno = data;
				//alert(data.descripcion);
				insertGridArt(data);
			}
			
			
			this.seleccionado = function(){
				return JsonRetorno;	
			};
			
			/*function seteoArticulo(data){
				alert("estamos bien");
			}*/
			ventanaArticulos.abrirVentanaFiltros();
	}
	
	/************************************************/
	/**
	 * GUARDAR PEDIDO COMPRAS
	 */
	var checkvalidar = function (data) {
		if (data)
			return "S";
		else 
			return "S";
	}
	
	var GuardarArticulo  = function(){
		var paramsGuardar = {
			url : "../../servlet/SAdministracionArticulos",
			params : {
					//GEN ARTICULO
					orden : "GUARDAR_ARTICULO",
					codEmpresa : document.parametrosSesion.codigoEmpresa,
					codagencia : document.parametrosSesion.codigoAgencia,
					codarticulo : (configuraciones.modoActual=="I"?0:componentes.txtcodArticulo.getValue()),
		            codalterno: componentes.txtcodAlterno.getValue(),
		            codbarra: componentes.txtcodBarra.getValue(),
		            descripcion: componentes.txtdescripcion.getValue(),
		            descripcioncorta: componentes.txtdescripcioncorta.getValue(),
		            //imagenArt:
		            aceptadecimales: checkvalidar(componentes.chkAceptaDecimales.getValue()),
		            calculaiva: checkvalidar(componentes.chkCalculaIvaVenta.getValue()),
		            calculaivacompras: checkvalidar(componentes.chkCalculaIvaCompra.getValue()),
		            incluyeivacompras: checkvalidar(componentes.chkIncluyeIvaCompra.getValue()),
		            perecible: checkvalidar(componentes.chkEsPerecible.getValue()),
		            registrosanitario: componentes.txtregistroSan.getValue(),
		            codunidadpresentacion: componentes.tfunidadPresentacion.getValue(),
		            codunidadproveedor: componentes.tfunidadProveedor.getValue(),
		            codunidadesmedida: componentes.tfunidadMedida.getValue(),
		            codusuario: document.parametrosSesion.codigoUsuario,
		            fecharegstro: new Date(),
		            //GEN ART X EMPRESA
			        //codestado:
			        seinventaria: checkvalidar(componentesxempresa.chkSeInventaria.getValue()),
			        esvendible: checkvalidar(componentesxempresa.chkVendible.getValue()),
			        porcdsctoventa: componentesxempresa.txtPorcDescuentoVenta.getValue(),
			        porcdsctomaximo: componentesxempresa.txtPorcDescuentoMaximo.getValue(),   
			        incluyeivaventas: checkvalidar(componentesxempresa.chkIncluyeIvaVenta.getValue()),
			        codmarca: componentesxempresa.tfMarca.getValue(),
			        codlineas: componentesxempresa.tfLinea.getValue(), 
			        codsublineas: componentesxempresa.tfSublineas.getValue(),
			        cantmin: componentesxempresa.txtStockMinimo.getValue(),
			        cantmax: componentesxempresa.txtStockMaximo.getValue(),
		      		modo: configuraciones.modoActual
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
										vntPrincipal.setVisible(false);
										panelPrincipal.getForm().reset();
										document.pantallaPrincipalProceso
												.actualizarGridPrincipal();
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
	}; 
	
	/*************************************************************************************************************************/
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var AgrupadorxSpecialKey = function(){
		var JsonRetorno = null;
		var Codigo = componentesxempresa.tfMarca.getValue() || 0;
		
		if(Codigo != 0 && Codigo != ""){
			var agrupador = new Busquedaxcodigo({
				apuntador : this,
				url : "../../servlet/SAdministracionUMedidas",
				orden : "AGRUPADOR_MARCAS",
				codigo : Codigo 
			});
			 
			this.getDataSelection = function(data){
				if (data == null){
					abrirAgrupadorMarcas(); 
				}else{
					//alert("ojo "+data); 
					componentesxempresa.tfMarca.setValue(data.codigo);
					componentesxempresa.txtMarca.setValue(data.descripcion);
				}
			};
			agrupador.cargarFiltroCodigo();
		}else{
			abrirAgrupadorMarcas(); 
		}
	};
	
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var AgrupadorLineaSpecialKey = function(){
		var JsonRetorno = null;
		var Codigo = componentesxempresa.tfLinea.getValue() || 0;
		
		if(Codigo != 0 && Codigo != ""){
			var agrupador = new Busquedaxcodigo({
				apuntador : this,
				url : "../../servlet/SAdministracionUMedidas",
				orden : "AGRUPADOR_LINEAS",
				codigo : Codigo 
			});
			 
			this.getDataSelection = function(data){
				if (data == null){
					abrirAgrupadorLineas(); 
				}else{
					//alert("ojo "+data); 
					componentesxempresa.tfLinea.setValue(data.codigo);
					componentesxempresa.txtLinea.setValue(data.descripcion);
				}
			};
			agrupador.cargarFiltroCodigo();
		}else{
			abrirAgrupadorLineas(); 
		}
	};
	
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var AgrupadorSubLineaSpecialKey = function(){
		var JsonRetorno = null;
		var Codigo = componentesxempresa.tfSublineas.getValue() || 0;
		
		if(Codigo != 0 && Codigo != ""){
			var agrupador = new Busquedaxcodigo({
				apuntador : this,
				url : "../../servlet/SAdministracionUMedidas",
				orden : "AGRUPADOR_SUBLINEAS",
				codigo : Codigo 
			});
			 
			this.getDataSelection = function(data){
				if (data == null){
					abrirAgrupadorSubLineas(); 
				}else{
					//alert("ojo "+data); 
					componentesxempresa.tfSublineas.setValue(data.codigo);
					componentesxempresa.txtSubLinea.setValue(data.descripcion);
				}
			};
			agrupador.cargarFiltroCodigo();
		}else{
			abrirAgrupadorSubLineas(); 
		}
	};
	
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var AgrupadorUMedidaSpecialKey = function(modo){
		var JsonRetorno = null;
		var Codigo = null;
		
		switch(modo){
			case "umedida":
				Codigo = componentes.tfunidadMedida.getValue() || 0;
				break;
			case "uproveedor":
				Codigo = componentes.tfunidadProveedor.getValue() || 0;
				break;
			case "upresentacion":
				Codigo = componentes.tfunidadPresentacion.getValue() || 0;
				break;
			default: 
				break;
		};
		
		if(Codigo != 0 && Codigo != ""){
			var agrupador = new Busquedaxcodigo({
				apuntador : this,
				url : "../../servlet/SAdministracionUMedidas",
				orden : "AGRUPADOR_UMEDIDAS",
				codigo : Codigo 
			});
			 
			this.getDataSelection = function(data){
				if (data == null){
					abrirAgrupadorUnidadesMedidas(modo); 
				}else{
			
					switch(modo){
						case "umedida":
							componentes.tfunidadMedida.setValue(data.codigo);
							componentes.txtunidadMedida.setValue(data.descripcion);
							break;
						case "uproveedor":
							componentes.tfunidadProveedor.setValue(data.codigo);
							componentes.txtunidadProveedor.setValue(data.descripcion);
							break;
						case "upresentacion":
							componentes.tfunidadPresentacion.setValue(data.codigo);
							componentes.txtunidadPresentacion.setValue(data.descripcion);
							break;
						default: 
							break;
					}
				}
			};
			agrupador.cargarFiltroCodigo();
		}else{
			abrirAgrupadorUnidadesMedidas(modo); 
		}
	};
};

	