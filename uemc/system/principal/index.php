
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
		<link rel="stylesheet" type="text/css" href="../css/slider.css"/>
		<title>
		       Unidad Educativa PCEI "Manuela Cañizares"
		</title>
	</head>
<body  background="../imagenes/backgrounds.jpg">
		<div class="container" align="center">
			<div class="head pull-left">
</br>
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa </small>"Manuela Cañizares"</h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<h3><font color="663300">Bienvenido al sistema  "Estudiante"
 </font></h3>
		</div>
		<div class="slider">
		    <ul>
            <li><img src="../imagenes/1.jpg"></li>
			<li><img src="../imagenes/2.jpg"></li>
			<li><img src="../imagenes/3.jpg"></li>
			<li><img src="../imagenes/4.jpg"></li>
			<li><img src="../imagenes/5.jpg"></li>
			<li><img src="../imagenes/6.jpg"></li>
		    </ul>
		</div>
	</body>
</html>