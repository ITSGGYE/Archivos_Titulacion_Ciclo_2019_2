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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="functions.js"></script>
  <script src="functions_e.js"></script>
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
                  <h2>CITAS</h2>
                </div>
                <!-- REGISTROS DE BD -->                                
                <?php
                include_once("conexion.php");
                $id=$_GET['id'];
                $sentencia=$bd->query("SELECT * 
                  FROM cita c
                  JOIN paciente p
                  ON c.paciente=p.id_paciente
                  JOIN especialista e
                  ON c.id_especialista =e.id_especialista
                  JOIN especialidad d
                  ON  e.id_especialidad=d.id_especialidad
                  where c.id_cita= '$id'
                  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                $cita=$sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($var);
                ?>
                <?php foreach($cita as $row): ?>
                  <div class="modal-body">
                   <form action="editar_citas.php" method="POST" >
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                      <label >Paciente </label>
                      <input type="text" name="nombre"  id="nombre" value="<?php echo $row->nombre_apellido; ?>" class="form-control" readonly >
                    </div>
                    <div class="form-group">
                      <label for="">Especialidad </label>
                      <select name="nombrecapa"  id="nombrecapae"  class="form-control" >
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Especialista</label>
                      <select  name="cursoe" id="cursoe" class="form-control" required="">
                      </select>
                    </div>

                    <?php
                    date_default_timezone_set('America/Guayaquil');
                    ?>
                    <div class="form-group">
                      <label for="">FECHA</label>
                      <input  class="form-control" value="<?php echo $row->fecha; ?>" type="date" name="fecha" id="fecha" class="form-control" min="<?php echo date("Y-m-d");?>">
                    </div>
                    <?php
                    date_default_timezone_set('America/Guayaquil');
                    ?>
                    <script type="text/javascript">
        // funcion que se ejecuta cada vez que se selecciona una opción
                     function cambioOpciones()
                     {
                     document.getElementById('showId').value=document.getElementById('opciones').value;
                     }
                     </script>
                     <div class="form-group">
                      <label for="">Hora (09:00-16:50)</label>
                      <label style="position: absolute;right: 25%;">Horario</label>
                      <input  style="width: 48%" value="<?php echo $row->hora; ?>" name="hora" id='showId' class="form-control">
                      <select id='opciones' onchange='cambioOpciones();' style="width: 48%; height: 46px; position: absolute; right: 15px; top:360px;" class="form-control"  >
                        <option   value="09:00-09:20" >09:00-09:20</option>
                        <option  value="09:30-09:50" >09:30-09:50</option>
                        <option  value="10:00-10:20">10:00-10:20</option>
                        <option  value="10:30-10:50" >10:30-10:50</option>
                        <option  value="11:00-11:20" >11:00-11:20</option>
                        <option  value="11:30-11:50" >11:30-11:50</option>
                        <option  disabled>NO DISPONIBLE (12:00 A 13:50)</option>
                        <option  value="14:00-14:20" >14:00-14:20</option>
                        <option  value="14:30-14:50" >14:30-14:50</option>
                        <option  value="15:00-15:20" >15:00-15:20</option>
                        <option  value="15:30-15:50" >15:30-15:50</option>
                        <option  value="16:00-16:20" >16:00-16:20</option>
                        <option  value="16:30-16:50" >16:30-16:50</option>
                      </select>
                    </div>
                    <!-- input donde se mostrara el id de la opción -->
                    <div class="form-group">
                      <label for="">ESTADO</label>
                      <select name="estado" id="estado" class="form-control" >
                       <option  value="Asignado">Asignado</option>
                       <option  value="Atendido">Atendido</option>
                       <option  value="Citas Perdidas">Citas Perdidas</option>
                       <option  value="Cancelada">Cancelada</option>
                     </select>
                   </div>
                   <div class="form-group">
                     <label>Observaciones</label>
                     <input  value="<?php echo $row->cit_observacion; ?>" name="observacion" id="observacion" class="form-control">
                   </div>
                 <?php endforeach; ?>   
                 <div class="modal-footer">       <br>
                  <button style="color: white;width: 50%; background:grey; font-weight: bold;font-size: 20px; position: absolute;left: 20%;"
                  type="submit" class="btn ">Guardar Cita</button>
                </div>
              </form>
            </div>
          </div>
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