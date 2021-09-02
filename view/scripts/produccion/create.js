<script>
//Calcular masas
$('#pr_cantidad_panes').on('keyup', function() {
    var res = (this.value * 60) / 60000;
    $('#pr_masas').val(res);
    
   
    if(res>2){     
        bono=(res-2)/0.1
    }else{
        bono=0;
    }


    $('#bono').val(Number((bono).toFixed(2)));
});

$.validator.addMethod(
    "australianDate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
    },
    "Please enter a date in the format dd-mm-yyyy."
);

var filterForm = $('#filter-form');
filterForm.validate({
        rules: {
        fecha: {
        australianDate: true
        },
        pr_horas_trabajadas: "required",
        messages: {
        fecha: {
        required: "Date is required",
                date: "enter date only"
            },
            pr_horas_trabajadas: "Please enter a valid email address"

        }
    }
});

//Obtiene los datos de los empleados seleccionados
function obtenerDatosTablaEmpleados() {
    var empleados = [];
    $('#example4 tr').each(function(i, row) {
        var $row = $(row),
            pr_id = $row.find('input[name="emp_id"]').val(),
            estado = $row.find('input[type="checkbox"]').attr("checked") == "checked" ? 1 : 0;

        if (estado == 1) {
        empleados.push(pr_id);
        }
    });
    return empleados;
}

//Registrar los datos de la produccion
function registrarProduccion() {    

    var pr_horas_trabajadas = $('#pr_horas_trabajadas').val();
    var pr_cantidad_panes = $('#pr_cantidad_panes').val();
    var pr_masas = $('#pr_masas').val();
    var bono = $('#bono').val();
    var fecha = $('#fecha').val();

    //Validar fecha
    if(validarFecha(fecha)==null)
    {    
         alert("Fecha invalida");
          return 0;       
    };

    //Validar horas trabajadas
    if(pr_horas_trabajadas.length==0)
    {
        alert("Horas trabajadas debe ser numerico");
        return 0;
    }else{
        if(!Number.isInteger(+pr_horas_trabajadas))
        {
            alert("Horas trabajadas debe ser numerico");
            return 0;
        }
    }

    //Validar cantidad de panes
    if(pr_cantidad_panes.length==0)
    {
        alert("Cantidad de panes debe ser numerico");
        return 0;
    }else{
        if(!Number.isInteger(+pr_cantidad_panes))
        {
            alert("Cantidad de panes debe ser numerico");
            return 0;
        }
    }
    
    var empleados = obtenerDatosTablaEmpleados();

    if(empleados.length==0)
    {
        alert("No se ha seleccionado ningun empleado");
        return 0;
    }
    enviarDatosRegistroProduccion(pr_horas_trabajadas, pr_cantidad_panes,pr_masas, bono, fecha,empleados);

   
    
}

function validarFecha(str) {
  var m = str.match(/^(\d{1,2})-(\d{1,2})-(\d{4})$/);
  return (m) ? new Date(m[3], m[2]-1, m[1]) : null;
}



//Enviar los datos de la produccion al servidor
function enviarDatosRegistroProduccion(pr_horas_trabajadas, pr_cantidad_panes,pr_masas, pr_bono, pr_fecha,empleados) {
        link = "index.php?c=api&a=registrarProduccion" +
        "&pr_horas_trabajadas=" + pr_horas_trabajadas +
        "&pr_cantidad_panes=" + pr_cantidad_panes +
        "&pr_masas=" + pr_masas +
        "&pr_bono=" + pr_bono +
        "&pr_fecha=" + pr_fecha;
    $.ajax({
        url: link,
        type: "Get",
        success: function(response) {
        console.log(response);
        var pr_id=response.pr_id;
       

        for (i = 0; i < empleados.length;i++) {
            registrarEmpleadoProduccion(pr_id,empleados[i]);
        }
        console.log("terminado");  
        alert("Datos registrados");

        },
        error: function(err) {

        alert(err.responseText);
        }
    });
}

function registrarEmpleadoProduccion(pr_id,emp_id) {
            link = "index.php?c=api&a=registrarEmpleadoProduccion" +
            "&pr_id=" + pr_id +
            "&emp_id=" + emp_id;
        $.ajax({
            url: link,
            type: "Get",
            success: function(response) {
            console.log(response);
                    
            },
            error: function(err) {
    
            alert(err.responseText);
            }
        });


}


//Actualizar el estado de los checkbox
    function setCheckedValue(checkboxName) {
    var $checkbox = $('#' + checkboxName);
    $checkbox.attr('checked', !$checkbox.attr('checked'));
    $checkbox.button("refresh");
}

$('#fecha').on('change', function() {
        this.val(this.val);
});
</script>