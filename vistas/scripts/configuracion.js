var tabla;

//Función que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();


   $("#formulario").on("submit",function(e)
   {
	   editar(e);
 
	});


    $('#razon_social').on('input', function () { 
		this.value = this.value.replace(/[^a-zÑñA-Z. ]/g,'');
	  });

      $('#ruc').on('input', function () { 
		this.value = this.value.replace(/[^0-9]/g,'');
	  });

}

//Función mostrar formulario
function mostrarform(flag)
{
   //limpiar();
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
       $("#btnagregar").hide();
   }
}

function cancelarform(){
    mostrarform(false);
    limpiar();
}

function editar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
		$("#btnGuardar").prop("disabled",true);
		var formData = new FormData($("#formulario")[0]);
					$.ajax({
						url: "../ajax/configuracion.php?op=editar",
							type: "POST",
							data: formData,
							contentType: false,
							processData: false,
	
							success: function(datos)
							{
							   swal({
								   title: 'Datos Actualizados',
								   type: 'success',
								   text:datos
							   });
										mostrarform(false);
										tabla.ajax.reload();
							}
					});
	   limpiar();
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
               ],
       "ajax":
               {
                   url: '../ajax/configuracion.php?op=listar',
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


function mostrar(idconfiguracion)
{
	$.post("../ajax/configuracion.php?op=mostrar",{idconfiguracion : idconfiguracion}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		 $("#razon_social").val(data.razon_social);
		 $("#ruc").val(data.ruc);
		 $("#responsable").val(data.responsable);
		 $("#email").val(data.email);	
		 $("#telefono").val(data.telefono);
         $("#direccion").val(data.direccion);
         $("#idconfiguracion").val(data.idconfiguracion); 	 
 	})
}


init();





