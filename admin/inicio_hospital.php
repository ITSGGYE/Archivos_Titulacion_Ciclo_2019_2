

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
      <title>Conexión Vital</title>
      <link rel="icon" href="iconos/favicon.png" type="image" >
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/datepicker3.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">
      <!--Custom Font-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   </head>
   <body>
      <?php
         include ('nav1.php');
         include ('sidebar.php');
         ?>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
         <div class="row">
            <ol class="breadcrumb">
               <li><a href="#">
                  <i style="font-size: 14px;color: #64afcb;" class="fa fa-globe" aria-hidden="true"></i>
                  </a>
               </li>
               <li class="active">Datos</li>
            </ol>
         </div>
         <!--/.row-->
         <div class="row">
            <div class="col-lg-12">
               <div class="panel panel-default ">
                  <div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;">
                     <center> <strong> AGREGAR DATOS GENERAL PACIENTE</strong></center>
                     <!-- /.Informacion-->
                  </div>
               </div>
               <!-- /.panel-->
               <div class="panel panel-default" >
                  <center>
                     <?php
                        include_once("conexion.php");
                        
                        $sentencia=$bd->query("SELECT * FROM
                        paciente
                        
                        WHERE id_paciente
                        
                          ;");
                        //FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                        $paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
                        
                        //print_r($var);
                        
                        ?>
                     <div >
                        <br>
                        <div class="row" style="float: left; display: inline-block;  
                           ">
                           <?php
                              foreach($paciente as $row) {?>
                           <div class="" style="display: inline-block;  
                              margin: 0.2em ;">
                              <div class="card" style="font-size: 14px ;display: inline-block; ">
                                 <div class="card-content">
                                    <i class="material-icons large"></i>
                                    <h6 style="color: black;font-weight: bold;color: #f17555    ;">NOMBRE DEL PACIENTE</h6>
                                    <p><?php echo $row->nombre_apellido?></p>
                                    <p  class="" >
                                       <h7 style="color: black;font-weight: bold;" >Cedula:</h7>
                                       <?php echo $row->cedula?>
                                    </p>
                                    <p class="mb-0">
                                       <h7 style="color: black;font-weight: bold;">Correo:</h7>
                                       <br><?php echo $row->correo?>
                                    </p>
                                    <p class="mb-0">
                                       <h7 style="color: black;font-weight: bold;">Fecha Nacimiento:</h7>
                                       <?php echo $row->fecha_nacimiento?>
                                    </p>
                                    <p class="mb-0">
                                       <h7 style="color: black;font-weight: bold;">Sexo:</h7>
                                       <?php echo $row->sexo?>
                                    </p>
                                 </div>
                                 <div class="card-action" >
                                    <a href="ver_historial2.php?id=<?php echo $row->id_paciente?>" class="btn "  >Ver Historial</a>
                                    <a href="inicio_historial.php?id=<?php echo $row->id_paciente?>" class="btn "  >Agregar Historial</a>
                                 </div>
                              </div>
                           </div>
                           <?php }?>
                        </div>
                     </div>
                  </center>
                  <div class="panel-body" style="">
                     <div class="col-md-5" style="" >
                        <!-- /.Informacion-->						
                     </div>
                  </div>
               </div>
               <!-- /.panel-->
            </div>
            <!-- /.col-->
            <div class="col-sm-12">
               <p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!--/.main-->
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
         
         $('#usuario').val(datos[1]);
         
         $('#pass').val(datos[2]);
         
         $('#nombre').val(datos[3]);
         
         
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

