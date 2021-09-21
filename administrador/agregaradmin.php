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
                  <h2>AGREGAR USUARIOS</h2>
                </div>
                
                <!-- REGISTROS DE BD -->                                
                <div class="modal-body">
                 <!----- Formulario  ---->
                 <form action="guardar_admin.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">USUARIO</label>
                    <input type="text" name="usuario" class="form-control" placeholder="Ingrese Usuario" onkeypress="return soloLetras(event);"  required>
                  </div>
                  <div class="form-group">
                    <label for="">CONTRASEÑA</label>
                    <input type="text" name="pass" class="form-control" placeholder="Ingrese Contraseña" required>
                  </div>
                  <div class="form-group">
                    <label for="">Nombre Apellido</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombres Apellidos" onkeypress="return soloLetras(event);" required>
                  </div>
                </div>
                <br>     
                <div  class="modal-footer">     
                  <center>
                    <button   style="color: white;width: 50%; background:grey; font-weight: bold;font-size: 20px; "
                    type="submit" class="btn ">Guardar </button>
                  </div>
                </center>
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