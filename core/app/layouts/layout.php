<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>

<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
<link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/fullcalendar/moment.min.js'></script>
<script src='assets/fullcalendar/fullcalendar.min.js'></script>
<?php endif; ?>

</head>

<body>
<?php if(isset($_SESSION["user_id"])):?>
  <div class="wrapper">

      <div class="sidebar" data-color="blue">
      <div class="logo">
        <a href="./" class="simple-text">
          <img src="img/fer.png" height="175" width="175">
        </a>
      </div>

        <div class="sidebar-wrapper">
              <ul class="nav">
                  <li class="">
                      <a href="./">
                          <i><img src="img/0.png" width="20" height="20"></i>
                          <p>Inicio</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=reservations">
                          <i><img src="img/4.png" width="20" height="20"></i>
                          <p>Citas</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=pacients">
                          <i><img src="img/1.png" width="20" height="20"></i>
                          <p>Pacientes</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=repres">
                          <i><img src="img/3.png" width="20" height="20"></i>
                          <p>Representantes</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=medics">
                          <i><img src="img/2.png" width="20" height="20"></i>
                          <p>Medicos</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=categories">
                          <i><img src="img/5.png" width="20" height="20"></i>
                          <p>Area Medica</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=reports">
                          <i><img src="img/6.png" width="20" height="20"></i>
                          <p>Colsulta de Pagos</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=users">
                          <i><img src="img/7.png" width="20" height="20"></i>
                          <p>Usuarios</p>
                      </a>
                  </li>
              </ul>
        </div>
      </div>

      <div class="main-panel">
      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><b>Sistema Veterinario FER</b></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Salir</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="content">
      <div class="container-fluid">
<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("login");

?>
</div>
      </div>

      <footer class="footer">
        <div class="container-fluid">
        
          
        </div>
      </footer>
    </div>
  </div>
<?php else:?>
  <?php 
  View::load("login");

?>

<?php endif;?>
</body>

  <!--   Core JS archivos   -->
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>

  <!--  Plugin de gráficos -->
  <script src="assets/js/chartist.min.js"></script>

  <!--  Complemento de notificaciones    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  <!--  Complemento de Google Maps    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

  <!-- Métodos javascript del panel de materiales -->
  <script src="assets/js/material-dashboard.js"></script>

  <!-- Métodos DEMO del panel de materiales, ¡no lo incluya en su proyecto! -->
  <script src="assets/js/demo.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){

      // El cuerpo del método Javascript se puede encontrar en assets/js/demos.js
          demo.initDashboardPageCharts();

      });
  </script>

</html>
