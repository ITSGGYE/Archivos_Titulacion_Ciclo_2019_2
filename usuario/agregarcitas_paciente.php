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
  <title>Consultorio Odontologico</title>
  <link rel="icon" href="img/logooo.png" type="image" >
  <link rel="stylesheet" href="css/iconoos.css">
  <link rel="stylesheet" href="css/main.css">  
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
                 <h2>AGREGAR CITAS</h2>
               </div>
               <div class="modal-body">
                 <!----- Formulario  ---->
                 <?php
                    include_once("conexion.php");
                    $sentencia=$bd->query("SELECT * 
                      FROM 
                      notificacion WHERE id_notificacion= '5'
                      ;");
                    $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
                    ?>
                       <?php foreach($pa as $row): ?>
                     
                     <input style="width: 60%; height: 25px; text-align: center;color: black; position: absolute;margin-top:  -19px;margin-left: 20%"  value="<?php echo $row->notificacion; ?>" class="form-control" disabled required>
                    
                       <?php endforeach; ?>

                 <form action="registrar_citas.php" method="POST" enctype="multipart/form-data">
                   <?php
                   include_once("conexion.php");
                   $sentencia=$bd->query("SELECT * 
                    FROM 
                    paciente WHERE correo= '".$_SESSION['nombre']."'
                    ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                   $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($var);
                   ?>
                   <input type="radio" name="interesado" value="no" id="interesadoNegativo" checked> No
                    <input type="radio" name="interesado" value="si" id="interesadoPositivo" > Sí

                <div class="form-group">
                    <label>Paciente</label>
                    <select name="nombre" id="nombre" disabled=""  class="form-control"   required>
                      <?php foreach($pa as $row): ?>
                        <option value="<?php echo $row->id_paciente; ?>"><?php echo $row->nombre_apellido; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="">Especialidad</label>
                  <select name="nombrecapa" id="nombrecapa" class="form-control" disabled="" required>
                    <option value="">Seleccione la especialidad de cita</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Especialista</label>
                  <select name="curso" id="curso" disabled="" class="form-control"  required>
                  </select>
                </div>
                <?php
                date_default_timezone_set('America/Guayaquil');
                ?>
                <div class="form-group">
                  <label for="">FECHA</label>
                  <input id="fecha" class="form-control" min="<?php echo date("Y-m-d");?>" type="date" name="fecha" value="<?php echo date("Y-m-d");?>" class="form-control" disabled="" required>
                </div>
                <?php
                date_default_timezone_set('America/Guayaquil');
                ?>
                <div class="form-group">
                  <label for="">Hora (09:00-16:50)</label>
                  <select name="hora" id="hora" disabled="" class="form-control"  >
                    <option   value="09:00-09:20" >09:00-09:20</option>
                    <option  value="09:30-09:50" >09:30-09:50</option>
                    <option  value="10:00-10:20">10:00-10:20</option>
                    <option  value="10:30-10:50" >10:30-10:50</option>
                    <option  value="11:00-11:20" >11:00-11:20</option>
                    <option  value="11:30-11:50" >11:30-11:50</option>
                    <option   disabled >NO DISPONIBLE (12:00 A 13:50)</option>
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
                  <select name="estado" class="form-control" >
                   <option  value="Asignado">Asignado</option>
                   <!--<option  value="Atendido">Atendido</option>-->
                 </select>
                 
               </div>
               <div class="form-group">
                 <label>Observaciones</label>
                 <textarea name="observacion" disabled="" id="observacion"  class="form-control"></textarea>
               </div>
               <div class="form-group">
                 <label>Color Cita</label>
                 <select name="color" class="form-control" disabled="" id="color">
                  <option readonly>Seleccionar Color</option>
                  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
                  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                  <option style="color:#008000;" value="#008000">&#9724; Verde</option>             
                  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                  <option style="color:#000;" value="#000">&#9724; Negro</option>
                  
                </select>
          </div>
          <?php
          include_once("conexion.php");
          $sentencia=$bd->query("SELECT * 
            FROM 
            administrador
            ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
          $administrador=$sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($var);
          ?>
          <div class="form-group">
            <select name="admin" id="admin"  class="form-control" style="visibility:hidden"  >
              <?php foreach($administrador as $row): ?>
                <option value="<?php echo $row->id_administrador; ?>"><?php echo $row->nombre_apellido; ?></option>
              <?php endforeach; ?>
            </select>
          </div>   
      

               <div class="modal-footer">      
                <center>
                  <button style="color: white;width: 50%; background:grey; font-weight: bold;font-size: 20px; "
                  type="submit" class="btn ">Guardar Cita</button></center>
                </div>
              </form>  
            </div>  
          </div>
        </div>
      </div>  <div class="col-sm-12">
        <p style="color: black;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
        
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
  }
</script>
<script type="text/javascript">
// Accedemos al botón
var nombre = document.getElementById('nombre');

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  nombre.disabled = true;
});
// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  nombre.disabled = false;
});
</script>
<script type="text/javascript">
// Accedemos al botón
var nombrecapa = document.getElementById('nombrecapa');

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  nombrecapa.disabled = true;
});
// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  nombrecapa.disabled = false;
});
</script>
<script type="text/javascript">
// Accedemos al botón
var curso = document.getElementById('curso');

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  curso.disabled = true;
});
// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  curso.disabled = false;
});
</script>
<script type="text/javascript">
// Accedemos al botón
var controlBuscador = document.getElementById('fecha');

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  controlBuscador.disabled = true;
});
// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  controlBuscador.disabled = false;
});
</script>
<script type="text/javascript">
// Accedemos al botón
var hora = document.getElementById('hora');

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  hora.disabled = true;
});
// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  hora.disabled = false;
});
</script>
<script type="text/javascript">
// Accedemos al botón
var estado = document.getElementById('estado');

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  observacion.disabled = true;
});
// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  estado.disabled = false;
});
</script>
<script type="text/javascript">
// Accedemos al botón
var observacion = document.getElementById('observacion');

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  observacion.disabled = true;
});
// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  observacion.disabled = false;
});
</script>
<script type="text/javascript">
// Accedemos al botón
var color = document.getElementById('color');

// evento para el input radio del "no"
document.getElementById('interesadoNegativo').addEventListener('click', function(e) {
  console.log('Vamos a deshabilitar el input text');
  color.disabled = true;
});
// evento para el input radio del "si"
document.getElementById('interesadoPositivo').addEventListener('click', function(e) {
  console.log('Vamos a habilitar el input text');
  color.disabled = false;
});
</script>



</body>

</html>