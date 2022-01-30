<!doctype html>
<html >
<body style="background-image: url(../imagenes/fondo1234.jpg); ">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Administracion WEB">

 <div >
    <title>Administración</title>
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/style5.css">

 <script src="../js/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
<link rel="stylesheet" href="../fonts/css/fontawesome-all.css" crossorigin="anonymous">
    <script defer src="../fonts/js/fontawesome-all.js"></script>
<style>
  /*.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
 /* Set the fixed height of the footer here */
 /* Vertically center the text there 

}*/
.footer {

width: 100%;
position: fixed; /* Fija el contenedor a una posición */
bottom: 0px; /* El div se sitúa abajo */
z-index: 10; /* Lo muestra por encima de otros div */

 }

</style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#"> Administrador </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
<?php echo "<a class='nav-link btn btn-outline-danger p-3 ml-2' href='index.php' ><i class='fas fa-home'></i> Principal</a>";?>
      </li>

     <!--   <li class="nav-item active">
<?php echo "<a class='nav-link btn btn-outline-warning p-3 ml-2' href='eva_categoria.php' ><i class='far fa-edit'></i> Categoria</a>";?>
      </li>
      
        <li class="nav-item active">
<?php echo "<a class='nav-link btn btn-outline-primary p-3 ml-2' href='leccion.php' ><i class='far fa-edit'></i> Lección</a>";?>
      </li>-->

      
      
        <li class="nav-item active">
<?php echo "<a class='nav-link btn btn-outline-success p-3 ml-2' href='usuario_new.php' ><i class='fas fa-key'></i> Usuario Admin</a>";?>
      </li>

        </ul>

        <form class="form-inline my-2 my-lg-0">
      
      <a class="nav-link btn-danger active" href="../cerrarsesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar</a>
    </form>

      </div>
    </nav>
<div class="container">
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


<!--<ul class="dropdown-menu" role="menu">
            <li><a href="eva_categoria.php"><img src="../iconos/add.png"> Crear Categoria</a></li>
            <li><a href="eva_colegio.php"><img src="../iconos/application_home.png"> Añadir Colegio</a></li>
            <li><a href="nuevo.php"><img src="../iconos/icon-16-user-dd.png"> Nuevo Alumno</a></li>
            <li><a href="eva_nueva.php"><img src="../iconos/publish_g.png"> Crear Evaluación</a></li>
            <li><a href="eva_mostrar.php"><img src="../iconos/book_open.png"> Ver Evaluaciones</a></li>  
          <li><a href="ver_registros.php" ><img src="../iconos/icon-16-contacts.png"> Ver Registrados</p></a></li>
        <li><a href="../cerrarsesion.php" ><p class="rojo"> Cerrar Sesión</p></a></li>                     
          </ul>-->