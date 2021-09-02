<script>

//Calcular masas
$('#pe_cantidad').on('keyup', function () {
    var res = (this.value * 60) / 60000; $('#pe_masas').val(res);
});


// your function
var my_func = function(event) {
    var fecha=$('#pe_fecha').val();

    datosFecha=fecha.split("-");
    
    var fechaFinal=datosFecha[2]+"/"+datosFecha[1]+"/"+datosFecha[0];
    var fechaHoy = new Date();
    fechaHoy.setHours(0);
    var fechaPedido = new Date(fechaFinal);
    fechaPedido.setHours(3);

    if(fechaHoy>fechaPedido){
        alert("Fecha debe ser igual o mayor a la fecha actual");
        event.preventDefault();
    }

   
};

// your form
var form = document.getElementById("form_data");

// attach event listener
form.addEventListener("submit", my_func, true);

</script>