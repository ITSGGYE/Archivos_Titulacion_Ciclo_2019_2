var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();
	

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})


	$('#pac_nombre').on('input', function () { 
		this.value = this.value.replace(/[^a-zÑñA-ZñÑáéíóúÁÉÍÓÚ. ]/g,'');
	  });

	  $('#pac_apellido').on('input', function () { 
		this.value = this.value.replace(/[^a-zÑñA-ZñÑáéíóúÁÉÍÓÚ. ]/g,'');
	  });

	 
	  $('#pac_cedula').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
	  });

	  $('#pac_telf').on('input', function () { 
		this.value = this.value.replace(/[^+()0-9]/g,'');
	  });


	  $('#pac_direccion').on('input', function () { 
		this.value = this.value.replace(/[^+a-zÑñA-ZñÑáéíóúÁÉÍÓÚ()[]-#., ]/g,'');
	  });


	  $('#pac_emergencia').on('input', function () { 
		this.value = this.value.replace(/[^0-9a-zÑñA-ZñÑáéíóúÁÉÍÓÚ()[]-#., ]/g,'');
	  });


	  


}

//Función limpiar
function limpiar()
{
	$("#pac_cedula").val("");
	$("#pac_nombre").val("");
	$("#pac_apellido").val("");
	$("#pac_fchnac").val("");
	$("#pac_sangre").val("");
	$("#pac_genero").val("");
	$("#pac_email").val("");
	$("#pac_direccion").val("");
	$("#pac_telf").val("");	
	$("#pac_resp").val("");
	$("#pac_emergencia").val("");
	$("#paciente_cod").val("");
	$("#salida").val("");
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
		$("#titulo_formulario").show();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	    $("#btnreporte").show();
	    $("#titulo").show();
	    $("#titulo_formulario").hide();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}




function validar() {
	var cad = document.getElementById("pac_cedula").value.trim();
	if(cad.length == 10)
	{
	var total = 0;
	var longitud = cad.length;
	var longcheck = longitud - 1;

	
	if (cad !== "" && longitud === 10){
	  for(i = 0; i < longcheck; i++){
		if (i%2 === 0) {
		  var aux = cad.charAt(i) * 2;
		  if (aux > 9) aux -= 9;
		  total += aux;
		} else {
		  total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
		}
	  }

	  total = total % 10 ? 10 - total % 10 : 0;

	  if (cad.charAt(longitud-1) == total) {
		  validar_cedula();   
		
	  }else{
		document.getElementById("pac_cedula").value = " ";
		document.getElementById("salida").style.color = "red";
		alertify.error("Cedula Inavlida.Por fávor ingrese una cedula válida.");
		
		
	  }
	}
	}
  }

  function validar_cedula() {
   
    var pac_cedula = $("#pac_cedula").val();

	 
    $.post("../ajax/paciente.php?op=validar_cedula", {pac_cedula: pac_cedula},function(data){
		
		var resultado = data;
		
		if(resultado == ''){

		}
		 else{
		   alertify.warning(resultado);
		   
		 }				
    });
    
     
};



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
					url: '../ajax/paciente.php?op=listar',
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
						url: "../ajax/paciente.php?op=guardaryeditar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Paciente',
								   type: 'success',
								   text:datos
							   });
										mostrarform(false);
										tabla.ajax.reload();
							}
					});
	   limpiar();
	}






function mostrar(paciente_cod)
{
	$.post("../ajax/paciente.php?op=mostrar",{paciente_cod : paciente_cod}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		 $("#pac_cedula").val(data.pac_cedula);
		 $("#pac_nombre").val(data.pac_nombre);
		 $("#pac_apellido").val(data.pac_apellido);
		 $("#pac_fchnac").val(data.pac_fchnac);	
		 $("#pac_sangre").val(data.pac_sangre);
		 $('#pac_sangre').selectpicker('refresh');
		 $("#pac_genero").val(data.pac_sexo);
		 $('#pac_genero').selectpicker('refresh');
		 $("#pac_email").val(data.pac_email);
		 $("#pac_direccion").val(data.pac_direccion);	 
		 $("#pac_telf").val(data.pac_telf);	
		 $("#pac_resp").val(data.pac_resp);
		 $("#pac_emergencia").val(data.pac_emerg);
		 $("#paciente_cod").val(data.paciente_cod);
 	})
}

/*
function eliminar(paciente_cod)
{
	bootbox.confirm("¿Está Seguro de eliminar al Paciente?", function(result){
		if(result)
        {
        	$.post("../ajax/paciente.php?op=eliminar", {paciente_cod : paciente_cod}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
*/

//Función para activar registros
function eliminar(paciente_cod){

    swal({
        title: 'Esta seguro?',
        text: "¿Está Seguro de Eliminar este Paciente?",
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
            $.post("../ajax/paciente.php?op=eliminar", {paciente_cod: paciente_cod}, function(e){
                swal('!!! Eliminado !!!',e,'success');
                    tabla.ajax.reload();
            });
        }else {
        swal("! Cancelado ¡", "Se Cancelo la operacion", "error");
     }
    });

}

init();