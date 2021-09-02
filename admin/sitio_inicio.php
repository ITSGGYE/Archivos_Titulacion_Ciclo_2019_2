

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
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   </head>
   <body>
      <?php
         include ('nav.php');
         include ('sidebar.php');
         ?>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
         <div class="row">
            <ol class="breadcrumb">
               <li><a href="#">
                  <i class="fa fa-globe" aria-hidden="true"></i>
                  </a>
               </li>
               <li class="active">Inicio Sitio</li>
            </ol>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="panel panel-default ">
                  <div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;">
                     <center> <strong> ADMINISTRACIÓN ESPACIO WEB</strong></center>
                  </div>
               </div>
               <div class="panel panel-default" >
                  <div class="panel-body">
                     <div class="col-md-15">
                        <br><br><br>
                        <div>
                           <center> 
                              <br><br><br><br>
                              <a style="color: white; font-size: 300px;" href="sitio.php "><i style="font-size: 50px; " class="fa fa-child" aria-hidden="true"></i>
                              <button style="width: 600px; height: 120px;font-size: 45px;" type="button" class="btn btn-danger">ESPECIALIDAD</button>
                              </a>
                           </center>
                           <br><br><br><br>
                        </div>
                        <br><br><br><br><br><br><br>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12">
               <p class="back-link">Fundación Conexión Vital <a href="index.php">Andrea Hernandez Gerente</a></p>
            </div>
         </div>
      </div>
      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/chart.min.js"></script>
      <script src="js/chart-data.js"></script>
      <script src="js/easypiechart.js"></script>
      <script src="js/easypiechart-data.js"></script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>

