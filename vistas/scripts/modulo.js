var tabla;

//Función que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();
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
                   url: '../ajax/modulo.php?op=listar',
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


init();
