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
  <link rel="stylesheet" href="css/mainn.css">
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
                  <h2 > CITAS CANCELADAS </h2></div>
<!--<a  href="pdf/pdf_cita_lista.php" target="_blank"  style="text-decoration: none;font-weight: bold;padding:5px 10px; 
  color: black;
  background: yellow; margin-left: 80%;font-size:120%;"  > GENERAR CITAS ASIGNADA </a>-->
  <div >
    <div>
      <div class="col-8">
        <div class="table-responsive"> 
         <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;"   >
          
           <thead>
             <tr style="background:grey;color:white; text-align: center; ">
              <th  scope="col">#</th>
              <th scope="col"  >Paciente</th>
              <th scope="col">Especialidad </th>
              <th scope="col">Especialista</th>
              <th scope="col">Fecha</th>
              <th scope="col">Hora</th>
              <th scope="col">Estado</th>
              <th scope="col">Observacion</th>
              
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
            WHERE  c.cit_estado='cancelada' 
            ORDER BY c.id_cita DESC
            ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
           $paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($var);
           ?>
           <?php
           foreach($paciente as $row) {?>
            <tr >
              <td><?php echo $row->id_cita?></td>
              <td>???</td>
              <td><?php echo $row->nombre_especialidad?></td>
              <td><?php echo $row->nombre_doctor?></td>
              <td><?php echo $row->fecha?></td> 
              <td><?php echo $row->hora?></td> 
              <td><?php echo $row->cit_estado?></td>
              <td><?php echo $row->cit_observacion?></td>
            </tr>
            
            
          <?php }?>
        </tbody>
      </table>
    </div><br>
    
  </article></div></section>
  <div style="position: relative; top: 30px; ">
    <p style="color: black; font-weight: bold;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
    
    
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
<script type="text/javascript" src="datatables/datatables.min.js"></script>   
<script type="text/javascript" src="js/main.js"></script>  
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
    $('#').val(datos[6]);
    $('#observacion').val(datos[7]);
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

</body>
</html>