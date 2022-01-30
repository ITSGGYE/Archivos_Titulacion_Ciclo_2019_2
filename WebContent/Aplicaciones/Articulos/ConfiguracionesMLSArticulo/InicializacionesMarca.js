Ext.onReady(function() {
			document.pantallaPrincipalProceso = new ConfiguracionArticulo();
			document.pantallaSecundariaProceso = new ConfiguracionArticuloProceso();
});


/*** Banderas Estados ***/
var flagEstado = function(codEstado){
	var descripcion = '';
	switch((codEstado*1)){
	case 1:
		descripcion = "<center><img src=../../imagenes/flag_green.png alt='Activo'/> </center>";
		break;
	case 2:
		descripcion = "<center> <img src=../../imagenes/flag_red.png alt='Inactivo'/> </center>";
		break;
	case 3:
		descripcion = "<img src=../../imagenes/page_delete.png alt='Anulado'/>  Anulado";
		break;
	default:
		descripcion = " -- NO DEFINIDO -- ";
		break;
	}
	return descripcion;
};

var configuracion = {
	tituloVtnProceso : "AÑADIR MARCA",
	icon: "iconoMarca",
	ancho : 320,
	alto: 130,
	orden : "GUARDAR_MARCA",
	store : new Ext.data.Store({
			url : "../../servlet/SAdministracionUMedidas",
			autoLoad : true,
			baseParams : {
				orden : "LISTARMARCASFILTROS",
				start : 0,
				limit : 20,
				codempresa: document.parametrosSesion.codigoEmpresa, 
				codigo : '0',
				descripcion:'',
				tiporespuesta:"XML"
			},
			reader : new Ext.data.XmlReader({
						success : "@success",
						record : "marcas",
						totalRecords : "@totalRegistros"
					}, [
						{name : "codigo"},
						{name : "descripcion"}, 
						{name : "ucreacion"},
						{name : "ufecha"}
						])
		}),
	cm : [new Ext.grid.RowNumberer(), new Ext.grid.CheckboxSelectionModel(),
		{dataIndex : "codigo",header : "COD. MARCA",width : 100,hidden : false},
		{dataIndex : "descripcion", id: "DESCRIPCION",header : "codarticulo",width : 100,hidden : false},
		{dataIndex : "ucreacion",header : "U. Creaci&oacute;n",width : 100}, 
		{dataIndex : "ufecha",header : "Fecha Creaci&oacute;n",width : 100}
		]
};