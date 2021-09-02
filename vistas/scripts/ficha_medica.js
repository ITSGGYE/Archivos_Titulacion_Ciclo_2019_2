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
         
            $("#esp_id option:selected").each(function(){
                esp_id= $(this).val();
                $.post("../ajax/agenda.php?op=selectmed", { esp_id:esp_id},function(data){
                    $("#medico_id").html(data);
                });
            });
        });
    });


    $('#peso').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
      });


      $('#talla').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
      });

      $('#presion_art').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
      });

      $('#alergias').on('input', function () { 
		this.value = this.value.replace(/[^a-zA-Z. ]/g,'');
      });
      
      $('#habitos').on('input', function () { 
		this.value = this.value.replace(/[^a-zA-Z0-9. ]/g,'');
      });
      
      $('#temperatura').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
      });
}


function limpiar()
{
    
$("#agenda_id").val("");
$("#peso").val("");
$("#talla").val("");
$("#presion_art").val("");
$("#alergias").val("");
$("#temperatura").val("");
$("#habitos").val("");
$("#idficha_medica").val("");

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
                url:'../ajax/ficha_medica.php?op=listar',
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
						url: "../ajax/ficha_medica.php?op=guardar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Ficha Medica Registrada',
								   type: 'success',
								   text:datos
							   });
										mostrarform(false);
										tabla.ajax.reload();
							}
					});
	   limpiar();
	}


    function mostrar(agenda_id)
    {
        $.post("../ajax/ficha_medica.php?op=mostrar",{agenda_id : agenda_id}, function(data, status)
        {
            data = JSON.parse(data);		
            mostrarform(true);
    
            $("#medico").val(data.medico);
            $("#especialidad").val(data.especialidad);
            $("#fecha_cita").val(data.fecha_cita);
            $("#hora_cita").val(data.hora_cita);
            $("#asunto").val(data.asunto);
            $("#paciente_cod").val(data.paciente_cod);
			$('#paciente_cod').selectpicker("refresh");
            $("#pac_cedula").val(data.pac_cedula);
            $("#pac_fchnac").val(data.pac_fchnac);
            $("#Edad").val(data.Edad);	
            $("#pac_sangre").val(data.pac_sangre);
            $('#pac_sangre').selectpicker('refresh');
            $("#pac_genero").val(data.pac_sexo);
            $('#pac_genero').selectpicker('refresh');
            $("#pac_direccion").val(data.pac_direccion);
            $("#pac_resp").val(data.pac_resp);
            $("#agenda_id").val(data.agenda_id);
            
         });
    
    
    }



init();