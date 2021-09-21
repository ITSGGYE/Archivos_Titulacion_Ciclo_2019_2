<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: index.php');
  
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
                  <h2>PACIENTES</h2>
                </div>
                <a  title="Agregar Paciente" style="color:; text-decoration: none;" class="agregar" href="agregarpacientes.php">Agregar Paciente</a>
 <!--<a href="reporte/pdf_paciente.php" style="text-decoration: none;font-weight: bold;padding:10px 10px; 
  color: black;
  background: yellow; margin-left: 60%;"  >
  REPORTE DE PACIENTES  
</a>-->  
<br><br>
<div >
  <div >
    <div >
      <div class="table-responsive">        
       <table id="example" class="table table-striped table-bordered table-hover text-dark" style="text-align: center; font-weight: bold;" >
         
        <thead>
         <tr style="background:grey;color:white; ">
          <th scope="col">#</th>
          <th scope="col">Cedula</th>
          <th scope="col">Nombre Paciente</th>
          <th scope="col">Telefono</th>
          <th scope="col">Correo</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Fecha Nacimiento</th>
          <th scope="col">Sexo</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
       <!-- REGISTROS DE BD -->                                
       <?php
       include_once("conexion.php");
       $sentencia=$bd->query("SELECT * FROM paciente;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
       $paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($var);
       ?>
       <?php
       foreach($paciente as $row) {?>
        <tr >
          <td><?php echo $row->id_paciente?></td>
          <td><?php echo $row->pac_cedula?></td>
          <td><?php echo $row->nombre_apellido?></td>
          <td><?php echo $row->pac_telefono?></td>
          <td><?php echo $row->correo?></td>                             
          <td>***</td>
          <td><?php echo $row->fecha_nacimiento?></td>
          <td><?php echo $row->pac_sexo?></td>
          <td>  
            <button title="Editar" type="button" class="btn btn-info editbtn" data-toggle="modal" data-target="#editar">
              Editar
            </button></td></a>
            <td><button title="Eliminar" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar">
             Eliminar
           </button> </td>
         </tr>
         
       <?php }?>
     </tbody>
   </table>                  
 </div>
</div>
</div>  
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
      ;color:white;letter-spacing: 10px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel"><center>EDITAR PACIENTE</center></h5></strong></div>
      
      <br>
      
      <br>
      
    </div>
    
    <div class="modal-body">
     <!----- Formulario  ---->
     <form action="editar_paciente.php" method="POST" >
      <input type="hidden" name="id" id="update_id">
      <div class="form-group">
        <label for="">CEDULA</label>
        <input type="text" name="cedula" id="cedula" class="form-control"
        placeholder="Edite Cedula"  minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event);" required>
      </div>
      <div class="form-group">
        <label for="">NOMBRE PACIENTE</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Editar Nombre Paciente"  inlength="10" maxlength="60" onkeypress="return soloLetras(event);" required  >
      </div>
      <div class="form-group">
        <label for="">Telefono</label>
        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Editar Telefono"   maxlength="10" onKeyPress="return SoloNumeros(event);" required  >
      </div>
      <div class="form-group">
        <label for="">CORREO</label>
        <input type="email" name="email"  id="email" class="form-control" placeholder="ejemplo@ejemplo.com" required>
      </div>
      <div class="form-group">
        <label for="">CONTRASEÑA</label>
        <input type="text" name="pass"  id="pass" class="form-control" placeholder="Ingrese Contraseña" required>
      </div>
      <div class="form-group">
        <label for="">FECHA NACIMIENTO</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required >
      </div>
      <div class="form-group">
        <label for=""> GENERO</label>
        <select name="genero" id="genero" class="form-control" required >
         <option  value="Masculino">Masculino</option>
         <option  value="Femenino">Femenino</option>
       </select>
       
     </div>
     <br>     
     <div  class="modal-footer">       <br>
      <button style="color: white; background:red; " type="button"   class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      
      <button title="Actualizar Paciente" style="color: white; background:#68CC05; position: absolute;left: 5%;" type="submit"  class="btn ">Actualizar Paciente</button>
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
      <div style="background: grey;color:white;letter-spacing: 10px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel"><center>ELIMINAR PACIENTE</center></h5></strong></div>
      
      <br>
      
      <br>
      
    </div>
    
    <div class="modal-body">
     <!----- Formulario  ---->
     <form action="eliminar_paciente.php" method="POST" >
      <input type="hidden" name="id" id="delete_id" >
      <center>
        <p style="font-size: 22px;"   >¿Desea  Eliminar <strong>  </strong> ?</p>
      </center>
      <br>     
      <div class="modal-footer">       <br>
        <button style="background: black; color: white; font-weight: bold;width: 18%; padding: 3% 0px;" type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        
        <button type="submit" style="background: black; color: white; font-weight: bold;width: 18%; padding: 3% 0px;" class="btn ">Si</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>  

<div    < class="col-sm-12">
  <p  style="color:black; font-weight:bold;"  class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
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
    $('#cedula').val(datos[1]);
    $('#nombre').val(datos[2]);
    $('#telefono').val(datos[3]);
    $('#email').val(datos[4]);
    $('#pass').val(datos[5]);
    $('#fecha').val(datos[6]);
    $('#genero').val(datos[7]);
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