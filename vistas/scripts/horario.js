var tabla;

function init(){
    mostrarform(false);
    listar();
    
    $("#formulario").on("submit",function(e)
	{
		guardar(e);
    });


    $.post("../ajax/horario.php?op=selectmed",function(r){
        $("#medico_id").html(r);
        $('#medico_id').selectpicker("refresh");
    });

        // listar Dias Disponibles
        $(document).ready(function(){
            $("#medico_id").change(function(){
                    medico_id= $(this).val();
                    $.post("../ajax/horario.php?op=selectdia", { medico_id:medico_id},function(data){
                        $("#cod_dia").html(data);
                    });
                
            });
        });

}


function limpiar()
{
$("#medico_id").val("");
$("#cod_dia").val("");
$("#hora_inicio").val("");
$("#hora_fin").val("");
$("#intervalo").val("");
$("#idhorario").val("");
}

function mostrarform(flag){
    limpiar();
    if(flag){

$("#listadoregistros").hide();
$("#formularioregistros").show();
$("#btnGuardar").prop("disabled",false);
$("#btnagregar").hide();
$("#titulo").hide();
$("#titulo_formulario").show();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
        $("#titulo").show();
		$("#titulo_formulario").hide();
    }

}

function cancelarform(){
    mostrarform(false);
    limpiar();
}


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
            
            "aProcessing":true,// activando los procedimientos de datatables
            "aServerSide": true,// paginacion y filtracion
            dom: 'Bfrtip', // definimos los elementos de la tabla
            buttons: [
                'copyHtml5',
                'excelHtml5',
            ],

            "ajax":
            {
                url:'../ajax/horario.php?op=listar',
                type:"get",
                dataType: "json",
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy":true,
            "iDisplayLength":10,// indicamos el numero de paginacion
            "order":[[0,"desc"]] // ordernar (columna,orden) 
        }).DataTable();
}


//Función para guardar 

function guardar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
		$("#btnGuardar").prop("disabled",true);
		var formData = new FormData($("#formulario")[0]);
					$.ajax({
						url: "../ajax/horario.php?op=guardar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Horario',
								   type: 'success',
								   text:datos
							   });
										mostrarform(false);
										tabla.ajax.reload();
							}
					});
	   limpiar();
	}




function eliminar_horario(medico_id,cod_dia){

    swal({
        title: 'Esta seguro?',
        text: "¿Está Seguro de Eliminar Horario?",
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
            $.post("../ajax/horario.php?op=eliminar", {medico_id: medico_id,cod_dia: cod_dia}, function(e){
                swal('!!! Eliminado !!!',e,'success');
                    tabla.ajax.reload();
            });
        }else {
        swal("! Cancelado ¡", "Se Cancelo la Anulacion", "error");
     }
    });

}


init();