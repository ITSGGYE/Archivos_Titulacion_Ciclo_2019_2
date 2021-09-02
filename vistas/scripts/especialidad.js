var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})


	$('#esp_nombre').on('input', function () { 
		this.value = this.value.replace(/[^a-zÑñA-ZñÑáéíóúÁÉÍÓÚ. ]/g,'');
	  });


}

//Función limpiar
function limpiar()
{
	$("#esp_descripcion").val("");
	$("#esp_nombre").val("");
	$("#esp_id").val("");
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
		$("#btnreporte").hide();
		$("#titulo").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	    $("#btnreporte").show();
	    $("#titulo").show();
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
					url: '../ajax/especialidad.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	}).DataTable();
}



//Función para guardar o editar

function guardaryeditar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
		$("#btnGuardar").prop("disabled",true);
		var formData = new FormData($("#formulario")[0]);
					$.ajax({
						url: "../ajax/especialidad.php?op=guardaryeditar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Especialidad',
								   type: 'success',
								   text:datos
							   });
										mostrarform(false);
										tabla.ajax.reload();
							}
					});
	   limpiar();
	}


function mostrar(esp_id)
{
	$.post("../ajax/especialidad.php?op=mostrar",{esp_id : esp_id}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#esp_descripcion").val(data.esp_descripcion);
		$("#esp_nombre").val(data.esp_nombre);
		$("#esp_id").val(data.esp_id);

 	})
}




//Función para desactivar registros
function eliminar(esp_id){

    swal({
        title: 'Esta seguro?',
        text: "¿Está Seguro de eliminar esta la Especialidad?",
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
            $.post("../ajax/especialidad.php?op=eliminar", {esp_id: esp_id}, function(e){
                swal('!!! Eliminada !!!',e,'success');
                    tabla.ajax.reload();
            });
        }else {
        swal("! Cancelado ¡", "Se Cancelo la operacion", "error");
     }
    });

}


//Función para activar registros
function desactivar(esp_id){

	$.post("../ajax/especialidad.php?op=desactivar", {esp_id: esp_id}, function(e){
		swal('!!! Desactivada !!!',e,'success');
			tabla.ajax.reload();
	});

}


//Función para activar registros
function activar(esp_id){

            $.post("../ajax/especialidad.php?op=activar", {esp_id: esp_id}, function(e){
                swal('!!! Activado !!!',e,'success');
                    tabla.ajax.reload();
            });
      
     }


    



init();