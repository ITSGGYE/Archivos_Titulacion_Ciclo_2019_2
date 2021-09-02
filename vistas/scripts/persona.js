var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	
	 //Cargamos los items al select de Especialidad
	$.post("../ajax/persona.php?op=selectesp", function(r){
		$("#esp_id").html(r);
		$('#esp_id').selectpicker('refresh');
});
	
       //Mostramos los Modulos
	$.post("../ajax/persona.php?op=modulo&id=",function(r){
		$("#modulo").html(r);
           });


		   $('#per_nombre').on('input', function () { 
			this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ. ]/g,'');
		  });
	
		  $('#per_apellido').on('input', function () { 
			this.value = this.value.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ. ]/g,'');
		  });
	
		 
		  $('#per_cedula').on('input', function () { 
			this.value = this.value.replace(/[^0-9]/g,'');
		  });
	
		  $('#per_telf').on('input', function () { 
			this.value = this.value.replace(/[^0-9]/g,'');
		  });
	
	

}

//Función limpiar
function limpiar()
{
	$("#per_cedula").val("");
	$("#per_nombre").val("");
	$("#per_apellido").val("");
	$("#per_fchnac").val("");
	$("#per_genero").val("");
	$("#per_email").val("");
	$("#per_telf").val("");	
	$("#esp_id").val("");
	$("#usuario_id").val("");
	$("#cargo").val("");
	$("#rol").val("");
	$("#acceso").val("");
    $("#clave").val("");
	$("#idpersona").val("");
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
	var cad = document.getElementById("per_cedula").value.trim();
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
		document.getElementById("per_cedula").value = " ";
		document.getElementById("salida").style.color = "red";
		alertify.error("Cedula Inavlida.Por fávor ingrese una cedula válida.");
		
		
	  }
	}
	}
  }

  function validar_cedula() {
   
    var per_cedula = $("#per_cedula").val();

	 
    $.post("../ajax/persona.php?op=validar_cedula", {per_cedula: per_cedula},function(data){
		
		var resultado = data;
		
		if(resultado == ''){

		}
		 else{
		   alertify.warning(resultado);
		   
		 }				
    });
    
     
};



	function validar_usuario() {
   
		var acceso = $("#acceso").val();
	
		 
		$.post("../ajax/persona.php?op=validar_usuario", {acceso: acceso},function(data){
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
					url: '../ajax/persona.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 8,//Paginación
	    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
		$("#btnGuardar").prop("disabled",true);
		var formData = new FormData($("#formulario")[0]);
					$.ajax({
						url: "../ajax/persona.php?op=guardaryeditar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Personal',
								   type: 'success',
								   text:datos
							   });
										mostrarform(false);
										tabla.ajax.reload();
							}
					});
	   limpiar();
	}


function mostrar(idpersona)
{
	$.post("../ajax/persona.php?op=mostrar",{idpersona : idpersona}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);


        $("#per_cedula").val(data.per_cedula);
        $("#per_nombre").val(data.per_nombre);
        $("#per_apellido").val(data.per_apellido);
        $("#per_fchnac").val(data.per_fchnac);
        $("#per_genero").val(data.per_genero);
		$("#per_email").val(data.email);
        $("#per_telf").val(data.per_telf);	
        $("#esp_id").val(data.esp_id);
		$('#esp_id').selectpicker('refresh');
		$("#cargo").val(data.cargo);
		$("#rol").val(data.rol);
		$("#acceso").val(data.acceso);
		$("#clave").val(data.clave);
        $("#idpersona").val(data.idpersona);
 	})


	      //Mostramos los Modulos
	$.post("../ajax/persona.php?op=modulo&id="+idpersona,function(r){
		$("#modulo").html(r);
           });


}


//Función para desactivar registros
function eliminar(idpersona){

    swal({
        title: 'Esta seguro?',
        text: "¿Está Seguro que desea Eliminar al Usuario?",
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
            $.post("../ajax/persona.php?op=eliminar", {idpersona: idpersona}, function(e){
                swal('!!! Eliminado !!!',e,'success');
                    tabla.ajax.reload();
            });
        }else {
        swal("! Cancelado ¡", "Se Cancelo la operacion", "error");
     }
    });

}


//Función para desactivar registros
function desactivar(idpersona){

            $.post("../ajax/persona.php?op=desactivar", {idpersona: idpersona}, function(e){
                swal('!!! Desactivado !!!',e,'success');
                    tabla.ajax.reload();
            });

}



//Función para activar registros
function activar(idpersona){

            $.post("../ajax/persona.php?op=activar", {idpersona: idpersona}, function(e){
                swal('!!! Activado !!!',e,'success');
                    tabla.ajax.reload();
            });

}



init();