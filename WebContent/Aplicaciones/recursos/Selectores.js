/**
 * 
 */

var SelectoresFiltros = function (configuracion){
	
	var ParametrosGenerales = {
		tituloVentana : configuracion.tituloVentana,
		ancho: configuracion.ancho,
		alto: configuracion.alto,
		store: configuracion.store,
		cm: configuracion.cm,
		registrosPorPagina: (configuracion.registrosPorPagina!=null?configuracion.registrosPorPagina:20),
		tituloOpcionCodigo: configuracion.tituloOpcionCodigo,
		tituloOpcionDescripcion: configuracion.tituloOpcionDescripcion,
		apuntador: configuracion.apuntador,
		url : configuracion.url,
		orden : configuracion.orden,
		codigoB : configuracion.codigo,
		valoresPrecargados: configuracion.valoresPrecargados,
		codigos: configuracion.codigos,
		nombres: configuracion.nombres,
		sm: configuracion.sm,
		nombreSelector: configuracion.nombreSelector
	};
	
	//var check = new Ext.grid.CheckboxSelectionModel({singleSelect:false});
	
	var documento = {
			apuntador:this,
			codigos:[],
			nombres:[],
			valoresPrecargados:[],
			reload: true
	};
	
	var registro = null;
	
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
		
		
	var rdBusquedaEL1 = new Ext.form.Radio({
		boxLabel: ParametrosGenerales.tituloOpcionCodigo,//
		//:ParametrosGenerales.tituloOpcionCodigo,
		name:"cpBusqueda",
		inputValue:"C",
		checked:true
	});
	
	var rdBusquedaEL2 = new Ext.form.Radio({
		boxLabel:ParametrosGenerales.tituloOpcionDescripcion,
		name:"cpBusqueda",
		inputValue:"D"
	});
	
	var grupoRadio = new Ext.form.RadioGroup({
		hideLabel:true,
		width:200,
		height:26,
		//rendered:true, 
		//itemCls: 'x-check-group-alt',
		//colums:2,
		//vertical: true,
		items:[rdBusquedaEL1,rdBusquedaEL2]
	});
	
	var txtCodBusqueda = new Ext.form.TextField({
	
		emptyText:"Criterio de Búsqueda",
		value: "",
		hideLabel : true,
		maxLength:50
	});
	
	var botonFiltroCancelar = new Ext.Toolbar.Button({
		text:"Cerrar",
		icon:"../../imagenes/cancel.png",
		cls:"x-btn-text-icon"
	});
	
	var botonFiltroAceptar = new Ext.Toolbar.Button({
		text:"Aceptar",
		icon:"../../imagenes/accept.png",
		cls:"x-btn-text-icon"
	});
	
	var comboFiltro = new Ext.form.ComboBox({
	       	fieldLabel : "Estado",
			valueField : "codigo",
			displayField : "descripcion",
	        triggerAction : "all",
			editable : false,
			fieldClass: "x-form-field",
			hiddenName : "estadopedido",
			mode : "local",
			width:130,
			//emptyText : "",
			allowBlank : false, 
	        width:135,
	        store:  new Ext.data.SimpleStore({
					autoLoad : true,
					fields : ["codigo", "descripcion"],
					data : [["0", "Codigo"],
							["1", "Descripcion"]]
				}),
			value:1
	    });
	
	var gridVentana = new Ext.grid.GridPanel({
		region:"center",
		store: ParametrosGenerales.store, 
		stripeRows: true,
		loadMask:true,
		enableColumnMove : false,
		clicksToEdit : 1,
		autoScrolls : true,
		border : false, 
		sm: ParametrosGenerales.sm,
		viewConfig:{emptyText:"-- No Hay Datos que Mostrar --"},
		columns:ParametrosGenerales.cm,
		bbar: new Ext.PagingToolbar({
				displayInfo:true,
				autoShow:true, 
				//displayMsg:'Registros del {0} al {1}, con un total de: {2} registro(s)',
				width: ParametrosGenerales.ancho-14,
				pageSize:ParametrosGenerales.registrosPorPagina,
				store: ParametrosGenerales.store
			}) 
	});
	
	var panelradio = new Ext.Panel({
		layout:"form",
		width: 200,
		frame:false,
		border:false,
		bodyStyle:"background:#D0DEF0 repeat-x scroll left top",
		height:28,
		items:[grupoRadio]
	});
	
	var panelnortebusqueda = new Ext.Panel({
		width: ParametrosGenerales.ancho,
		height: 35,
		layout:"form",
		frame:true,
		bodyStyle:"padding:0px",
		border:false,
		autoScroll :false, 
		region: 'north', 
		items : [
			agruparCamposPanel(panelradio,txtCodBusqueda,0.5,0.5,420,70)	
		]
	});
	//paramsComponente.instanciaGridPrincipal = gridVentana;
	
	var ventanaFiltros = new Ext.Window({
			title: ParametrosGenerales.tituloVentana, 
			iconCls:"iconoVentanaAgrupador",
			width: ParametrosGenerales.ancho,
			height: ParametrosGenerales.alto,
			closable: false,
			modal: true,
			layout: "border", 
			//region : 'center',
			items: [panelnortebusqueda,gridVentana],
			resizable: false, 
			draggable: false,
			frame: true,
			closeAction : "hide",
			buttons: [botonFiltroAceptar, botonFiltroCancelar]

	});
		
	
	
	this.abrirVentanaFiltros = function(){
		ventanaFiltros.show();
		ventanaFiltros.center();
		
		prepararVentana();
		gridVentana.getStore().load({
				params : { 
					start : 0,
					limit : 10, 
					tiporespuesta : "XML"
				}
		});
		
		if(ParametrosGenerales.valoresPrecargados.length > 0){
			(function(){
			var existe = 0;
			var recs = [];
			var i = 0;
			var store = gridVentana.getStore();
			
			store.each(function(registro){
				existe = ParametrosGenerales.valoresPrecargados.indexOf(registro.get("codigo"));
				if(existe >= 0){
					recs.push(i);
				}
				i++;
			});
			gridVentana.getSelectionModel().selectRows(recs);
			documento.valoresPrecargados = [];
			}).defer(150);
		}
		
	}
	
	
	/**
	 * Funciones
	 */
	txtCodBusqueda.on("specialkey",function(){
		var cadenaCheck = documento.apuntador.obtenerSoloCodigosEscogidos();
		var campo = rdBusquedaEL1.getGroupValue();
		//alert(rdBusquedaEL1.getGroupValue());
		if(campo == 'C'){
			gridVentana.getStore().baseParams.codigo =  txtCodBusqueda.getValue();
		}else if (campo == 'D'){
			gridVentana.getStore().baseParams.descripcion =  txtCodBusqueda.getValue();
		}
		
		gridVentana.getStore().load({params : {	start : 0, limit : 20 } });
		
		if(cadenaCheck.length > 0){
			(function(){
			var existe = 0;
			var recs = [];
			var i = 0;
			var store = gridVentana.getStore();
			
			store.each(function(registro){
				existe = cadenaCheck.indexOf(registro.get("codigo"));
				if(existe >= 0){
					recs.push(i);
				}
				i++;
			});
			gridVentana.getSelectionModel().selectRows(recs);
			}).defer(150);
		}
	});
	
	botonFiltroAceptar.on("click",function(){
		//registroSeleccionado();
		//var cd = documento.apuntador.obtenerSoloCodigosEscogidos();
		//alert(cd);
		//documento.codigos = cd;
		documento.apuntador.clickAceptar();
		ventanaFiltros.setVisible(false);
	});
	
	
	botonFiltroCancelar.on("click",function(){
		documento.codigos = [];
		documento.nombres = [];
		documento.valoresPrecargados = [];
		ventanaFiltros.setVisible(false);
	});
	
	function registroSeleccionado(){
		registro = gridVentana.getSelectionModel().getSelected();
		registro = registro.data;
	
		if(registro != null){
			ventanaFiltros.setVisible(false);
			ParametrosGenerales.apuntador.getDataSelection(registro);
		}
	}
	
	this.limpiar = function(){
		var imagenSelector = document.getElementById(ParametrosGenerales.nombreSelector);
		imagenSelector.src = "../../imagenes/exclamation.png";
		documento.codigos = [];
		documento.nombres = [];
		documento.valoresPrecargados = [];
		ParametrosGenerales.apuntador.seleccionados(documento.codigos);
	};
	
	this.getRegistroSel = function(){
		//return this.registro;
		return documento.codigos;
	}
	
	function prepararVentana(){
		//txtCodBusqueda.setValue("");
		//txtCodBusqueda.fireEvent('specialkey');
	}
	
	this.obtenerSoloCodigosEscogidos = function(){ 
		//Verifico si existen Valores Pre - Cargados
		if(ParametrosGenerales.valoresPrecargados.length > 0){
			ParametrosGenerales.codigos = ParametrosGenerales.valoresPrecargados;
		}
		else
		{
			var selecciones = gridVentana.getSelectionModel().getSelections();
			
			ParametrosGenerales.codigos = [];
			ParametrosGenerales.nombres = [];
			
			var nombres = "";
			if(selecciones!=null && selecciones.length>0){
				for(i=0;i<selecciones.length;i++){
					ParametrosGenerales.codigos[i] = selecciones[i].get("codigo");
					nombres = selecciones[i].get("descripcion");
					nombres = nombres.replace(/%/g,"%25");
					ParametrosGenerales.nombres[i] = nombres;
				}
			}
		}
		return ParametrosGenerales.codigos;
	};
	
	this.clickAceptar = function(){
		var selecciones = gridVentana.getSelectionModel().getSelections();
		var imagenSelector = document.getElementById(ParametrosGenerales.nombreSelector);
	
		documento.codigos = [];
		documento.nombres = [];
			
		var nombres = "";
		if(selecciones!=null && selecciones.length>0){
			for(i=0;i<selecciones.length;i++){
				documento.codigos[i] = selecciones[i].get("codigo");
				nombres = selecciones[i].get("descripcion");
				nombres = nombres.replace(/%/g,"%25");
				documento.nombres[i] = nombres;
			}
			imagenSelector.src = "../../imagenes/flag_green.png";
			documento.valoresPrecargados = documento.codigos;
		}else{
			documento.codigos = [];
			documento.nombres = [];
			documento.valoresPrecargados = [];
			imagenSelector.src = "../../imagenes/exclamation.png";
		}
		
		ParametrosGenerales.apuntador.seleccionados(documento.codigos);
		
	};
	
	this.setearBanderaValores = function(encender, listaCodigos){
		configuraciones.valoresPrecargados = [];
		if(listaCodigos != undefined && listaCodigos.length > 0) 
			configuraciones.valoresPrecargados = listaCodigos;
		
		var imagenSelector = document.getElementById(ParametrosGenerales.nombreSelector);
		if(encender){
			imagenSelector.src = "../../imagenes/flag_green.png";
		}else{
			imagenSelector.src = "../../imagenes/exclamation.png";
		}
	}
	
	Array.prototype.unique=function(a){
	  return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
	});
	
	var myArr = [ 1, 2, 3, 'foo', 'bar', 'Hello World', 2, 3, 'bar', 1, 4, 5];
	console.log( myArr.unique() ); // ["foo", "Hello World", 2, 3, "bar", 1, 4, 5]
};
