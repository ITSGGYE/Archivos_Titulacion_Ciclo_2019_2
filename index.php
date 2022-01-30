<!doctype html>
<html lang="Es">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link  rel="icon"   href="estilos/img/fondo-login.png" type="image/png" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fonts/css/fontawesome-all.css" crossorigin="anonymous">
    <script defer src="fonts/js/fontawesome-all.js"></script>
 <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


        <?php include("zerox.php");?>      

    <title>pronunciation</title>
<style>
.footer {

width: 100%;
position: fixed; /* Fija el contenedor a una posición */
bottom: 0px; /* El div se sitúa abajo */
z-index: 10; /* Lo muestra por encima de otros div */

 }
</style>
  </head>
<body style="background-image: url(imagenes/fondo.jpg);background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;background-color: #66999;">
 <!--container -->   
<div class="container-fluid" style="background-color: rgba(20, 22, 19, 0.6);">
 <nav class="navbar navbar-expand-lg navbar-dark container p-4" style="background-color: rgba(20, 22, 19, 0.2);">
  <a class="navbar-brand" href="#"><i class="fal fa-edit fa-2x"></i><font class='text-warning'>  ENRIQUE GIL CALDERON </font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php
mt_srand(time());
$digitos = '';
for($i = 0; $i < 16; $i++){
   $digitos .= mt_rand(0,9);
}
;?>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
       <li class="nav-item active">
        <a class="nav-link btn btn-outline-warning p-3 ml-2" href="index.php" ><i class='fas fa-home'></i> Inicio</a>
      </li>


      <li class="nav-item active">
<?php echo "<a class='nav-link btn btn-outline-success p-3 ml-2' href='admin.php' ><i class='fas fa-key'></i> Administrar</a>";?>
      </li>

    </ul>

  </div>
</nav> 
</div><!--cierra el container-->
<!--nav bar-->
<div class="container">
 <!-- row -->
  <div class="row d-flex justify-content-center">

    <div class="col-md-5 text-light p-4 mt-4" style="background: rgba(47, 175, 255, 0.8);">
                <div class="col-12 user-img">
                      <img src="imagenes/fondo-login.png" th:src="@{/fondo-login.png}"/style="
    padding-left: -;
    margin-left: 139px; 
">
<style >
.user-img{
  margin-top: -50px;
  margin-bottom: 35px;
}
.user-img img{
  width: 120px;
  height: 120px;
  box-shadow: 0px 0px 3px #848484;
    border-radius: 50%;

}
button{
    width: 100%;
    margin: 10px 0 25px;

}
</style>
                </div>
        <?php include("zerox.php");?>      
        <form action="<?php echo $ir;?>" method="post" >
              <p class="h4 text-center mb-4">INGRESO A LA EVALUACIÓN</p>
              <!-- Material input password -->
              <div class="input-group mb-3">
                    <div class="input-group-prepend">
                       <span class="input-group-text bg-light text-info" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                  <input type="password" name="<?php echo $us;?>" class="form-control" placeholder="Escriba su contraseña" aria-label="Nombre de Usuario" aria-describedby="basic-addon1" style="height: 50px;font-size: 15px;" autofocus required pattern="[0-9]{5,15}">
                  <input type="hidden" name="<?php echo $car;?>" value="<?php echo $num;?>" />
              </div>

              <div class="text-center mt-4 d-flex justify-content-star">
                  <button type="submit" class="btn btn-success" style="font-size: 25px;" ><i class="fal fa-sign-in-alt"></i> Ingresar</button>
              </div>
              <hr>
                    <p class="text-right text-white" style="font-size: 17px; margin-bottom: -1em;"><em>Desarrollado por: JOSEPH GARCIA - SORAYA PARREÑO</em></p>
        </form>
        <!-- Material form login -->
    </div><!--cierra el col-md-5-->


<!--<img src="imagenes/fondo.jpg" class="img-fluid" alt="Responsive image">-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
