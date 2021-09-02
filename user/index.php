

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
      <link href="../css/all.css" rel="stylesheet">
      <script defer src="../js/all.js"></script> 
      <link rel="stylesheet" href="../css1/animate.css">
      <title> CONEXIÓN VITAL</title>
      <link rel="stylesheet" href="../css/login.css">
      <link rel="stylesheet" href="../css/kube.css">
      <link rel="icon" type="image/x-svg" href="iconos/favicon.png">
      <script src = "../js/kube.min.js"> </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link href="user/css/toastr.css" rel="stylesheet">
      <script src="user/js/toastr.min.js"></script>
      <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--     <script> $ K.init ();</script> -->
   </head>
   <body style="  background: url(../img/begin.jpg) no-repeat center;
      background-attachment: fixed;
      background-size: cover;">
      <header >
         <center>
            <h1  style="margin-top: -75px;
               font-family:Raleway;font-weight: bold;  color: #fff;
               background: #39aeb8; font-size: 40px;letter-spacing: 5.5px;width: 420px; height: -55px;">INICIAR SESION</h1>
         </center>
      </header>
      <br><br>
      <section>
         <center>
            <br><br>
            <form action="val.php" method="post"  onSubmit="return correovalida()">
               <h2 style="font-weight: bold; letter-spacing: 10px; color:#39aeb8; font-size: 35px;">FUNDACIÓN</h2>
               <img src="../img/logor.png"  width="400">
               <input style="font-weight: bold; font-stretch: 20px;" type="text" placeholder="&#128101;  Email" id="correo" name="correo" class="form-control"     required autofocus>
               <br>
               <input style="font-weight: bold;"  type="password" placeholder="&#128274; Contraseña" id="contrasena"  name="contrasena" class="form-control"  required>
               <br><br>
               <input  id="accion" name="accion"  type="hidden" value="validar">
               <button class="button is-secondary" type="submit" style=" font-family:Raleway; font-weight: bold;letter-spacing: 22px;  font-size:18px;">INGRESAR</button>    
            </form>
            <br>
            <center>
               <p style=" margin-top: -30px; font-size: 18px;color:black; font-weight: bold;letter-spacing:5px;">Primera Vez Registrate Ya!</p>
               <p  class="ini animated flash" style=" margin-top: -25px; letter-spacing:22px; margin-right:-15px; " ><a style="text-decoration: none; margin-top: -50px; font-weight: bold; font-size: 22px; " href="../index3.php">REGISTRARSE</a></p>
               <br>
               <a style="text-decoration: none; font-family:Raleway; font-size: 22px; " href="../index.html"><button class="button is-icon" style="width:400px;height:5px;">
                <i class="fas fa-chevron-left" style="font-size: 60px; color:white; "></i> REGRESAR AL INICIO</button></a>
            </center>
         </center>
      </section>
      <footer>
         <div style="background: white;"></div>
      </footer>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script >

   function correovalida(){

      var valor = $("#correo").val();
        if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(valor)) {
            return true;
        } else {
         swal("Oh no!", "Correo no Válido", "error");
            return false;
        }
    }
    window.onload = function() {
        $("#correo").val('');
        $("#contrasena").val('');
    };
    
    </script>
   </body>
</html>

