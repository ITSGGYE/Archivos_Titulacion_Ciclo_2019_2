
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
if(isset($_POST["old_Id"]) && isset($_POST["old_roles"]) ){
	//$newID = $_POST["new_Id"];
	$old = $_POST["old_Id"];
	$oldd= $_POST["old_roles"];
	//retriving data to check old password
	$sql1 = mysqli_query($conexion, "SELECT * FROM usuario WHERE  nombreUsuario = '$old' AND tipo_usuario = '$oldd'  ");
	while($row= mysqli_fetch_array($sql1)){
		$ck = $row["nombreUsuario"];
	}

	if($ck == $old ){
		//means success so updating
		$sql = mysqli_query($conexion, "UPDATE usuario SET contraseña = 'uemc0001restablecido' WHERE nombreUsuario='$old' AND tipo_usuario='$oldd'  ");
		$msg = "<div align='center'><font color='green'>Cambio de contraseña exitoso</font></div>";
		
	}
	else{
		//means some error occured
		$msg = "<div align='center'><font color='red'>Error al Cambiar la contraseña, intentalo nuevamente</font></div>";
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
			<form method="post" action="restablecerCon.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Restablecer la contraseña</h3></caption>
			<tbody>
					<th class="danger" colspan="2">Ingresar ID para restablecer la contraseña				
				</th>
				<tr>

					
						<td class="active" colspan="2">	
					<select id="roles" class="form-control" name="old_Id">
                    <option >--- Seleccionar ---</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `nombreUsuario` FROM `usuario`  GROUP BY `nombreUsuario` ORDER BY `nombreUsuario`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["nombreUsuario"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
					</select>
					</td>
				</tr>

				<tr>

					<td class="active" colspan="2">	
					<select id="roles" class="form-control" name="old_roles">
                    <option >--- Seleccionar ---</option>
			        <option value="ALUMNO">ALUMNO</option>
			        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    <option value="DOCENTE">DOCENTE</option>
					</select>
					</td>
				</tr>
		
				
				<tr>
					<td class="active" colspan="2">	
						Nota: La contraseña de reinicio es: "uemc0001restablecido".

					</td>
		
				</tr>

				<tr>
					<td colspan="2" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Restablecer la Contraseña">	
							
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