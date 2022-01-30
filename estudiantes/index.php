<?php 
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 

    <title>Pagina Principal</title>

    <link  rel="icon"   href="estilos/img/fondo-login.png" type="image/png" />
     <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

       
    <!-- Nuestro css-->
  <link href = "../estudiantes/css/index.css" rel="stylesheet"/>
   

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

  </head>
<nav class="navbar navbar-dark bg-dark" >


    <a  style=" color: #fff;">
  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
  <font style="vertical-align: inherit; margin-left: 1000px;border-bottom-width: 10px;padding-bottom: 10px;color: #fff;">Student</font></font></span>
<img class="img-profile rounded-circle" src="../imagenes/fondo-login.png" style="width: 35px">
              </a>
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" style="margin-left: 720px;background-color: #9DA0F9">
          
              </div>
<button type="button" class="btn btn-success" onclick="location.href='../cerrarsesion.php'">Logout</a></button>  </nav>
</div>
 </nav>
</div>
  <body  >
<div id = "page-selector" class = "page center" current>
    <div class = "top">
     
      
    </div>
    <div class = "content">
      <div id = "numbers" class = "group"onclick="location.href='abecedario.php'">   Alphabet  </div>
      <div id = "colors" class = "group"onclick="location.href='numeros.php'">Numbers</div>
      <div id = "numbers" class = "group"onclick="location.href='colors.php'">   Colors  </div>
      <div id = "animals" class = "group"onclick="location.href='./diagnostico/index.html'">
Diagnosis</div>  
   <!--   <div id = "verbs" class = "group"onclick="location.href='principal.php'">Lesson</div>
          
    </div>-->
  </div>

  </body>

<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>