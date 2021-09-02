var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
	
		 //Cargamos los items al select de Especialidad
		 $.post("../ajax/agenda.php?op=selectesp", function(r){
			$("#esp_id").html(r);
			$('#esp_id').selectpicker('refresh');
	});

}


//Función Listar
function listar()
{
	var fecha_inicio = $("#fecha_inicio").val();
	var fecha_fin = $("#fecha_fin").val();
    var esp_id = $("#esp_id").val();

	tabla=$('#tbllistado').dataTable(
	{

		language: {
			"lengthMenu": "Mostrar _MENU_ registros",
			"zeroRecords": "No se encontraron resultados",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sSearch": "Buscar:",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast":"Último",
				"sNext":"Siguiente",
				"sPrevious": "Anterior"
			 },
			 "sProcessing":"Procesando...",
		},

		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		        ],
		"ajax":
				{
					url: '../ajax/consultas.php?op=citasmedicas',
					data:{fecha_inicio: fecha_inicio,fecha_fin: fecha_fin,esp_id:esp_id},
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


init();