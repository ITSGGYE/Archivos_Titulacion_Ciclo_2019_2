<script>

function addTotableListadoDetalleProduccion(cod, pr_id, emp_nombre,emp_id,sueldo,bono, horasTrabajadas, fecha) {
  var res="";
  
  res='<tr class="odd gradeX">';
  res+='<td>' + cod + '</td>';
  res+='<td>' + emp_nombre + '</td>';
  res+='<td>' + sueldo + '</td>';
  res+='<td>' + bono + '</td>';
  res+='<td>' + horasTrabajadas + '</td>';
  res+='<td><button type="submit" onclick="eliminarDetalleProduccion(\''+ pr_id +'\',\''+ emp_id + '\')" class="btn btn-danger">Eliminar</button></td>';
  res+='</tr>';
  
  return res;
}

{/* function addTotableListadoProduccionTotal(tpr_id, tpr_cantidad_pedidos_realizados, tpr_cantidad_requerida, tpr_fecha) {
  var res = "";
  res += '<tr class="odd gradeX">';
  res += '<td>' + tpr_id + '</td>';
  res += '<td>' + tpr_fecha + '</td>';
  res += '<td>' + tpr_cantidad_requerida + '</td>';
  res += '<td>' + tpr_cantidad_pedidos_realizados + '</td>';
  res += '<td><button onclick="obtenerListadoDetallesProduccion(\'' + tpr_fecha + '\')" class="btn btn-round btn-warning" data-toggle="modal" data-target="#exampleModal">Ver detalles</button></td>';
  res += '<td>' + '<a href="index.php?c=producciontotal&amp;a=create&fecha=' + tpr_fecha + '&tpr_id=' + tpr_id + '" class="btn btn-info">Modificar<i class="fa fa-plus"></i></a></td>';
  res += '</tr>';
  return res;
} */}


function eliminarDetalleProduccion(pr_id, emp_id) {
  $.ajax({
    url: "index.php?c=api&a=eliminarDetalleProduccion&pr_id=" + pr_id + "&emp_id=" + emp_id,
    type: "Get",
    success: function (response) {
      obtenerListadoDetallesProduccion(pr_id);
      //obtenerListadoProduccionTotal();
    },
    error: function (err) {
      alert(err.responseText);
    }
  });
}
          
function obtenerListadoDetallesProduccion(pr_id) {
  $.ajax({
    url: "index.php?c=api&a=ListarProduccionDetallePorIdProduccion&pr_id=" + pr_id,
    type: "Get",
    success: function (response) {
      var tablebody = '';
      var fecha="";

      for (var i = 0; i < response.length; i++) {
        cod = response[i].pr_id;
        pr_id = response[i].pr_id;
        emp_nombre = response[i].empleado.emp_nombre;
        emp_id= response[i].empleado.emp_id;
        sueldo= response[i].empleado.cargo.car_sueldo;
        pr_bono=  response[i].produccion.pr_bono;
        horasTrabajadas = response[i].produccion.pr_horas_trabajadas;
        fecha = response[i].produccion.pr_fecha;
        cantidad_panes=response[i].produccion.pr_cantidad_panes
        masas=response[i].produccion.pr_masas

        tablebody += addTotableListadoDetalleProduccion(cod, pr_id, emp_nombre,emp_id,sueldo,pr_bono,
           horasTrabajadas, fecha);
      }
      table='<table class="table table-striped table-bordered ';
      table+='table-hover table-checkable order-column full-width" id="example2">';
      table+='<thead><tr>';
      table+='<th>Cod</th>';
      table+='<th>Empleado</th>';
      table+='<th>Sueldo</th>';
      table+='<th>Bono</th>';
      table+='<th>Horas trabajadas</th>';   
      table+='<th><th>';
      table+='<tb></th>';
      table+='</tr></thead>';
      table+='<tbody>' + tablebody + '</tbody></table>';

      $("#fechaActualDetalle").text(": "+fecha);
      $("#res").empty();
      $('#res').append(table);
      $('#example2').DataTable().refresh();
    },
    error: function (err) {
      alert(err.responseText);
    }
  });
}

{/* 
function obtenerListadoProduccionTotal() {
  $.ajax({
    url: "index.php?c=api&a=ListarProduccionTotal",
    type: "Get",
    success: function (response) {
      tablebody = '';
      for (var i = 0; i < response.length; i++) {
        tpr_id = response[i].tpr_id;
        tpr_cantidad_requerida = response[i].tpr_cantidad_requerida === null ? 0 : response[i].tpr_cantidad_requerida;
        tpr_cantidad_pedidos_realizados = (response[i].tpr_cantidad_pedidos_realizados) === null ? 0 : response[i].tpr_cantidad_pedidos_realizados;
        tpr_fecha = response[i].tpr_fecha;

        tablebody += addTotableListadoProduccionTotal(tpr_id, tpr_cantidad_pedidos_realizados,
           tpr_cantidad_requerida, tpr_fecha);
      }

      table='<table class="table table-striped table-bordered ';
      table+='table-hover table-checkable order-column full-width" id="example3">';
      table+='<thead><tr>';
      table+='<th>Cod</th>';
      table+='<th>Fecha de los pedidos</th>';
      table+='<th>Pedidos requeridos</th>';
      table+='<th>Pedidos realizados</th>';
      table+='<th></th>';
      table+='<th></th>';
      table+='</tr></thead><tbody>' + tablebody + '</table>';

      $("#datosProduccionTotal").empty();
      $('#datosProduccionTotal').append(table);
      $('#example3').DataTable().refresh();
    },

    error: function (err) {
      alert(err.responseText);
    }
  });
} */}

{/* $("#exampleModal").on("hidden.bs.modal", function () {
  obtenerListadoProduccionTotal();
}); */}

</script >