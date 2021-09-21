<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: ../index.html');
  
}  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Consultorio Odontologia</title>
  <link rel="icon" href="img/logooo.png" type="image" >
  <link rel="stylesheet" href="css/iconos.css">
  <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <?php
  include ('nav.php');
  ?>
  <?php
  include ('iconos.php');
  ?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <section  class="section">
            <div   class="wrapp">
              <article class="articles" >
                <div class="mensaje">
                 <h2>NOTIFICACIÓN</h2>
               </div>
               <a style="text-decoration: none;" title="Agregar Especialidades" class="agregar" href="agregarnotificacion.php">Agregar Notificación</a>          
               <div class="table-responsive">  
                 <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;">
                   <thead>
                     <tr style="background:grey;color:white; ">
                      <th scope="col">#</th>
                      <th scope="col">Notificacion</th>
                      <th scope="col">Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                   <!-- REGISTROS DE BD -->                                
                   <?php
                   include_once("conexion.php");
                   $sentencia=$bd->query("SELECT * FROM notificacion;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                   $notificacion=$sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($var);
                   ?>
                   <?php
                   foreach($notificacion as $row) {?>
                    <tr >
                      <td><?php echo $row->id_notificacion?></td>
                      <td><?php echo $row->notificacion?></td>
                      <td>  
                       <button title="Editar" type="button" class="btn btn-info editbtn" data-toggle="modal" data-target="#editar">
                        Editar
                      </button></td>
                      
                   </tr>

                 <?php }?>
               </tbody>
             </table>
           </div>
         </div>
       </div>  
     </div>    

     <!-- Modal Editar -->
     <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-size: 40px;">&times;</span>
          </button> 
          <div style="background:   grey
          ;color:white;letter-spacing: 10px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel"><center>EDITAR NOTIFICACIÓN</center></h5></strong></div>

          <br>

          <br>

        </div>

        <div class="modal-body">
         <!----- Formulario  ---->
         <form action="editar_notificacion.php" method="POST" >
          <input type="hidden" name="id" id="update_id">
          <div class="form-group">
            <label for="">NOTIFICACIÓN</label>
            <input type="text" name="notificacion" id="notificacion" class="form-control" placeholder="Editar Notificacion"  onkeypress="return soloLetras(event);"   >
          </div>

          <div class="modal-footer">       
            <button title="Cerrar" style="color: white; background:red;" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            <button title="Actualizar Especialidades" style="color: white; background:#68CC05; position: absolute;left: 5%;" type="submit"  class="btn ">Actualizar </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- /.Termina modal editar-->
<!-- Modal Eliminar -->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="font-size: 40px;">&times;</span>
      </button> 
      <div style="background:  grey
      ;color:white;letter-spacing: 10px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel"><center>ELIMINAR NOTIFICACION</center></h5></strong></div>

      <br>

      <br>

    </div>

    <div class="modal-body">
     <!----- Formulario  ---->
     <form action="eliminar_notificacion.php" method="POST" >
      <input type="hidden" name="id" id="delete_id" >
      <center>
        <p style="font-size: 22px;"   >¿Desea  Eliminar </strong> ?</p>
      </center>
      <br>     
      <div class="modal-footer">       <br>
        <button style="background:black;  color: white; font-weight: bold;width: 18%; padding: 3% 0px;" type="button" class="btn btn-danger" data-dismiss="modal">No</button>

        <button type="submit" style="background:black;  color: white; font-weight: bold;width: 18%; padding: 3% 0px; " class="btn ">Si</button>
      </div>
    </form>
  </div>

</div>
</div>
</div>  <div class="col-sm-12">
  <p style="color: black;font-weight: bold;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>

</article></div></section>


</div><!--/.row-->
</div>  <!--/.main-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>   
<script type="text/javascript" src="js/main.js"></script>  
<script>

  $('.editbtn').on('click',function () {
    $tr=$(this).closest('tr');
    var datos=$tr.children("td").map(function () {
      return $(this).text();
    });
    $('#update_id').val(datos[0]);
    $('#notificacion').val(datos[1]);
  });
</script>
<script>

  $('.deletebtn').on('click',function () {
    $tr=$(this).closest('tr');
    var datos=$tr.children("td").map(function () {
      return $(this).text();
    });
    $('#delete_id').val(datos[0]);
  });
</script>
<script >//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
    tecla_especial = false
    for(var i in especiales) {
      if(key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial){
      alert('Tecla numerica no aceptada');
      return false;
    }
  }</script>
</body>
</html>