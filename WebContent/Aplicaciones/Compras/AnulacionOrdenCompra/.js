var PlantillasProceso = function() {

	var configuraciones = {
		apuntador : this,
		modoActual : null,
		parametro_cambiofecha : null,
		parametro_bloqueo : null,
		codProveedor : null,
		cantidaddeceros : 8
	};
	
	var agruparCamposPanel = function(componenteA,componenteB,porcentajeComponenteA,porcentajeComponenteB,anchoPanel,labelWidth){		
		var panelContenedor = new Ext.Panel({
			border:false,
			width:anchoPanel,
			layout:"column",
			labelWidth:labelWidth,
			items:[
				new Ext.Panel({border:false,layout:"form",columnWidth:porcentajeComponenteA,items:[componenteA]}),
				new Ext.Panel({border:false,layout:"form",columnWidth:porcentajeComponenteB,items:[componenteB],style:"text-align:'center';margin-left:8px",labelWidth:labelWidth})
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
		guardarPlantilla : {
			orden : "GUARDAR_PLANTILLA",
			nombreMetodo : "guardarPlantilla",
			tipo : "JSON",
			parametros : [{
						nombre : "codsistema",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codtipo",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codigo",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "descripcion",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "coddocumento",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codfecha",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codobservacion",
						prototipo : "String",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codempresa",
						prototipo : "long",
						tipoParametro : "NORMAL"
					}, {
						nombre : "codagencia",
						prototipo : "long",
						tipoParametro : "NORMAL"
					}, {
						nombre : "jsonDetallePlantilla",
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

	var modeloDatos = {
		readerFormaGrid : new Ext.data.XmlReader({
					success : "@success",
					record : "detallePedido"
				}, [
					/**
					 * strBuff.append("<codarticulo>"+obj.getGenarticulos().getCodarticulo()+"</codarticulo>");
					strBuff.append("<codalterno>"+obj.getGenarticulos().getCodalterno()+"</codalterno>");
					strBuff.append("<descripcion>"+obj.getGenarticulos().getDescripcioncorta()+"</descripcion>");
					strBuff.append("<unidad>"+obj.getGenunidadesmedidaByCodunidadmedida().getCodunidadmedida()+"</unidad>");
					strBuff.append("<>"+(obj.getCantidad()!=null?obj.getCantidad():0l)+"</cantsolicitada>");
					strBuff.append("<cantsolicitada>"+(obj.getCantidadrecibida()!=null?obj.getCantidadrecibida():0l)+"</cantsolicitada>");
					strBuff.append("<>"+(obj.getPrecio()!=null?obj.getPrecio():0l)+"</precio>");
					strBuff.append("<>"+(obj.getSubtotal()!=null?obj.getSubtotal():0l)+"</subtotal>");
					strBuff.append("<>"+(obj.getPorcdescuento()!=null?obj.getPorcdescuento():0l)+"</porcdescuento>");
					strBuff.append("<>"+(obj.getDescuento()!=null?obj.getDescuento():0l)+"</descuento>");
					strBuff.append("<>"+(obj.getPorcimpuesto()!=null?obj.getPorcimpuesto():0l)+"</porciva>");
					strBuff.append("<iva>"+(obj.getImpuesto()!=null?obj.getImpuesto().toString():0l)+"</iva>");
					strBuff.append("<total>"+(obj.getTotal()!=null?obj.getTotal():0l)+"</total>");

					 */
						{name : "codarticulo"},
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
						]),
		readerSistema : new Ext.data.XmlReader({
					success : "@success",
					record : "sistema"
				}, [{
							name : "codigo"
						}, {
							name : "descripcion"
						}]),
		readerTipo : new Ext.data.XmlReader({
					success : "@success",
					record : "tipo"
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
		readerFecha : new Ext.data.XmlReader({
					success : "@success",
					record : "fecha"
				}, [{
							name : "codigo"
						}, {
							name : "descripcion"
						}]),
		readerObservacion : new Ext.data.XmlReader({
					success : "@success",
					record : "observacion"
				}, [{
							name : "codigo"
						}, {
							name : "descripcion"
						}]),
		readerAgencia : new Ext.data.XmlReader({
					success : "@success",
					record : "agencia"
				}, [{
							name : "codigo"
						}, {
							name : "descripcion"
						}]),
		readerCampoCabecera : new Ext.data.ArrayReader({}, [{
							name : "codigo"
						}, {
							name : "descripcion"
						}])

	};

	var storeDatos = {
		storeGrid : new Ext.data.Store({
					reader : modeloDatos.readerFormaGrid,
					autoLoad : false,
					url : '../../servlet/SAdministracionPedidoCompra',
					baseParams : {
						orden : "LISTAR_DETALLES_PEDIDOS",
						start : 0,
						limit : 20,
						codempresa : document.parametrosSesion.codigoEmpresa,
						codagenciapedido : '',
						codpedido : '',
						numdocumento :''
					}
					
				}),
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
		storeComboTipo : new Ext.data.Store({
					reader : modeloDatos.readerTipo,
					url : '../../servlet/ServicioTransporte',
					baseParams : {
						recursoOrden : "BADMINISTRACION_PLANTILLAS",
						datosOrden : Ext
								.encode(parametrosTransportador.obtenerTipos)
					},
					autoLoad : true
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
				}),
		storeComboFecha : new Ext.data.Store({
					reader : modeloDatos.readerFecha,
					url : '../../servlet/ServicioTransporte',
					baseParams : {
						recursoOrden : "BADMINISTRACION_PLANTILLAS",
						datosOrden : Ext
								.encode(parametrosTransportador.obtenerFechas)
					},
					autoLoad : false
				}),
		storeComboObservacion : new Ext.data.Store({
					reader : modeloDatos.readerObservacion,
					url : '../../servlet/ServicioTransporte',
					baseParams : {
						recursoOrden : "BADMINISTRACION_PLANTILLAS",
						datosOrden : Ext
								.encode(parametrosTransportador.obtenerObservaciones)
					},
					autoLoad : false
				}),
		storeComboAgencia : new Ext.data.Store({
					reader : modeloDatos.readerAgencia,
					url : '../../servlet/ServicioTransporte',
					baseParams : {
						recursoOrden : "BADMINISTRACION_CUENTAS_AGENCIA",
						datosOrden : Ext
								.encode(parametrosTransportador.obtenerAgencias)
					},
					autoLoad : false
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
		storeComboEstadoPedido : new Ext.data.Store({
					url : "../../servlet/SAdministracionGeneral",
					autoLoad : true,
					baseParams : {
						orden : "OBTENER_ESTADOS",
						codempresa : document.parametrosSesion.codigoEmpresa,
						codestados : "1,2,3,4,5,6,7"
						
					},
					reader : new Ext.data.XmlReader({
								record : "estados",
								totalRecords : "@total_registros"
							}, [
								{name : "codigo"},
								{name : "descripcion"}])
				}),
		storeCampoCabecera : new Ext.data.Store({
					reader : modeloDatos.readerCampoCabecera
				})
	};

	storeDatos.storeCampoCabecera.loadData(campoCabecera);

	var componentes = {
		
		txtnombres : new Ext.form.TextField({
					fieldLabel : "N°Pedido",
					name : "npedido",
					labelStyle: 'font-weight:bold; font-size:18px;',
					readOnly : false,
					width : 150,
					labelSeparator :" ",
					value : "00001",
					disabled  : true
		}),
		
		txtapellidos : new Ext.form.TextField({
					fieldLabel : "Agencia",
					name : "txtagencia",
					readOnly : true,
					width : 264,
					value : document.parametrosGlobal.nombreAgencia
		}),
		
		txtdireagencia : new Ext.form.TextField({
					fieldLabel : "Direcci&oacute;n",
					name : "txtdireagencia",
					readOnly : true,
					width : 264,
					value :  document.parametrosGenerales.direccionAgencia
		}),
		
		cmbEstadoPedido : new Ext.form.ComboBox({
					fieldLabel : "Estado",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboEstadoPedido,
					triggerAction : "all",
					editable : false,
					hiddenName : "estadopedido",
					mode : "local",
					width:130,
					//emptyText : "Seleccione una Forma de Pago",
					allowBlank : false,
					disabled : true,
					value : 4
				}),
		cmbFormaPago : new Ext.form.ComboBox({
					fieldLabel : "Forma Pago",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboFormaPago,
					triggerAction : "all",
					editable : false,
					hiddenName : "formapago",
					mode : "local",
					width:130,
					emptyText : "Seleccione una Forma de Pago",
					allowBlank : true,
					value : 1
				}),
		cmbSistemas : new Ext.form.ComboBox({
					fieldLabel : "Sistema",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboSistema,
					triggerAction : "all",
					editable : false,
					hiddenName : "sistema",
					mode : "remote",
					emptyText : "Seleccionar el Sistema",
					allowBlank : false
				}),
		cmbTipos : new Ext.form.ComboBox({
					fieldLabel : "Tipo Diario",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboTipo,
					triggerAction : "all",
					editable : false,
					hiddenName : "tipo",
					mode : "remote",
					emptyText : "Seleccionar el Tipo",
					allowBlank : false
				}),
		cmbDocumentos : new Ext.form.ComboBox({
					fieldLabel : "Documento",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboDocumento,
					triggerAction : "all",
					editable : false,
					hiddenName : "documento",
					mode : "remote",
					emptyText : "Seleccionar el Documento",
					allowBlank : false
				}),
		cmbFechas : new Ext.form.ComboBox({
					fieldLabel : "Fecha",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboFecha,
					triggerAction : "all",
					editable : false,
					hiddenName : "fecha",
					mode : "remote",
					emptyText : "Seleccionar ",
					allowBlank : false
				}),
		cmbObservaciones : new Ext.form.ComboBox({
					fieldLabel : "Observaciï¿½n",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboObservacion,
					triggerAction : "all",
					editable : false,
					hiddenName : "observacion",
					mode : "remote",
					emptyText : "Seleccionar ",
					allowBlank : false
				}),
		cmbEmpresas : new Ext.form.ComboBox({
					fieldLabel : "Empresa",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboEmpresasLocal,
					triggerAction : "all",
					editable : false,
					hiddenName : "empresa",
					mode : "local",
					emptyText : "Seleccionar la Empresa",
					allowBlank : false
				}),
		cmbAgencias : new Ext.form.ComboBox({
					fieldLabel : "Agencia",
					valueField : "codigo",
					displayField : "descripcion",
					store : storeDatos.storeComboAgencia,
					triggerAction : "all",
					editable : false,
					hiddenName : "agencia",
					mode : "remote",
					emptyText : "Seleccionar la Agencia",
					allowBlank : false
				}),
		txtCodigo : new Ext.form.TextField({
					fieldLabel : "Codigo",
					name : "codigo",
					readOnly : false,
					width : 164
				}),
		
		txtidentificacion : new Ext.form.TextField({
					fieldLabel : "Moneda",
					name : "txtmoneda",
					readOnly : false,
					width : 130,
					value : "DOLAR",
					disabled : true
				}),
		txtDireccion : new Ext.form.DateField({
					fieldLabel : "F/. Pedido",
					width : 130,
					dateFormat:"d/m/Y", 
					value : new Date(),
					disabled : true
				}),
		txtFechaRequerida : new Ext.form.DateField({
					fieldLabel : "F/. Entrega",
					width : 130,
					value : new Date(),
					dateFormat:"d/m/Y",
					readOnly:false,
					allowBlank: true,
					minValue:new Date()
				}),
		txtDescripcion : new Ext.form.TextField({
					fieldLabel : "Descripcion",
					name : "descripcion",
					readOnly : false,
					width : 164
				}),
		txttelefonoCelular : new Ext.form.TextField({
					fieldLabel : "Celular",
					name : "txttelefonoCelular",
					readOnly : false,
					width : 164,
					maskRe : /[\d\.]/,
					regex : /^\d+(\.\d{1,2})?$/
				}),
		txttelefonoFijo1 : new Ext.form.TextField({
					fieldLabel : "fijo 1",
					name : "txttelefonoFijo1",
					readOnly : false,
					width : 164,
					maskRe : /[\d\.]/,
					regex : /^\d+(\.\d{1,2})?$/
				}),
		txttelefonoFijo2 : new Ext.form.TextField({
					fieldLabel : "fijo 2",
					name : "txttelefonoFijo2",
					readOnly : false,
					width : 164,
					maskRe : /[\d\.]/,
					regex : /^\d+(\.\d{1,2})?$/
				}),
		txtEmail : new Ext.form.TextField({
					id:"txtEmail",
					fieldLabel : "Identif.",
					name : "nombreProveedor",
					labelSeparator :" ",
					readOnly : true,
					width : 164
				}),
		txtContacto : new Ext.form.TextField({
					fieldLabel : "Contacto",
					name : "txtcontacto",
					readOnly : true,
					width : 164
				}),
		txttelefono : new Ext.form.TextField({
					fieldLabel : "Telefono",
					name : "txttelefo",
					readOnly : true,
					width : 100
				}),
		txtCelular : new Ext.form.TextField({
					fieldLabel : "Celular",
					name : "txtCelular",
					readOnly : true,
					width : 100
				}),
		txtFax : new Ext.form.TextField({
			fieldLabel : "Fax",
			name : "txtFax",
			readOnly : true,
			width : 100
		}),
		dffechaValidez : new Ext.form.DateField({
					id : "dffechaValidez",
					name : "dffechaValidez",
					allowBlank : true,
					fieldLabel : 'Fecha Validez',
					maxLength : 30,
					readOnly : false,
					disabled : false,
					value : new Date(),
					dateFormat : "d/m/Y"
				}),
		tfcodProveedor : new Ext.form.TriggerField({
				fieldLabel : "Proveedor",
				width: 80,
				triggerClass :"x-form-browse-trigger",
				allowBlank : false,
				onTriggerClick : function() {
					//abrirAgrupador(this, "A");
					//alert("jolaaax");
					if(this.isValid()==false)
						abrirAgrupadorProveedor();
				},
				listeners : {
					//scope : this,
					specialkey : function(t, e) {
						//alert("listener special key ");
						AgrupadorProveedorSpecialKey();
					}
				}
		}),
		txtNomProveedor : new Ext.form.TextField({
					id:"txtNomProveedor",
					fieldLabel : "",
					hideLabel:true,
					name : "txtNomProveedor",
					labelSeparator :" ",
					readOnly : true,
					width : 164
		}),
		cmbesTransportista : new Ext.form.ComboBox({
					fieldLabel : "Es Transp.",
					allowBlank : false,
					name : "cmbesTransportista",
					emptyText : "Seleccione uno ...",
					store : new Ext.data.SimpleStore({
								fields : ["codigo", "descripcion"],
								data : [["S", "SI"], ["N", "NO"]]
							}),
					triggerAction : "all",
					mode : "local",
					width : 70,
					readOnly : true,
					typeAhead : false,
					editable : false,
					disabled : true,
					forceSelection : true,
					displayField : "descripcion",
					valueField : "codigo",
					lazyRender : true,
					value : "S"
				}),
		cmbtipoidentificacion : new Ext.form.ComboBox({
					fieldLabel : "Tipo Identificacion",
					allowBlank : false,
					name : "cmbtipoidentificacion",
					emptyText : "Seleccione uno ...",
					store : new Ext.data.SimpleStore({
								fields : ["codigo", "descripcion"],
								data : [["1", "CEDULA"], ["2", "RUC"],
										["3", "PASAPORTE"]]
							}),
					triggerAction : "all",
					mode : "local",
					width : 180,
					typeAhead : false,
					editable : true,
					disabled : false,
					forceSelection : true,
					displayField : "descripcion",
					valueField : "codigo",
					lazyRender : true
				}),
		cmbCampoCabecera : new Ext.form.ComboBox({
					displayField : "descripcion",
					valueField : "codigo",
					width : 145,
					triggerAction : "all",
					editable : false,
					mode : "local",
					forceSelection : true,
					hiddenName : "cabeceradetalle",
					store : storeDatos.storeCampoCabecera
				})

	};

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
	 */
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

	/**
	 * Botones de la pantalla
	 */
	var botones = {
		cmdGuardar : new Ext.Button({
					text : "Guardar Pedido",
					formBind : true,
					cls : "x-btn-text-icon",
					icon : "../../imagenes/disk.png"
				}),
		cmdCancelar : new Ext.Button({
					text : "Cerrar",
					cls : "x-btn-text-icon", 
					icon : "../../imagenes/door_out.png"
				}),
		cmdEliminar : new Ext.Button({
					text : "Eliminar",
					icon : "../../imagenes/page_delete.png",
					cls : "x-btn-text-icon"
				}),
		cmdAnular : new Ext.Button({
					text : "Anular",
					icon : "../../imagenes/cross.png",
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
							disabled:true,
							editor : new Ext.form.ChooserField({
										allowBlank : false,
										onTriggerClick : function() {
											//abrirAgrupador(this, "A");
											//alert("on tigger");
											if(componentes.cmbEstadoPedido.getValue() != 6)
												AgrupadorArticulo();
										},
										listeners : {
											scope : this,
											specialkey : function(t, e) {
												//abrirVentanaSpecialKey(t, e);
												//alert("listener special key");
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
							align:'center'
							//editor : new Ext.form.TextField({value:"UND"})
						}, {
							dataIndex : 'cantsolicitada',
							type : 'string',
							name : 'cantsolicitada',
							header : 'Cant. Solicitada',
							width : 90,
							align:'right',
							//editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						}, {
							dataIndex : 'cantrecibida',
							type : 'string',
							name : 'cantrecibida',
							header : 'Cant. Recibida',
							width : 90,
							align:'right',
							//editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'precio',
							type : 'string',
							name : 'precio',
							header : 'P. Unit',
							width : 100,
							align:'right',
							//editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'subtotal',
							type : 'string',
							name : 'subtotal',
							header : 'SubTotal',
							width : 100,
							align:'right',
							//editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'porcdescuento',
							type : 'string',
							name : 'porcdescuento',
							header : '(%) Dsct',
							width : 100,
							align:'right',
							//editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'descuento',
							type : 'string',
							name : 'descuento',
							header : 'Descuento',
							width : 100,
							align:'right',
							//editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo4
						},{
							dataIndex : 'porciva',
							type : 'string',
							name : 'porciva',
							header : '(%) Iva',
							width : 100,
							align:'right',
							//editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.12}),
							renderer : Ext.util.Format.monedaSinSimbolo
						},{
							dataIndex : 'iva',
							type : 'string',
							name : 'iva',
							header : 'IVA', 
							width : 100,
							align:'right',
							//editor : new Ext.form.TextField({maskRe:/[0-9.]/,value:0.00}),
							renderer : Ext.util.Format.monedaSinSimbolo4
						},{
							dataIndex : 'total',
							type : 'string',
							name : 'Total',
							header : 'Total',  
							width : 100,
							align:'right',
							//editor : new Ext.form.NumberField({maskRe:/[0-9.]/,value:0.00}),
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
												if(componentes.cmbEstadoPedido.getValue() != 6)
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
												if(componentes.cmbEstadoPedido.getValue() != 6)
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
 	
	var componentesFieldSet = {
		flspedido : new Ext.form.FieldSet({
		title:"-DATOS PEDIDO",
		//height:120,
		autoHeight: true,
		width:530,
		style:"padding:5px", 
		items : [
			new Ext.Panel({ 
				width : 516,
				border :true,
				layout : "form",
				labelWidth : 100,
				//style : "padding:10px",
				bodyStyle:"padding:5px",
				border : false,
				items : [componentes.txtnombres,
						componentes.txtapellidos,
						componentes.txtdireagencia,
						agruparCamposPanel(componentes.cmbFormaPago,componentes.cmbEstadoPedido,0.5,0.5,530,70),
						agruparCamposPanel(componentes.txtDireccion,componentes.txtFechaRequerida,0.5,0.5,530,70)
						//componentes.txttelefonoCelular,
						//componentes.txttelefonoFijo1
						]
			})
		]
		
		}), 
		
		flsproveedor : new Ext.form.FieldSet({
		title:"-DATOS PROVEEDOR",
		//height:120,
		autoHeight: true,
		width:380,
		items : [
			 new Ext.Panel({
				width : 430,
				layout : "form",
				labelWidth : 65,
				bodyStyle : "padding:0px",
				border : false,
				items : [
						agruparCamposPanel(componentes.tfcodProveedor,componentes.txtNomProveedor,0.3,0.4,530,65),
						componentes.txtEmail,
						componentes.txtContacto,
						agruparCamposPanel(componentes.cmbesTransportista,componentes.txttelefono,0.3,0.4,570,65),
						agruparCamposPanel(componentes.txtFax,componentes.txtCelular,0.3,0.4,570,65)
						]
			})
		]
		})
	};
	
	
	
	/* Panel secundario donde finalmente estaran los componentes */
	var panelSecundario = new Ext.Panel({
				layout : "column",
				region : "north",
				collapsible : true,
				//height : 150, 
				autoHeight: true,
				border : false,
				items : [
					new Ext.Panel({ 
						bodyStyle:"padding:10px",
						border : false,
						items:[
							componentesFieldSet.flspedido
						]
						
					}),
					new Ext.Panel({ 
						bodyStyle:"padding:10px",
						border : false,
						items:[
							componentesFieldSet.flsproveedor
						]
					})
					
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
						//guardado(); 
						GuardarPedido();
						/*
						 * configuraciones.modoActual = null;
						 * vntPrincipal.setVisible(false);
						 * panelPrincipal.getForm().reset();
						 */
					}
				});
	});
	
	botones.cmdAnular.on("click", function() {
		/*var mensajeConfirmacion = "Est&aacute; seguro que desea Guardar el Registro?"
		Ext.MessageBox.confirm("Confirmaci&oacute;n", mensajeConfirmacion,
				function(opc) {
					if (opc == "yes") {*/  
						ventanaMotivoAnulacion();
				/*	}
				});*/
	});

	botones.cmdCancelar.on("click", function() {
		var mensajeConfirmacion = "Cualquier cambio no guardado ser&aacute; perdido, ï¿½Est&aacute; seguro que desea continuar?"
		Ext.MessageBox.confirm("Confirmaci&oacute;n", mensajeConfirmacion,
				function(opc) {
					if (opc == "yes") {
						if (configuraciones.modoActual == "M") {
							// controladorBloqueos.terminarBloqueo("GENDOCUMENTOS",componentes.txtCodigo.getValue()+"-"+componentes.cmbSistemas.getValue());
						}

						configuraciones.modoActual = null;
						vntPrincipal.setVisible(false);
						panelPrincipal.getForm().reset();
					}
				});
	});

	botones.cmdEliminar.on("click", function() {
		var mensajeConfirmacion = "ï¿½Estï¿½ seguro que desea eliminar el registro?"
		Ext.MessageBox.confirm("Confirmaciï¿½n", mensajeConfirmacion, function(
						opc) {
					if (opc == "yes") {
						var codplantilla = componentes.txtCodigo.getValue();
						var codempresa = componentes.cmbEmpresas.getValue();
						document.pantallaSecundariaProceso.eliminar(
								codplantilla, codempresa);
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
	
	panelSurTotales = new Ext.Panel({
		region : "south",
		height : 70, 
		border : false,
		layout : "form",
		bodyStyle : "padding:5px", 
		html : '<div align="right" style="width:50%;float:right">'
  					+'<table border="0">'
						+'<tr>'
							+'<td class="lbl_totales">SUBTOTAL: </td><td class="field_totales" style="font-size:0.8em;" width="150px"><span id="subTotalGeneral" > </span></td>' 
							+'<td class="lbl_totales">DSCTO: </td><td class="field_totales" style="font-size:0.8em;"><span id="descuentoGeneral"> </span></td> '
							//+'<td class="lbl_totales">NETO: </td><td class="field_totales" style="font-size:0.7em;" ><span id="netoGeneral"> </span></td>' 
						+'</tr>'
						+'<tr>' 
							//+'<td class="lbl_totales">DSCTO: </td><td class="field_totales" style="font-size:0.7em;"><span id="descuentoGeneral"> </span></td> '
							+'<td class="lbl_totales">IVA: </td><td class="field_totales" style="font-size:0.8em;"><span id="impuestoGeneral"> </span></td>'
							+'<td class="lbl_totales">TOTAL: </td><td class="field_totales" style="font-size:0.8em;color:blue"><span id="totalGeneral"><br><br></span></td>'
						+'</tr>' 
						//+'<tr></tr>'
					+'</table>'
				+'</div>' 
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
		items : [panelSecundario, PanelgridDatos, panelSurTotales], 
		buttons : [ botones.cmdAnular/*,botones.cmdGuardar*/,botones.cmdCancelar]
	});

	/* Ventana del proceso */
	var vntPrincipal = new Ext.Window({
		xtype : "window",
		title : "Mantenimiento Orden Pedido",
		width : 990,
		height : 600, 
		resizable : false,
		modal : true,
		closable : false,
		closeAction : "hide", 
		layout : "border",
		draggable : false, 
		items : [panelPrincipal]
			// ,
			// bbar: controladorBloqueos.crearBarraBloqueos()
		});

	/* Prepara los componentes de la ventana principal */
	var prepararVentana = function() {
		panelPrincipal.getForm().reset();
		// componentes.txtCodTipoMovimiento.setVisible(false);

		componentes.cmbAgencias.disable();
		componentes.cmbFechas.disable();
		componentes.cmbObservaciones.disable();
		componentes.cmbDocumentos.disable();
		componentes.txtFechaRequerida.disable();
		componentes.cmbFormaPago.disable(),

		botones.cmdCancelar.setVisible(true);
		
		if (configuraciones.modoActual == "I") {

			componentes.cmbAgencias.enable();
			componentes.txtCodigo.enable();
			componentes.cmbEmpresas.enable();
			botones.cmdEliminar.setVisible(false);
			componentes.cmbSistemas.enable();
			componentes.cmbTipos.enable();
			// botones.cmdGuardar.setVisible(true);
			componentes.tfcodProveedor.enable();

		} else {
			componentes.cmbAgencias.disable();
			componentes.txtCodigo.disable();
			componentes.cmbEmpresas.disable();
			componentes.cmbFechas.enable();
			componentes.cmbObservaciones.enable();
			componentes.cmbSistemas.disable();
			componentes.cmbTipos.disable();
			botones.cmdEliminar.setVisible(true);
			componentes.tfcodProveedor.disable();
			
		}

	};
	
	function cargarDetallesPedido (data){
		
		storeDatos.storeGrid.baseParams.codagenciapedido = data.codagencia;
		storeDatos.storeGrid.baseParams.codpedido = data.codorden;
		storeDatos.storeGrid.baseParams.numdocumento = data.numdocumento;

		storeDatos.storeGrid.load({
			params : {
				codagenciapedido : data.codagencia,
				codpedido : data.codorden,
				numdocumento: data.numdocumento
			}
		});
		
		(function(){
			calcularValoresGenerales(Ext.getCmp("gridDatos"));
		}).defer(300);
		
	}; 
	
	function setTotales(subtotal,neto,descuento,iva,total){
		var subTotalGeneral = document.getElementById("subTotalGeneral");
		var descuentoGeneral = document.getElementById("descuentoGeneral");
		//var netoGeneral = document.getElementById("netoGeneral");
		var impuestoGeneral = document.getElementById("impuestoGeneral");
		var totalGeneral = document.getElementById("totalGeneral"); 
		
		//seteo
		subTotalGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo((subtotal!=null?subtotal:0));
		descuentoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo((descuento!=null?descuento:0));
		//netoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo((neto!=null?neto:0));
		impuestoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo((iva!=null?iva:0));
		totalGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo((total!=null?total:0));
		/** 
		var sg = 196.80;
		subTotalGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(sg);
		totalGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(220.416);
		descuentoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(0.00);
		netoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(sg);
		var x = (sg*0.12);
		impuestoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(23.616);
		
		subTotalGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(0);
		totalGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(0);
		descuentoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(0.00);
		netoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(0);
		impuestoGeneral.innerHTML = Ext.util.Format.monedaSinSimbolo(0);
		**/
	} 
	
	

	

	Ext.getCmp("gridDatos").on('beforeedit', function(e) {
				// validaEdicionDetalle(e);
			});
	/*
	 * var validaEdicionDetalle = function(e) { var grilla=
	 * gridDatosTransferencia; grilla.suspendEvents(); var
	 * sel=grilla.getSelectionModel().getSelectedCell(); //aqui van las reglas
	 * para dejar q se editen las lineas del grid if(sel!==null){ var record =
	 * gridDatosTransferencia.getStore().getAt(sel[0]); var puedeeditar =
	 * record.get('editable'); if(!puedeeditar){ e.cancel=true; } }
	 * 
	 * grilla.resumeEvents(); }
	 * 
	 */

	

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

	var guardarPlantilla = function() {

		var grid = Ext.getCmp("gridDatos");
		var gridDatos = Ext.getCmp("gridDatos");
		gridDatos.store.commitChanges();
		var sel = grid.getSelectionModel().getSelectedCell();

		if (grid.store.getCount() > 0) {
			guardado();

		} else {
			Ext.Msg.show({
						title : "Atenci&oacute;n",
						msg : "Debe ingresar al menos un detalle.",
						icon : Ext.Msg.INFO,
						buttons : Ext.Msg.OK
					});
		}

	}

	/**
	 * metodo que me permite mostrar
	 */

	var cargarPlantilla = function(codproveedor, codempresa) {

		var params = {
			url : "servlet/SAdministracionProveedores",
			params : {
				orden : "OBTENER_PROVEEDOR",
				// datosOrden:
				// Ext.encode(parametrosTransportador.consultarPlantilla),
				codproveedor : codproveedor,
				codempresa : codempresa
			},
			callback : function(option, success, response) {
				var respuesta = Ext.decode(response.responseText);

				if (success) {
					if (respuesta.exito) {
						configuraciones.codProveedor = respuesta.codproveedor;
						componentes.txtnombres.setValue(respuesta.nombre);
						componentes.txtapellidos.setValue(respuesta.apellido);
						componentes.txtidentificacion
								.setValue(respuesta.identificacion);
						componentes.txtDireccion.setValue(respuesta.direccion);
						componentes.txttelefonoCelular
								.setValue(respuesta.celular);
						componentes.txttelefonoFijo1.setValue(respuesta.tfijo1);
						componentes.txttelefonoFijo2.setValue(respuesta.tfijo2);
						componentes.cmbtipoidentificacion
								.setValue(respuesta.tidentificacion);
						componentes.cmbesTransportista
								.setValue(respuesta.estransportista);
						componentes.txtEmail.setValue(respuesta.email);
						componentes.txtFax.setValue(respuesta.fax);
						componentes.dffechaValidez
								.setValue(respuesta.fechavalidez);

					} else {
						Ext.Msg.show({
									title : "Error",
									msg : "Error al obtener el proveedor: "
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

		Ext.Ajax.request(params);

	};
	
	/**
	 * metodo que me permite mostrar y cargar datos
	 */
	var cargarRegistro = function(data) {
		/**
		 * {name : "codorden"},
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
			{name : "fechamodificacion"} 1985
		 */
		componentes.txtnombres.setValue(obtenerNumeropedido(data.codorden)); 
		componentes.cmbFormaPago.setValue(data.codtipopago);
		componentes.txtDireccion.setValue(data.fechacreacion);
		componentes.txtFechaRequerida.setValue(data.fecharequerida);
		componentes.cmbEstadoPedido.setValue(data.codestado);
		componentes.cmbEstadoPedido.setValue(data.codestado);
		componentes.tfcodProveedor.setValue(data.codproveedor);
		
		
		var time = 200;
		(function(){
			componentes.tfcodProveedor.fireEvent("specialkey");
		}).defer(time);
	};
	
	/* Abre la ventana en el modo indicado */
	this.abrirVentana = function(modo,data) {
		var gridDatos = Ext.getCmp("gridDatos");
		configuraciones.modoActual = modo;
		prepararVentana();
		vntPrincipal.setVisible(true);
		vntPrincipal.center();
		gridDatos.getStore().removeAll();

		// Ext.getCmp("porvariable").setValue(true);

		if (modo == "M"){
			cargarRegistro(data);
			cargarDetallesPedido(data);
		}
		setTotales();
	};

	this.eliminar = function(codproveedor, codempresa) {

		var parametros = {
			url : "servlet/SAdministracionProveedores",
			params : {
				orden : "ELIMINAR_PROVEEDOR",
				codproveedor : codproveedor,
				codempresa : codempresa
			},
			callback : function(option, success, response) {
				var respuesta = Ext.decode(response.responseText);

				// Si hubo exito
				if (respuesta.exito) {
					// if(configuraciones.modoActual=="M")
					// controladorBloqueos.terminarBloqueo("WMSCLIENTE",codcliente);

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
	
	var abrirAgrupadorProveedor = function(){
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
		/*
		function abrirAgrupadorProveedor(){
			
		};
		*/
		this.getDataSelection = function(data){
			if (data == null)
				return;
			
			seteoProveedor(data);
		}
		
		function seteoProveedor(data){
			componentes.tfcodProveedor.setValue(data.codproveedor),
			componentes.txtNomProveedor.setValue(data.desproveedor),
			componentes.txtEmail.setValue(data.identificacion),
			componentes.txtContacto.setValue(data.contacto),
			componentes.txtFax.setValue(data.fax),
			componentes.cmbesTransportista.setValue(data.estransp),
			componentes.txttelefono.setValue(data.telfijo),
			componentes.txtCelular.setValue(data.celular)
		}
		
		ventanaF.abrirVentanaFiltros();
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
	var GuardarPedido  = function(){
		var paramsGuardar = {
			url : "../../servlet/SAdministracionPedidoCompra",
			params : {
					//CABECERA PEDIDO
					orden : "GUARDAR_PEDIDO",
					codEmpresa : document.parametrosSesion.codigoEmpresa,
			        codagenciapedido : document.parametrosSesion.codigoAgencia,
			        numerocompra: componentes.txtnombres.getValue(),
			        tipopedido: 1,//
			        codestado: 1, //
			        tipopago: componentes.cmbFormaPago.getValue(),
			        codproveedor: componentes.tfcodProveedor.getValue(),
			        codusuariocreacion: document.parametrosSesion.codigoUsuario,
			        fechacreacion: componentes.txtDireccion.getRawValue(),
			        descripcion: "PEDIDO NUEVO", //
			        fecha_requerida: componentes.txtFechaRequerida.getRawValue(),
			        fecha_promesa: componentes.txtFechaRequerida.getRawValue(),
			        subtotal: document.getElementById("subTotalGeneral").innerHTML,
			        descuento: document.getElementById("descuentoGeneral").innerHTML,
			        porcimpuesto: 12, //
			        impuesto: document.getElementById("impuestoGeneral").innerHTML,
			        total : document.getElementById("totalGeneral").innerHTML,
			        //Detalle Pedido
			        detallePedido: obtenerJSONGrid("gridDatos")
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
	
	/**
	 * Ventana Filtros Version 1.0 Janchundia
	 */
	var AgrupadorProveedorSpecialKey = function(){
		var JsonRetorno = null;
		var Codigo = componentes.tfcodProveedor.getValue() || 0;
		
		if(Codigo != 0 && Codigo != ""){
			var agrupador = new Busquedaxcodigo({
				apuntador : this,
				url : "../../servlet/SAdministracionProveedores",
				orden : "AGRUPADOR_PROVEEDOR",
				codigo : Codigo
			});
			 
			this.getDataSelection = function(data){
				if (data == null){
					abrirAgrupadorProveedor(); 
				}else{
					//alert("ojo "+data); 
					componentes.tfcodProveedor.setValue(data.codproveedor),
					componentes.txtNomProveedor.setValue(data.desproveedor),
					componentes.txtEmail.setValue(data.identificacion),
					componentes.txtContacto.setValue(data.contacto),
					componentes.txtFax.setValue(data.fax),
					componentes.cmbesTransportista.setValue(data.estransportista),
					componentes.txttelefono.setValue(data.telfijo),
					componentes.txtCelular.setValue(data.celular)
				}
			};
			agrupador.cargarFiltroCodigo();
		}else{
			abrirAgrupadorProveedor(); 
		}
	};
	
	function cargarDatosArticulos(grid,record, posFila, codarticulo) {
		
			Ext.Ajax.request({  
				url:"../../servlet/SArticulos", 
				params:{
					accion:"articulosPedido",
					numpedido:Ext.getCmp('numpedido').getValue(),
					codigoRegistro:codarticulo,
					//codunidadmedida:codunidad,
					codcliente:codCliente,
					//Miguel Vargas 25/05/2016
					codbodegaagencia: cod_bodega_agencia}, 
				success:function (A, B) {
					if (A.responseText) {
						obj = Ext.util.JSON.decode(A.responseText);
					} else {
						if (B.result) {
							obj = B.result;
						}
					}
					if(obj.valid){
						var codarticulo = obj.codarticulo;
						var codalterno = obj.codalterno;
						var descripcion = obj.detalle;
						var precio = obj.precio;
						var unidadMedida = obj.unidadmedida;
						var unidadMedidaBase = obj.unidadmedidabase;
						var incluyeiva = obj.incluyeiva || false;
						var calculaiva = obj.calculaiva || true;							
						var maxdescuento = obj.maxdescuento || 100;
						var stock = obj.cantidad || 0;
						var stockPendApr = obj.stockPendApr || 0; 
						var permisoStockCero = obj.permisoStockCero;
						var linea = obj.linea;						
											
						if(stock == 0 && !!!permisoStockCero){
							Ext.MessageBox.show({title:"Atenci\xf3n", msg:'Al momento no esta permitido registrar articulos sin stock existente, por favor seleccione otro o finalize la operación', buttons:Ext.MessageBox.OK, icon:Ext.MessageBox.INFO});
							return false;
						}
						if(isNaN(codarticulo) || !codalterno || !unidadMedida || isNaN(precio)){
							return false;
						}
						
						if(!record.get('cantidad')){
							record.set('cantidad',1);
						}
						
						/*************** OBTENGO IVA *************/
						var iva = (document.parametrosSesion.impuestoVenta*1)/100; //Ext.getCmp('iva').getValue()/100;
						
						/********** OBTENGO EXENTO IVA ***********/		
						var excentoIva = (Ext.getCmp('excentoiva').getValue() == 'S');
						
						/********** REVISO SI ES CMPR. INTERNO ***********/
						var comprobanteInterno = (Ext.getCmp('cmpr').getValue() == CMPR_INTERNO) || (Ext.getCmp('cmpr').getValue() == CMPR_BOLETA);
						
						
						/*	CALCULOS LEGALES	*/
						if(excentoIva == false){/*SI NO ES EXCENTO DE IVA*/
							if(comprobanteInterno == false){/*SI NO ES CMPR INTERNO*/
								if(calculaiva == true){/*SI CALC. IVA*/				
									if(incluyeiva == true){					
										precio = precio / (1+iva);
									}/*..E INCLUYE IVA SE CALCULA EL IVA Y SE LO QUITA DEL PRECIO*/
								}else{/*SI NO CALC. IVA*/				
								}
							}else{/*SI ES COMPROBANTE INTERNO*/			
								if(calculaiva == true){/*SI CALCULA IVA*/				
									if(!!incluyeiva == false){
										precio =  precio * (1+iva);
									}//NO INCLUYE IVA				
								}	
							}
						}				
							
						record.set('codarticulo',codarticulo);
						record.set('codalterno',codalterno);
						record.set('descarticulo',descripcion);
						record.set('codunidadmedida',unidadMedida);
						record.set('codunidadmedidabase',unidadMedidaBase);
						
						
						var cm= grid.getColumnModel();					
						var editor= cm.getCellEditor(cm.findColumnIndex('precio'),posFila); // 8
								
						// Modificado por Luis Alberto									
						// Si el usuario cambio precio, no seteamos
						var flagCambio=false;					
						for(i=0;i<arrCambioPrecio.length;i++){ 
							var fila= arrCambioPrecio[i].split('?')[0];
							var codigo= arrCambioPrecio[i].split('?')[1];
													
							// Si estamos en la misma fila
							if(fila*1==posFila*1){
								// El codigo debe ser distinto para cambiar de precio
								if(codigo==codalterno){ 
									flagCambio=true;
								}							
								else{
									flagCambio=false;
								}
							}
						}
							
						if(!flagCambio){
							record.set('precio',precio);
							record.set('preciooriginal',precio);
							record.set('descuento',0);						
						}
																			
						record.set('incluyeiva',incluyeiva);
						record.set('calculaiva',calculaiva);
						record.set('maxdescuento',maxdescuento);
						record.set('permisoStockCero',permisoStockCero);
						
						record.set('unidadmedida',unidadMedida);
						record.set('stockActual',stock);
						record.set('stockPendApr',stockPendApr);
						record.set('linea',linea);
						record.commit();
						
						//setTotalesCabecera(grid);
						calcularTotalesDetalle(record);
						setTotalesCabecera(grid);	
						grid.startEditing(posFila, 8);// - setea el foco en cantidad
					}else{
						var codalt = record.get('codalterno');
						record.set('codarticulo','');
						record.set('codalterno','');
						record.commit();
						ventanaSeleccion2(codalt);
					}
					
				},
				failure: function(A,B){
					Ext.MessageBox.show({title:"Atenci\xf3n", msg:getMensajeAjax(A, B, "msg"), buttons:Ext.MessageBox.OK, icon:Ext.MessageBox.INFO});
				}
			});
		
	};
	
	var ventanaMotivoAnulacion = function (){
		
	/**
	* Funcion que cierra la ventana de autenticacion
	*/
	function cerrarVentanaMotivoAnulacion(){
		if(vtnMotivoAnulacion.isVisible())		
			vtnMotivoAnulacion.setVisible(false);
	}
	 
	var txtMotivoAnulacion= new Ext.form.TextArea({id:"txtMotivoAnulacion",fieldLabel:"Motivo",allowBlank:false,width:200,height:50,maxLength:200,maxLengthText:'Por favor ingrese hasta 200 caracteres'});
			
	var btnAceptar1= new Ext.Button({
		icon:'../../imagenes/aceptar.png',
		text:'Aceptar',
		formBind:true,
		cls:'x-btn-text-icon',
		listeners:{
			'click':{
				scope:this, 
				fn:function(){
					anularPedido();
				}
			}
		}
	});
	
	var btnCancelar1= new Ext.Button({
		icon:'../../imagenes/cancel.png',
		text:'Cancelar',
		formBind:false,
		cls:'x-btn-text-icon',
		listeners:{
			'click':{
				scope:this, 
				fn:function(){
					cerrarVentanaMotivoAnulacion();					
				}
			}
		}
	});
	
	
	/**
	* Forma de la ventana de autenticacion
	*/
	var formMotivoAnulacion= new Ext.form.FormPanel({
		region:'center',
		bodyStyle:'padding:10px',
		monitorValid:true,
		height:200,
		width:220,
		labelWidth:50,
		items:[
			txtMotivoAnulacion	 		
		],
		buttons:[
			btnAceptar1,
			btnCancelar1
		]
	});
	
	
	/**
	* Ventana para ingresar el motivo de la anulacion
	*/
	var vtnMotivoAnulacion= new Ext.Window({		
		autoWidth:false,		
		shadow:false,
		autoScroll:true,
		layout:'border',
		title:'Motivo de la Anulaci&oacute;n',
		width:300, //250
		height:150,
		closable:false,
		closeAction:'hide',
		resizable:false,
		modal:true,
		draggable:false,
		constrain:true, 
		constrainHeader:true,
		items:[
			formMotivoAnulacion
		]	
	});
		
		vtnMotivoAnulacion.show();
		vtnMotivoAnulacion.center();
		
	function anularPedido(){
		var motivoAnulacion = Ext.getCmp("txtMotivoAnulacion").getValue(); 
		cerrarVentanaMotivoAnulacion();
		
		var params = {
			url : "../../servlet/SAdministracionPedidoCompra",
			params : {
					orden : "ANULAR_PEDIDO",
					codEmpresa : document.parametrosSesion.codigoEmpresa,
			        codagenciapedido : document.parametrosSesion.codigoAgencia,
			        numerocompra: componentes.txtnombres.getValue(),
			        tipopedido: 1,
			        codestado: 3,
			        motivoanulacion: motivoAnulacion,
			        codusuario: document.parametrosSesion.codigoUsuario
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
		
		Ext.Ajax.request(params);
		
	}

	};
	
	
};

	