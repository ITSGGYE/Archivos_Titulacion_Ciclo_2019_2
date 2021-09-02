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

    $.post("../ajax/consulta_medica.php?op=selectdiagnostico",function(r){
        $("#cod_diagnostico").html(r);
        $('#cod_diagnostico').selectpicker("refresh");
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

    $('#motivo_consulta').on('input', function () { 
        this.value = this.value.replace(/[^0-9a-z,A-ZñÑáéíóúÁÉÍÓÚ .()/-]/g,'');
      });

      $('#enfermedad_actual').on('input', function () { 
        this.value = this.value.replace(/[^0-9a-z,A-ZñÑáéíóúÁÉÍÓÚ .()/-]/g,'');
      });

      $('#anteced').on('input', function () { 
        this.value = this.value.replace(/[^0-9a-z,A-ZñÑáéíóúÁÉÍÓÚ .()/-]/g,'');
      });

      $('#sintomas').on('input', function () { 
        this.value = this.value.replace(/[^0-9a-z,A-ZñÑáéíóúÁÉÍÓÚ .()/-]/g,'');
      });

      $('#tratamiento').on('input', function () { 
        this.value = this.value.replace(/[^0-9a-z,A-ZñÑáéíóúÁÉÍÓÚ .()/-]/g,'');
      });


    }


function limpiar()
{  
$("#agenda_id").val("");
$("#motivo_consulta").val("");
$("#enfermedad_actual").val("");
$("#anteced").val("");
$("#sintomas").val("");
$("#cod_diagnostico").val("");
$("#tratamiento").val("");
$("#medicamento").val("");
$("#concentracion").val("");
$("#cantidad").val("");
$("#dosis").val("");
$("#duracion").val("");
$("#idconsulta").val("");

}

function mostrarform(flag){
    limpiar();
    if(flag){

        $("#listadoregistros").hide();
        $("#titulo").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
	}
	else
	{
        $("#titulo").show();
        $("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();

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

            ],

            "ajax":
            {
                url:'../ajax/consulta_medica.php?op=listar',
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
						url: "../ajax/consulta_medica.php?op=guardar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Consulta',
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
        $.post("../ajax/consulta_medica.php?op=mostrar",{agenda_id : agenda_id}, function(data, status)
        {
            data = JSON.parse(data);		
            mostrarform(true);
    
            $("#fecha_cita").val(data.fecha_cita);
            $('#fecha_cita').selectpicker("refresh");
            $("#hora_cita").val(data.hora_cita);
            $('#hora_cita').selectpicker("refresh");
            $("#paciente_cod").val(data.paciente_cod);
			$('#paciente_cod').selectpicker("refresh");
            $("#agenda_id").val(data.agenda_id);
            $("#peso").val(data.peso);
            $("#talla").val(data.talla);
            $("#presion_art").val(data.presion_art);
            $("#alergias").val(data.alergias);
            $("#temperatura").val(data.temperatura);
            $("#habitos").val(data.habitos);
            $("#idficha_medica").val(data.idficha_medica);
            $("#motivo_consulta").val(data.motivo_consulta);
            $("#enfermedad_actual").val(data.enfermedad_actual);
            $("#anteced").val(data.anteced);
            $("#sintomas").val(data.sintomas);
            $("#cod_diagnostico").val(data.cod_diagnostico);
			$('#cod_diagnostico').selectpicker("refresh");
            $("#medicamento").val(data.medicamento);
            $("#concentracion").val(data.concentracion);
            $("#cantidad").val(data.cantidad);
            $("#dosis").val(data.dosis);
            $("#duracion").val(data.duracion);

            $("#idconsulta").val(data.idconsulta); 
        
        
        });
    
    
    }




init();