<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./estilos/css/bootstrap.min.css">
    <link rel="stylesheet" href="./estilos/misestilos.css">
    <link rel="stylesheet" href="./estilos/Contra.css">
    <link rel="icon" href="./imagenes/logo2.ico">
    
</head>
<body class="miBody">
  
  
<div class="container-fluid" id="contenedorPrincipal">
        <div class="row">
        <div class="col-md-4">

            <form id="formulario" action="./modelo/login.php" method="POST">
              <img src="./imagenes/logo.png" style="width: 100px; height: 100px;" class="logo"  alt="" >
              
                <label for="Bienbenido" > <h1 class="text-info " >Bienvenido</h1> </label>
                <label for="parrafo"> <p>
                    <span class="text-white">
                    Hola un gusto en recibirte en el sistema de la empresa ServiPortex     
                    </span> 
                </p> 
            </label>
            <hr>
            <div class="form-group">
                <label for="usuario" class="text-info ">Usuario</label>
                <input type="text" class="form-control " name="usuario" id="usuario" placeholder="Usuario" aria-describedby="usuario1" required>
                <small id="usuario1" class="form-text text-white"> 
                    Por favor ingrese su usuario
                 </small>
            </div>
            <div class="form-group">
                <label for="contrasena" class="text-info ">
                     Contraseña 
                    </label>
                <input type="password" name="contra" class="form-control " id="contrasna" placeholder="Contraseña" aria-describedby="contrasena1" required>
                <small id="contrasena1" class="form-text text-white">
                     Por favor ingrese su contraseña
                </small>
            </div>
            <hr>


                <button type="submit" class="btn btn-info btn-lg text-capitalize btn-block " id="iniciosesion">iniciar sesión</button>
                 

            </form>

           
        </div>
        <div class="col-md-8" id="carousel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./imagenes/call3.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./imagenes/call2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./imagenes/call.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>
    </div>
    

    <script src="./estilos/js/jquery.js"></script>
    <script src="./estilos/js/bootstrap.min.js"></script>
</body>
</html>