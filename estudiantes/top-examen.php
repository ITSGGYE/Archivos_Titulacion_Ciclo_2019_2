<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Evaluaciones</title>

<link rel="icon" href="../../favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../../fonts/css/fontawesome-all.css" crossorigin="anonymous">


<script defer src="../../fonts/js/fontawesome-all.js"></script>
<script type="text/javascript">
  function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
}
</script>
<!--este codigo  funcion 1-->
<style type="text/css">
.cuadro{
    background-color: #F80943;
    color:#ffffff;
}
.cuadros{
    background-color: #71C126;
    color:#ffffff;
    padding: 0.5em;
    border-radius: 0.2em;
}
.footer {

width: 100%;
position: fixed; /* Fija el contenedor a una posición */
bottom: 0px; /* El div se sitúa abajo */
z-index: 10; /* Lo muestra por encima de otros div */

 }
</style>
</head>

<body onload="deshabilitaRetroceso()"><!--funciona con este codigo 2-->
    <!--<body>-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><h3> <i class="fas fa-edit fa-1x"></i> SISTEMA DE ASISTENCIA</h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">v 2.0<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <?php echo "<a href='#' class='btn btn-warning btn-lg mr-3' role='button' aria-pressed='true'><i class='far fa-home'></i> Inicio</a> ";?>
      </li>
      <li>
        <?php echo "<a href='#' class='btn btn-outline-primary btn-lg' role='button' aria-pressed='true'><i class='fal fa-file-alt'></i> Trabajos</a> ";?>
      </li>
      <li>
        <?php echo "<a href='#' class='btn btn-outline-warning btn-lg ml-3' role='button' aria-pressed='true'><i class='far fa-pen-alt'></i> Tareas</a> ";?>
      </li>
      <li>
        <?php echo "<a href='#' class='btn btn-outline-success btn-lg ml-3' role='button' aria-pressed='true'><i class='fal fa-comments'></i> Foros</a> ";?>
      </li>


    </ul>


      <a href="../cerrarsesion.php" class="btn btn-outline-danger my-2 my-sm-0"><h4><i class="fal fa-sign-out-alt"></i> Salir</h4></a>

  </div>
</nav>