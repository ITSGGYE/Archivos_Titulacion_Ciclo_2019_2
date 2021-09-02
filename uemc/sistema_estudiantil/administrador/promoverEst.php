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
if(isset($_POST["old_Curso"]) && isset($_POST["new_Curso"])){
	$newID = $_POST["new_Curso"];
	$old = $_POST["old_Curso"];
	//retriving data to check old password
	$sql1 = mysqli_query($conexion,"SELECT * FROM estudiantes WHERE  curso = '$old' ");
	while($row= mysqli_fetch_array($sql1)){
		$ck = $row["curso"];
	}

	if($ck == $old){
		//means success so updating
		$sql = mysqli_query($conexion, "UPDATE estudiantes SET curso = '$newID' WHERE Estado='Activo' and curso = '$old' ");
		$msg = "<div align='center'><font color='green'>Modificado Satisfactoriamente</font></div>";
		
	}
	else{
		//means some error occured
		$msg = "<div align='center'><font color='red'>Lo siento, contraseña antigua incorrecta. Intente de nuevo</font></div>";
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
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Unidad Educativa PCEI </small>"Manuela Cañizares"</h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../menu_conexion/administradormenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="promoverEst.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Promover Estudiantes
</h3></caption>
			<tbody>
					<th class="danger" colspan="6">Selecione el curso a promover
			
				</th>
				<tr>
				
					<td class="info" colspan="3"> 	
						<select name="old_Curso" class="form-control">
						<option value="">--De--</option>
								
								<option value="Octavo">Octavo</option>
								<option value="Noveno">Noveno</option>
								<option value="Décimo">Décimo</option>
								<option value="Primero de Bachillerato">Primero de Bachillerato</option>
								<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
								<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
			
						</select>
						
					</td>
					<td class="info" colspan="3"> 	
						<select name="new_Curso" class="form-control">
						<option value="">-- A--</option>
								
								<option value="Noveno">Noveno</option>
								<option value="Décimo">Décimo</option>
								<option value="Primero de Bachillerato">Primero de Bachillerato</option>
								<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
								<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
			
						</select>
						
					</td>
					
				<tr>
					<td colspan="6" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="cambiar">	
								<p>Nota: Para cambiar Id<a href="modificarUs.php">haga clic aquí
</a></p>	
					</td>
				</tr>
				<tr>
					<td colspan="6" align="center" class="success">
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


















