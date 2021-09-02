var tabla;

function init(){
    mostrarform(false);
    listar();
    
    $("#formulario").on("submit",function(e)
	{
		guardar(e);
    });

 
   
    $.post("../ajax/agenda.php?op=selectpac",function(r){
        $("#paciente_cod").html(r);
        $('#paciente_cod').selectpicker("refresh");
    });



    $.post("../ajax/agenda.php?op=selectesp",function(r){
        $("#esp_id").html(r);
        $('#esp_id').selectpicker("refresh");
    });


    // listar medico
    $(document).ready(function(){
        $("#esp_id").change(function(){
         

                esp_id= $(this).val();
                $.post("../ajax/agenda.php?op=selectmed", { esp_id:esp_id},function(data){
                    $("#medico_id").html(data);
                });
            
        });
    });



        // listar 
        $(document).ready(function(){
            $("#fecha_cita").change(function(){    
                 
                var fecha_cita = $("#fecha_cita").val();
	            var medico_id = $("#medico_id").val();

                    $.post("../ajax/agenda.php?op=selecthorario", {fecha_cita: fecha_cita,medico_id:medico_id},function(data){
                        $("#idhorario").html(data);
                    });
            });
        });

        $('#busqueda').on('input', function () { 
            this.value = this.value.replace(/[^a-z, A-Z,0-9]/g,'');
          });

        
        $('#asunto').on('input', function () { 
            this.value = this.value.replace(/[^a-zA-Z.():/, _-]/g,'');
          });


          $('#costo_cita').on('input', function () { 
            this.value = this.value.replace(/[^0-9.,.]/g,'');
          });

}


function limpiar()
{
/*$("#paciente_cod").val("");*/
$('#medico_id').val("");
$('#esp_id').val("");
$('#cod_dia').val("");
$("#asunto").val("");
$("#costo_cita").val("");
$("#fecha_cita").val("");
$("#idhorario").val("");
$("#estado_pago").val("");
$("#agenda_id").val("");
$("#paciente").val("");
$("#busqueda").val("");

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



function buscarpaciente() {
   
    var busqueda = $("#busqueda").val();

 
    $.post("../ajax/agenda.php?op=buscarpaciente", {busqueda: busqueda},function(data){
        $("#paciente").html(data);
        
    });
    
     
};



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
                url:'../ajax/agenda.php?op=listar',
                type:"get",
                dataType: "json",
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy":true,
            "iDisplayLength":5,// indicamos el numero de paginacion
            "order":[[0,"desc"]] // ordernar (columna,orden) 
        }).DataTable();
}


//Función para guardar o editar

function guardar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
		$("#btnGuardar").prop("disabled",true);
		var formData = new FormData($("#formulario")[0]);
					$.ajax({
						url: "../ajax/agenda.php?op=guardar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Cita',
								   type: 'success',
								   text:datos
							   });
										mostrarform(false);
										tabla.ajax.reload();
							}
					});
	   limpiar();
	}

    /*

    function mostrar(agenda_id)
    {
        $.post("../ajax/agenda.php?op=mostrar",{agenda_id : agenda_id}, function(data, status)
        {
            data = JSON.parse(data);		
            mostrarform(true);
    
            $("#paciente_cod").val(data.paciente_cod);
			$('#paciente_cod').selectpicker("refresh");
			$("#medico_id").val(data.medico_id);
            $("#esp_id").val(data.esp_id);
            $('#esp_id').selectpicker("refresh");
            $("#asunto").val(data.asunto);
            $("#costo_cita").val(data.costo_cita);
            $("#fecha_cita").val(data.fecha_cita);
            $("#hora_cita").val(data.hora_cita);
            $("#agenda_id").val(data.agenda_id);

         });
    
    
    }
*/



function anular(agenda_id){

    swal({
        title: 'Esta seguro?',
        text: "¿Está Seguro de anular la Cita Medica?",
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
          
        
          
            $.post("../ajax/agenda.php?op=anular", {agenda_id:agenda_id}, function(e){
                swal('!!! Anulada !!!',e,'success');
                    tabla.ajax.reload();
            });
        }else {
        swal("! Cancelado ¡", "Se Cancelo la Anulacion", "error");
     }
    });

}



function pagar_cita(agenda_id){

    swal({
        title: 'Pagar?',
        text: "¿Desea pagar la cita ?",
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
            $.post("../ajax/agenda.php?op=pagar_cita", {agenda_id: agenda_id}, function(e){
                swal('!!! Pagado !!!',e,'success');
                    tabla.ajax.reload();
            });
        }else {
        swal("! Cancelado ¡", "Se Cancelo la Anulacion", "error");
     }
    });

}

init();