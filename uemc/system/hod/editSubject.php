
<?php
session_start();

include ("../include/connect.php");
     if(!isset($_SESSION["did"])){
       header("location:../index.php");
     }
	 else{
	
	   $check_did = $_SESSION["did"];
		if($check_did !=2){
			 header("location:../index.php");
		}
	}
$msg ="";
if((isset($_POST["sname"])) && (isset($_POST["year"]))  ){
	$sname = $_POST["sname"];
	$year = $_POST["year"];
	
	if($sname=="" && $year=="" ){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
	else{
	$uppername = strtoupper($sname);
	//new registration of the subject
	
					$sql = mysqli_query( $conexion,"SELECT * FROM faculty where name='$uppername' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$sql1 = mysqli_query( $conexion,"UPDATE `faculty` SET `yr`='$year' where name='$uppername' ");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
				else{

					$msg = "<font color=\"red\">Lo sentimos sujetos no registrados
</font>";
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
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="editSubject.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Editar Materia </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Seleccione el nombre de la materia y seleccione el curso a cambiar
				
				</th>
			<tr>
					<td class="info" colspan="3">
					
					<select name="sname" class="form-control">
						<option value="">SELECCIONE MATERIA</option>
						<?php 
							$sql = mysqli_query($conexion, "SELECT name FROM `faculty`");
							while($row = mysqli_fetch_array($sql)){
								$sname = $row["name"];
								echo "<option value='$sname'>$sname</option>";
							}
						?>
					</select>
						</td>
			</tr>
				<tr>

					<td class="info" colspan="3"> 	
						<select name="year" class="form-control">
					<option value="">-- SELECCIONAR CURSO PARA CAMBIAR--</option>
								
			<option value="Octavo">Octavo</option>
			<option value="Noveno">Noveno</option>
			<option value="Décimo">Décimo</option>
			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
			
						</select>
					</td>

				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Guardar Cambios">	
								
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