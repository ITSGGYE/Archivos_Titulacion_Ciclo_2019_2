
<?php
session_start();
include ("../include/connect.php");
     if(!isset($_SESSION["did"])){
       header("location:../index.php");
     }
	 else{
	   $check_did = $_SESSION["did"];
		if($check_did !=3){
			 header("location:../index.php");
		}
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<link rel="stylesheet" type="text/css" href="../css/login.css"/>
		<title>
		Unidad Educativa PCEI "Manuela Cañizares"
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa "Manuela Cañizares"</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/prmenu.txt");?></div>
						<br><br/><br/>
			<h3><font color="663300"></font>Bienvenido al sistema  "Estudiante" 
			</font></h3>
</div></br></br></br>
		<img class="posicion" src="../imagenes/logouemc.png" alt="no se puede cargar la imagen">
	</body>
</html>