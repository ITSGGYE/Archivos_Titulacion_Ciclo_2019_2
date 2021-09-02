<?php
session_start();
$id='';
$did='';
if(isset($_SESSION["did"])){
   	$vid = $_SESSION["did"];

		 if($vid==1){
			//go to faculty page
			header("location:faculty/index.php");
		}
		else if($vid==2){
			header("location:hod/index.php");
		}
		else if($vid==3){
			header("location:principal/index.php");
		}
	

}
//declaring variables to hod the value that is posted from the form
$error='';
if(isset($_POST["lid"]) && isset($_POST["lpwd"]) && isset($_POST["design"])){
	$login_id = preg_replace('#[^A-Za-z0-9_\&\*\#\@]#i', '', $_POST["lid"]); // filter everything but numbers and letters
	$login_pwd = preg_replace('#[^A-Za-z0-9_\&\*\#\@]#i', '', $_POST["lpwd"]); // filter everything but numbers and letters
	$login_design = preg_replace('#[^0-9]#i', '', $_POST["design"]); // filter everything but  letters
	// echo $login_id,$login_pwd,$login_design;
	//now checking with db
	$servidor = "localhost";
    $nombreusuario = "root";
	$password = "mylan2020";
	$db_name = "proyect";
	$conexion = new mysqli($servidor, $nombreusuario, $password, $db_name);
	$consulta =("SELECT * FROM user  WHERE userId='$login_id' AND password='$login_pwd' AND did='$login_design' LIMIT 1"); // query the person
	$resultado =mysqli_query($conexion, $consulta);	      
    if ($resultado) { // evaluate the count
	     while($row = mysqli_fetch_array($resultado)){ 
                        $id = $row["id"];
			 $did = $row["did"];
		 }
		 if($did==1){
			//go to faculty page
			$_SESSION["id"] = $id;
			$_SESSION["did"] = $did;
			header("location:faculty/index.php");
		}
		else if($did==2){
			//go to hod
                        $_SESSION["id"] = $id;
						$_SESSION["did"] = $did;
			header("location:hod/index.php");
		}
		else if($did==3){
			//go to principal
                        $_SESSION["id"] = $id;
						$_SESSION["did"] = $did;
			header("location:principal/index.php");
		}
		else{
		     $error="Username or Password Invalid";
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
   <form class="form"  action="index.php" method="post"  onsubmit="return validar();">
    <div class="encabezado-formulario">
      <h1 class="titulo-formulario">INGRESE <span>sus datos</span> </h1>
    </div>
    <label class="formulario-label" >Selecione el tipo de Usuario:</label>
    <select id="roles" class="form-control" name="design">
              <option >--- Seleccionar ---</option>
			  <option value="3">ALUMNO</option>
			  <option value="2">ADMINISTRADOR</option>
			  <option value="1">DOCENTE</option>
    </select>
        <label for="Usuario" class="formulario-label">Usuario:</label>
        <input type="text" id="usuario" name="lid" class="form-control user" placeholder="Escriba su Usuario en el casillero" > 
      
        <label for="Password" class="formulario-label">Clave de Acceso:</label>
        <input type="password" id="clave" name="lpwd" class="form-control pass" placeholder="********************************" > </br>

       <input type="submit" name="submit" class="btn btn-default" value="Ingresar"/>

    </form> 
  </div> 
  <footer align="center">
			"manuela cañizares high school" &copy; 2020
  </footer>
  </body> 
</html>