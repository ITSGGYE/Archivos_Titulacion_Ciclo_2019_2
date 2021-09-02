<?php

require "menu_conexion/conectar.php";
require 'menu_conexion/funcs.php';


$errors = array();

if(!empty($_POST))

{

    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $pass = $mysqli->real_escape_string($_POST['pasw']);
    $cpass = $mysqli->real_escape_string($_POST['cpasw']);
    $email = $mysqli->real_escape_string($_POST['email']);

 $activo = 0;
 $tipo_usuario = 3;

 if(isNull ($nombre, $usuario, $pass, $cpass, $email))
 {
    $errors[] = "Debe llenar todos los campos";
 }


 if(!isEmail ($email))
 {
    $errors[] = "Dirección de correo inválida";
 }


 if(!validaPassword ($pass, $cpass))
 {
    $errors[] = "Las contraseñas no coinciden";
 }

 if(usuarioExiste($usuario))
 {
    $errors[] = "El nombre de $usuario ya existe";


 }

 if(emailExiste($email))
 {
    $errors[] = "El correo electronico $email ya existe";

    
 }

 if(count($errors) == 0)
 {
 $pass_hash = hashPassword($pass);
 $token = generateToken();

 $registro = registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);

 if($registro > 0){

  $url = 'http://'.$_SERVER["SERVER_NAME"].
  '/sistema_estudiantil/activar.php?id='.$registro.'&val='.$token;

 $asunto = 'Activar Cuenta - Sistema Acádemico Manuela Cañizares';
 $cuerpo = "Estimado $nombre: <br/><br/> Para continuar con el
 proceso de registro, deberàs dar click la siguiente opción 
 <a href ='$url'>Activar Cuenta</a>";

 if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
 
 echo"Para terminar el proceso de registro siga las instrucciones que le hemos enviado a la 
 direcciòn de correo electrónico: $email";

 echo "<br><a href='inicio.php'>Iniciar Sesion</a>";
 exit;
 }else{
    $errors[] = "Error al enviar Email"; 
 }

}else {
    $errors[] = "Error al Registrar";
 }


 }  

}







?>




</html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,600|Spicy+Rice&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700&display=swap" rel="stylesheet">
	<link rel="shortcut-icon" href="imagenes/logouemc.png">
    <link rel="stylesheet" href="css/login.css">
    <title>Unidad Educativa PCEI Manuela Cañizares</title>
  </head>
  <body background="imagenes/background.jpg">
  <div class="encabezado">
  <h1 class="text">SISTEMA DE GESTIÓN ACADÉMICA</h1>
  </div> 
<div class="separador1">  </div>
  <img class="posicion" src="imagenes/logouemc.png" alt="no se puede cargar la imagen">

  <div class="contenedor">
  <form id="signupform" class="form" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
    <div class="encabezado-formulario">
      <h1 class="titulo-formulario">REGISTRE <span>sus datos</span> </h1>
    </div>
  
        <label for="Usuario" class="formulario-label">Nombres completos:</label>
        <input type="text" id="usuario" name="nombre" class="form-control user" placeholder="Escriba su Usuario en el casillero" value="<?php if(isset($nombre)) echo $nombre; ?>" required> 
      
		<label for="usuario" class="formulario-label">Usuario</label>
		<input type="text" class="form-control pass" name="usuario" placeholder="Escriba su nombre de Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>


        <label for="Password" class="formulario-label">Escriba su contraseña:</label >
        <input type="password" id="usuario" name="pasw" class="form-control pass" placeholder="********************************" required> 

        <label for="Password" class="formulario-label">Confirme su contraseña:</label >
        <input type="password" id="usuario" name="cpasw" class="form-control pass" placeholder="********************************" required> 

        <label for="email" class="formulario-label">Email:</label>
		<input type="email" id="usuario" class="form-control pass" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
								
       <input type="submit" name="submit" class="btn btn-default" value="Registrar"/>
	   <div style="border-top: 1px solid#EEC57B; color:white; padding-top:15px; font-size:85%" >
	Ya tienes una cuenta! <a href="inicio.php">Inicia Sesión Aquí</a>
	</div>

    </form> 
    <?php echo resultBlock($errors); ?> 
  </div> 
   
  <footer align="center">
			"manuela cañizares high school" &copy; 2020
  </footer>
  </body> 
</html>