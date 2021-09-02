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
if((isset($_POST["sname"]))  && (isset($_POST["est"]))  ){
	$sname = $_POST["sname"];
	$est = $_POST["est"];

	
	if($sname==""  && $est=="" ){
					$msg = "<font color=\"red\">Todos los  son requeridos.</font>";

	}
	else{
	$uppername = strtoupper($sname);
	//new registration of the subject
	
					$sql = mysqli_query( $conexion,"SELECT * FROM materias where nombreMat='$uppername' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$sql1 = mysqli_query($conexion, "UPDATE `materias` SET `estado`='$est' where nombreMat='$uppername'  ");
					if($sql1){
						$msg = "<font color=\"green\">Registrado Satisfactoriamente</font>";
					}
					
				}
	
	//end of else which indicates not null
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
			<form method="post" action="editarMateria.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Registre una nueva asignatura</h3></caption>
			<tbody>
				<th class="danger" colspan="3">Registro				
				</th>

			<tr>
			        <td class="info" colspan="3">
					<select name="sname" class="form-control">
						<option value="">SELECCIONE MATERIA</option>
						<?php 
							$sql = mysqli_query($conexion, "SELECT nombreMat FROM `materias`");
							while($row = mysqli_fetch_array($sql)){
								$sname = $row["nombreMat"];
								echo "<option value='$sname'>$sname</option>";
							}
						?>
					</select>
					</td>
			</tr>

				<tr>

					<td class="info" colspan="3"> 	
						<select name="est" class="form-control">
					<option value="">-- Seleccione el estado de la Materia--</option>
								
			<option value="1">Activo</option>
			<option value="0">Inactivo</option>

						</select>
					</td>

				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Registrar">	
								
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
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