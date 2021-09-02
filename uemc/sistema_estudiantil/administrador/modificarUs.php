<?php
session_start();
include ("../menu_conexion/conectar.php");
     if(!isset($_SESSION["tipo_usuario"])){
       header("location:../inicio.php");
     }
	 else{
	
	   $check_did = $_SESSION["tipo_usuario"];
		if($check_did !=2){
			 header("location:../inicio.php");
		}
	}
	
$msg ="";
$ck="";
$id = $_SESSION["id"];
//checking whether new id is passed or not
if(isset($_POST["old_Id"]) && isset($_POST["new_Id"])){
	$newID = $_POST["new_Id"];
	$old = $_POST["old_Id"];
	//retriving data to check old id
	$sql1 = mysqli_query($conexion, "SELECT * FROM usuario WHERE nombreUsuario = '$old' ");
	while($row= mysqli_fetch_array($sql1)){
		$ck = $row["nombreUsuario"];
	}

	if($ck == $old){
		//means success so updating
		$sql = mysqli_query($conexion, "UPDATE usuario SET nombreUsuario = '$newID' WHERE nombreUsuario = '$old' ");
		$msg = "<div align='center'><font color='green'>Cambiado exitosamente</font></div>";
		
	}
	else{
		//means some error occured
		$msg = "<div align='center'><font color='red'>Lo sentimos, ID incorrecto, intenta de nuevo</font></div>";
	}

}


?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
		Unidad Educativa PCEI "Manuela Cañizares"
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left"></br>
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa </small>"Manuela Cañizares"</h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../menu_conexion/administradormenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="modificarUs.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Cambiar ID</h3></caption>
			<tbody>
					<th class="danger" colspan="2">Nueva identificación
				
				</th>
				<tr>
					<td class="active" colspan="2">	
						<input type="text" class="form-control" placeholder="Antiguo Id" name="old_Id"/>
						</select>
					</td>
		
				</tr>
				<tr>
					<td class="active" colspan="2">	
						<input type="text" class="form-control" placeholder="Nuevo Id" name="new_Id"/>
						</select>
					</td>
		
				</tr>
				<tr>
					<td colspan="2" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Cambiar">	
								<p>Nota: Para cambiar la contraseña<a href="changePWD.php">haga clic aquí
</a></p>	
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		</div>
	</body>
</html>