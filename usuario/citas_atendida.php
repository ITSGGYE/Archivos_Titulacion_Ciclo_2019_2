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
                  <h2 > CITAS ATENDIDAS </h2></div>
                  
                  <div >
                    <div>
                      <div class="col-8">
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
                            WHERE  c.cit_estado='atendido' 
                            AND p.correo= '".$_SESSION['nombre']."'
                            ORDER BY c.id_cita
                            ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                           $paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($var);
                           ?>
                           <?php
                           foreach($paciente as $row) {?>
                            <tr >
                             <td><?php echo $row->id_cita?></td>
                             <td><?php echo $row->nombre_apellido?></td>
                             <td><?php echo $row->nombre_especialidad?></td>
                             <td><?php echo $row->nombre_doctor?></td>
                             <td><?php echo $row->fecha?></td> 
                             <td><?php echo $row->hora?></td> 
                             <td><?php echo $row->cit_estado?></td>
                             <td><?php echo $row->cit_observacion?></td>
                             <td><button class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar">
                               Eliminar
                             </button> </td>
                           </tr>
                           
                           
                         <?php }?>
                       </tbody>
                     </table>
                     <!-- Modal Eliminar -->
                     <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                          </button> 
                          <div style="background:   grey
                          ;color:white;letter-spacing: 10px;"  class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" 
                            id="exampleModalLabel"><center>ELIMINAR CITA ATENDIDAS</center></h5></strong></div>
                            
                            <br>
                            
                            <br>
                            
                          </div>
                          
                          <div class="modal-body">
                           <!----- Formulario  ---->
                           <form action="eliminar_citas.php" method="POST" >
                            <input type="hidden" name="id" id="delete_id" >
                            <center>
                              <p style="font-size: 22px;"   >¿Desea Eliminar  <strong>  </strong> ?</p>
                            </center>
                            <br>     
                            <div class="modal-footer">       <br>
                              <button style="background: black; color: white; font-weight: bold;width: 18%; padding: 3% 0px;" type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                              
                              <button  type="submit" style="background:black;  color: white; font-weight: bold;width: 18%; padding: 3% 0px; " class="btn ">Si</button>
                            </div>
                          </form>
                        </div>
                      </div></div></div>
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