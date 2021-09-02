<!DOCTYPE html>
<html>
   <head>
      <head>
         <meta charset="utf-8"> 
         <title> CONEXIÓN VITAL</title>
         <link rel="stylesheet" href="css/login.css">
         <link rel="stylesheet" href="css/kube.css">
         <link rel="icon" type="image/x-svg" href="img/favicon.png">
        <!--  <link rel="stylesheet" href="css1/animate.css"> -->
        <!--  <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css"> -->
      <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/tooltip.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link href="user/css/toastr.css" rel="stylesheet">
      <script src="user/js/toastr.min.js"></script>
      <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"> -->
 
       <link href="css/all.css" rel="stylesheet">
       <script defer src="js/all.js"></script>  
   </head>
   <body  style="  background: url(img/begin.jpg) no-repeat center; background-attachment: fixed; background-size: cover;">
  
  
  
     <center>
         <h2 style="font-weight: bold;  color: #fff; background: #39aeb8; font-size: 30px;letter-spacing: 5.5px;width: 420px; height: -45px;">
            <center><b>REGISTRATE</b>
         </h2>
         </center>
      </center>
      <center><img src="img/logor.png" width="25%"></center>
      <section >
     
         <div class="contenedor"> 
         <div id="dataResultado"> <div>
            <center><!-- action="registro2.php"   -->
                  <br>
                <!--   <label style="font-weight: bold;" >IDENTIFICACIÓN</label> -->
                  <input type="text" name="cedula" id="cedula" placeholder="&#128272; Ingrese Cedula" style="font-size: 14pt; width: 350px; font-weight: bold;"  class="form-control"   maxlength="10" onKeyPress="return SoloNumeros(event)"   ><br>
                 <!--  <label style="font-weight: bold;" >NOMBRES </label> -->
                  <input type="text" name="nombre" id="nombre" placeholder="&#128272; Ingrese Nombre" style="text-transform:uppercase;font-size: 14pt; width: 350px; font-weight: bold;"  class="form-control" onKeyPress="return soloLetras(event);" ><br>
                 <!--  <label style="font-weight: bold;" >EMAIL</label> -->
                  <input type="email" placeholder="&#128272; Ingrese Correo"  name="correo"    id="correo" class="form-control" style="text-transform:lowercase;font-size: 14pt; width: 350px;font-weight: bold;"><br>
                 <!--  <label style="font-weight: bold;" >CONTRASEÑA</label> -->
                  <input type="password" placeholder="&#128272; Ingresa Contraseña"  id="contrasena"  name="contrasena" class="form-control" style="font-size: 14pt; width: 350px; font-weight: bold;" > <br>
                <!--   <label style="font-weight: bold;" >REPITA CONTRASEÑA</label> -->
                  <input type="password" placeholder="&#128272;  Repita Contraseña"   id="rpass" name="rpass" class="form-control" style="font-size: 14pt; width: 350px; font-weight: bold;"  > <br>
                <!--   <label style="font-weight: bold;" >FECHA NACIMIENTO</label> -->

                <?php date_default_timezone_set('America/Guayaquil'); ?>
                  <input type="date" name="fecha"   id="fecha"  style="font-size: 14pt; width: 350px;color: black;font-family:Raleway; "  max="<?php echo date("Y-m-d"); ?>" class="form-control"  ><br>
      
                  <label style="font-weight: bold;" id="resultado" ></label>
                  <select name="genero"  id="genero" class="form-control"  style="font-size: 14pt; width: 350px;color: black;font-family:Raleway; "  >
                     <option value="">Seleccione Genero</option>
                     <option  value="Masculino">Masculino</option>
                     <option  value="Femenino">Femenino</option>
                  </select>
                  <br>
                  <button class="button is-secondary" style=" font-family:Raleway; font-weight: bold;letter-spacing: 22px;  font-size:18px;" id="idRegistros" onclick="validaRegistroPaciente()"  >REGISTRAR</button>           
      
         </div>
         <center>         
         <p style=" font-size: 18px;color:black; font-weight: bold;text-align: center;">Ya tines cuenta? o registrate Ahora e Ingresa</p>
         <p  class="ini  animated flash" style=" margin-top: -20px; letter-spacing:15px;" ><a style="text-decoration: none; margin-top: -50px; font-weight: bold; font-size: 22px; " href="user/index.php">INICIAR SESSION</a></p></center>
         <br>
         <center>
         <a style="text-decoration: none; font-family:Raleway; font-size: 22px; margin-bottom: 50px; " href="index.html"><button class="button is-icon" style="width:400px;height:5px;"> <i class="fas fa-chevron-left" style="font-size: 60px; color:white; "></i> REGRESAR AL INICIO</button></a></center><BR>
         </center>
      </section>
      <script src="user/js/jquery-1.11.1.min.js"></script>
      <script src="//code.jquery.com/jquery-1.12.4.js"></script>
<!--   <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
      <script src="js/resgistroUser.js"></script>
   

   </body>
</html>

