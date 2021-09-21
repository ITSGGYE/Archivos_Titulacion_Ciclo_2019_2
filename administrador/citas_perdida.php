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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="functions.js"></script>
  <script src="functions_e.js"></script>
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
                  <h2>CITAS PERDIDAS</h2>
                </div>
                <div class="table-responsive"> 
                 <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;"   >
                   <thead>
                     <tr style="background:grey;color:white; text-align: center; ">
                      <th  scope="col">#</th>
                      <th scope="col"  >Paciente</th>
                      <th scope="col">Especialidad</th>
                      <th scope="col">Especialista</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Hora</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Observacion</th>
                      <th scope="col">Editar</th>
                      <th scope="col">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                   <!-- REGISTROS DE BD -->                                
                   <?php
                   include_once("conexion.php");
                   $sentencia=$bd->query("SELECT * 
                    FROM cita c
                    JOIN paciente p
                    ON c.paciente=p.id_paciente
                    JOIN especialista e
                    ON c.id_especialista =e.id_especialista
                    JOIN especialidad d
                    ON  e.id_especialidad=d.id_especialidad
                    WHERE cit_estado='citas perdidas'
                    ORDER BY c.id_cita
                    ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                   $cita=$sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($var);
                   ?>
                   <?php
                   foreach($cita as $row) {?>
                    <tr >
                      <td><?php echo $row->id_cita?></td>
                      <td><?php echo $row->nombre_apellido?></td>
                      <td><?php echo $row->nombre_especialidad?></td>
                      <td><?php echo $row->nombre_doctor?></td>
                      <td><?php echo $row->fecha?></td> 
                      <td><?php echo $row->hora?></td> 
                      <td><?php echo $row->cit_estado?></td>
                      <td><?php echo $row->cit_observacion?></td>
                      <td>  
                        <button title="Editar" type="button" class="btn btn-info editbtn" data-toggle="modal" data-target="#editar">
                          Editar
                        </button></td>
                        <td><button title="Eliminar" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar">
                         Eliminar
                       </button> </td>
                     </tr>
                   <?php }?>
                 </tbody>
               </table>
               <!-- Modal Editar -->
               <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                    </button> 
                    <div style="background:   grey
                    ;color:white;letter-spacing: 10px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel"><center>EDITAR CITAS PERDIDAS</center></h5></strong></div>
                    <br>
                    <br>           
                  </div>
                  <div class="modal-body">
                   <!----- Formulario  ---->
                   <form action="editar_citas_perdidas.php" method="POST" >
                    <input type="hidden" name="id" id="update_id">
                    <div class="form-group">
                      <label >Paciente </label>
                      <select  name="nombre"  class="form-control" readonly >  
                        <option value="<?php echo $row->nombre_apellido; ?> " >
                         <?php echo $row->nombre_apellido; ?></option>
                       </select>
                     </div>
                     <div class="form-group">
                      <label for="">Especialidad</label>
                      <select name="nombrecapa" id="nombrecapae" class="form-control">
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Especialista</label>
                      <select name="cursoe" id="cursoe" class="form-control">
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">FECHA</label>
                      <input  class="form-control" type="date" name="fecha" id="fecha" class="form-control" min="<?php echo date("Y-m-d");?>">
                    </div>
                    <div class="form-group">
                      <label for="">Hora (09:00-16:50)</label>
                      <select name="hora" id="hora" class="form-control"  >
                        <option   value="09:00-09:20" >09:00-09:20</option>
                        <option  value="09:30-09:50" >09:30-09:50</option>
                        <option  value="10:00-10:20">10:00-10:20</option>
                        <option  value="10:30-10:50" >10:30-10:50</option>
                        <option  value="11:00-11:20" >11:00-11:20</option>
                        <option  value="11:30-11:50" >11:30-11:50</option>
                        <option  disabled >NO DISPONIBLE (12:00 A 13:50)</option>
                        <option  value="14:00-14:20" >14:00-14:20</option>
                        <option  value="14:30-14:50" >14:30-14:50</option>
                        <option  value="15:00-15:20" >15:00-15:20</option>
                        <option  value="15:30-15:50" >15:30-15:50</option>
                        <option  value="16:00-16:20" >16:00-16:20</option>
                        <option  value="16:30-16:50" >16:30-16:50</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">ESTADO</label>
                      <select name="estado" id="estado" class="form-control" >
                        <!--<option  value="Atendido">Atendido</option>-->
                        <option  value="Asignado">Asignado</option>
                        <option  value="Citas Perdidas">Citas Perdidas</option>
                      </select>
                    </div>
                    <div class="form-group">
                     <label>Observaciones</label>
                     <textarea name="observacion" id="observacion" class="form-control"></textarea>
                   </div>
                   <br>     
                   <div class="modal-footer">       <br>
                    <button title="Cerrar" style="color: white; background:red; " type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button title="Actualizar Especialista" style="color: white; background:#68CC05; position: absolute;left: 5%;" type="submit"  class="btn ">Actualizar Citas</button>
                  </div>
                </form>
              </div>
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
            <div style="background:   grey;color:white;letter-spacing: 10px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" 
              id="exampleModalLabel"><center>ELIMINAR CITA</center></h5></strong></div>
              <br>
              <br>
            </div>
            <div class="modal-body">
             <!----- Formulario  ---->
             <form action="eliminar_citas_perdida.php" method="POST" >
              <input type="hidden" name="id" id="delete_id" >
              <center>
                <p style="font-size: 22px;"   >¿Desea Eliminar  <strong>  </strong> ?</p>
              </center>
              <br>     
              <div class="modal-footer">       <br>
                <button  style="background: black; color: white; font-weight: bold;width: 18%; padding: 3% 0px;" type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" style="background:black;  color: white; font-weight: bold;width: 18%; padding: 3% 0px; "  class="btn ">Si</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  
  </article></div></section>
</div><!--/.row-->
<div class="col-sm-12">
  <p style="color: black;font-weight: bold;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
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
  $('.deletebtn').on('click',function () {
    $tr=$(this).closest('tr');
    var datos=$tr.children("td").map(function () {
      return $(this).text();
    });
    $('#delete_id').val(datos[0]);
  });
</script>
<script>
  $('.editbtn').on('click',function () {
    $tr=$(this).closest('tr');
    var datos=$tr.children("td").map(function () {
      return $(this).text();
    });
    $('#update_id').val(datos[0]);
    $('#nombre').val(datos[1]);
    $('#nombrecapae').val(datos[2]);
    $('#cursoe').val(datos[3]);
    $('#fecha').val(datos[4]);
    $('#hora').val(datos[5]);
    $('#estado').val(datos[6]);
    $('#observacion').val(datos[7]);
  });
</script>
<script >
//Se utiliza para que el campo de texto solo acepte numeros
function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
}
else{
  keynum = evt.which; //FF
} 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
}
else{ 
  alert('Tecla de texto no aceptada');
  return false;
}
}
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