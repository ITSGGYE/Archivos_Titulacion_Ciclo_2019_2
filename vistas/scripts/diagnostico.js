var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar
function limpiar()
{
	$("#codigo").val("");
	$("#enfermedad").val("");
	$("#cod_diagnostico").val("");

}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
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
					url: '../ajax/diagnostico.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}



//Función para guardar o editar

function guardaryeditar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
		$("#btnGuardar").prop("disabled",true);
		var formData = new FormData($("#formulario")[0]);
					$.ajax({
						url: "../ajax/diagnostico.php?op=guardaryeditar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Diagnostico',
								   type: 'success',
								   text:datos
							   });
										mostrarform(false);
										tabla.ajax.reload();
							}
					});
	   limpiar();
	}


function mostrar(cod_diagnostico)
{
	$.post("../ajax/diagnostico.php?op=mostrar",{cod_diagnostico : cod_diagnostico}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#enfermedad").val(data.enfermedad); 
		$("#codigo").val(data.codigo); 
		$("#idenfermedad").val(data.cod_diagnostico);

 	})
}


//Función para desactivar registros
function desactivar(cod_diagnostico){

    swal({
        title: 'Esta seguro?',
        text: "¿Está Seguro de desactivar la Diagnostico?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "No",
        cancelButtonColor: '#FF0000',
        confirmButtonColor: '#008df9',
        confirmButtonText: "Si",
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true
        },function(isConfirm){
        if (isConfirm){
            $.post("../ajax/diagnostico.php?op=desactivar", {cod_diagnostico: cod_diagnostico}, function(e){
                swal('!!! Desactivado !!!',e,'success');
                    tabla.ajax.reload();
            });
        }else {
        swal("! Cancelado ¡", "Se Cancelo la operacion", "error");
     }
    });

}



//Función para activar registros
function activar(cod_diagnostico){

    swal({
        title: 'Esta seguro?',
        text: "¿Está Seguro de Activar Diagnostico?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "No",
        cancelButtonColor: '#FF0000',
        confirmButtonColor: '#008df9',
        confirmButtonText: "Si",
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true
        },function(isConfirm){
        if (isConfirm){
            $.post("../ajax/diagnostico.php?op=activar", {cod_diagnostico: cod_diagnostico}, function(e){
                swal('!!! Activado !!!',e,'success');
                    tabla.ajax.reload();
            });
        }else {
        swal("! Cancelado ¡", "Se Cancelo la operacion", "error");
     }
    });

}

init();