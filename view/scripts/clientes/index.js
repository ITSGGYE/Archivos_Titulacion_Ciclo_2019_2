<script>
function mostraMensajeValidacion(params) {
    $('#res_modal').modal('show'); 
}

{/* 
function verificarEliminar(cli_id) {
      
    $.ajax({
        url: "index.php?c=api&a=cantidadPedidosCliente&cli_id="+cli_id,
        type: "Get",
        success: function (response) {

                cantidadPedidosCliente=response;
                if(cantidadPedidosCliente>0)
                {
                    event.preventDefault();
                    alert("No se puede eliminar el cliente tiene asignados varios pedidos");                 
                }

            
        },
        error: function (err) {
            alert(err.responseText);
        }
    });
    return res;
} */}
</script>

