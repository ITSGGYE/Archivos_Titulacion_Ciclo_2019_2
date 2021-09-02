//Código para Datables


$(document).ready(function() {
    var table = $('#example').DataTable({
        //para cambiar el lenguaje a español
        /* orderCellsTop: true,
        fixedHeader: true,
        "order": [
            [1, 'asc']
        ], */
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        responsive: "true",

        dom: 'Bfrtipl',
        buttons: [{
                //Botón para Excel
                extend: 'excel',
                footer: true,
                title: 'REGISTROS',
                filename: 'Archivo_excel',
                //Aquí es donde generas el botón personalizado
                text: '<button class="btn btn-success botnex">Excel <i class="fas fa-file-excel"></i></button>'
            },
            //Botón para PDF
            {
                extend: 'pdf',
                footer: true,
                title: 'REGISTROS',
                filename: 'Archivo_excel',
                text: '<button class="btn btn-danger">PDF <i class="far fa-file-pdf"></i></button>'
            }
        ],
    });


    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#example thead tr').clone(true).appendTo('#example thead');

    $('#example thead tr:eq(1) th').each(function(i) {

        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Search...' + title + '" style="color:black;width:100%"  />');

        $('input', this).on('keyup change', function() {
            if (table.column(i).search() !== this.value) {
                table
                    .order([1, 'asc'], [2, 'asc'])
                    .column(i)
                    .search(this.value)
                    .draw();

            }

        });




    });



    $('div.dataTables_filter input').focus();

});