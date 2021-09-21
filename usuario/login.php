
<!DOCTYPE html>
<html>
<head>
  <title>Consultorio Odontologico</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="css/loginnn.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="js/vision.js"></script>
  <link rel="icon" href="../imagen/logooo.png" type="image" >

</head>
<body style="background: url(img/tu.jpg) no-repeat;
background-attachment: fixed;
background-size: cover;">
<section>
 <center>
   <form action="val.php" method="post">
    <div><img src="img/logooo.png"></div>
    <h2 >INICIAR SESIÓN</h2>
    <label > Usuario</label> <br>
    <input class="Usuario" type="text"  name="usuario" placeholder="&#x1F464;  Primer Nombre y Dos Apellidos" required autofocus>
    <br> <br><br>
    <label>Contraseña</label> <br><br>
    <div class="input-group">
      <input class="Contraseña" placeholder="&#x1F511; Contraseña" required autofocus class="" type="password" name="contrasena"/>
      <span id="show-hide-passwd" action="hide" class="input-group-addon glyphicon glyphicon glyphicon-eye-open"></span>
    </div>
  <!--
    <label>Contraseña</label> <br>
    <input  type="password"  name="pass" placeholder="&#x1F511; Contraseña" required autofocus>
  -->
  <br><br><br>
  <input  id="accion" name="accion"  type="hidden" value="validar">
  <button type="submit"  >INGRESAR</button>
  
  <p>¿Aun no te has registrado?<a href="registrate.php">Registrate</a></p>
  
  
</form>
</center>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>