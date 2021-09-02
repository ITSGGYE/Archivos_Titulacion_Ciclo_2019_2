
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
if((isset($_POST["detainId"])) && (isset($_POST["Id"])) && (isset($_POST["year"])) && (isset($_POST["section"])) && (isset($_POST["espe"])) ){
	$us = $_POST["detainId"];
	$id = $_POST["Id"];
	$year = $_POST["year"];
	$sec = $_POST["section"];
	$e = $_POST["espe"];
	
	
 // NOW CHECKING 2-2 
 if($year == "Octavo"){
	//CHECKING IN SECOND YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE idEst ='$us' AND nombreEst = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($conexion, "UPDATE estudiantes SET Estado = 'Activo' WHERE idEst ='$id' ");
		if($det){
			$msg = "<font color=\"green\">Suspendido con exito</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo Sentimos, no se pudo suspender al alumno</font>";
	}
  }

 else if($year == "Noveno"){
	//CHECKING IN SECOND YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE idEst ='$us' AND nombreEst = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($conexion, "UPDATE estudiantes SET Estado = 'Activo' WHERE idEst ='$id' ");
		if($det){
			$msg = "<font color=\"green\">Suspendido con exito</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo Sentimos, no se pudo suspender al alumno</font>";
	}
  }

 else if($year == "Décimo"){
	//CHECKING IN SECOND YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE idEst ='$us' AND nombreEst = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($conexion, "UPDATE estudiantes SET Estado = 'Activo' WHERE idEst ='$id' ");
		if($det){
			$msg = "<font color=\"green\">Suspendido con exito</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo Sentimos, no se pudo suspender al alumno</font>";
	}
  } 

 else if($year == "Primero de Bachillerato"){
	//CHECKING IN SECOND YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE idEst ='$us' AND nombreEst = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($conexion, "UPDATE estudiantes SET Estado = 'Activo' WHERE idEst ='$id' ");
		if($det){
			$msg = "<font color=\"green\">Suspendido con exito</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo Sentimos, no se pudo suspender al alumno</font>";
	}
  }
  // NOW CHECKING 3-1 
  else if($year == "Segundo de Bachillerato"){
	//CHECKING IN THIRD YEAR FIRST SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE idEst ='$us' AND nombreEst = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($conexion, "UPDATE estudiantes SET Estado = 'Activo' WHERE idEst ='$id' ");
		if($det){
			$msg = "<font color=\"green\">Suspendido con exito</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo Sentimos, no se pudo suspender al alumno</font>";
	}
  }
   // NOW CHECKING 3-2 
  else if($year == "Tercero de Bachillerato"){
	//CHECKING IN THIRD YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM estudiante WHERE idEst ='$us' AND nombreEst = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($conexion, "UPDATE estudiante SET Estado = 'Activo' WHERE idEst ='$id' ");
		if($det){
			$msg = "<font color=\"green\">Suspendido con exito</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo Sentimos, no se pudo suspender al alumno</font>";
	}
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
			<form method="post" action="habilitarEs.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Suspender estudiantes </h3></caption>
			<tbody>
					<th class="danger" colspan="2">Detener				
				</th>
				<tr>

				<td class="active">	
						<input type="text" class="form-control" placeholder="Ingrese el Id" name="Id"/>
						</select>
				</td>

				<td class="active" colspan="2">	
					<select id="roles" class="form-control" name="detainId">
                    <option >--- Seleccionar ---</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `nombreEst` FROM `estudiantes`  GROUP BY `nombreEst` ORDER BY `nombreEst`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["nombreEst"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
					</select>
					</td>

					<tr>

					<td class="active"> 	
						<select name="year" class="form-control">
					
					<option>-- SELECCIONAR CURSO--</option>

					<option value="Octavo">Octavo</option>
					<option value="Noveno">Noveno</option>
					<option value="Décimo">Décimo</option>
			        <option value="Primero de Bachillerato">Primero de Bachillerato</option>
			        <option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			          <option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
						</select>
					</td>

                      <td class="active" colspan="2">	
                      <select id="roles" class="form-control" name="section">
  					<option value=""> -- Sección--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
                      </select>
                      </td>
                      </tr>

					  <td class="info" colspan="3"> 	
						<select name="espe" class="form-control">
						<option value="">-- SELECIONE EL CICLO O ESPECIALIDAD--</option>
								
								<option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>
			
						</select>
						
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Suspender">	
								<p>Nota: Para promover a los estudiantes <a href="promote.php">haga clic aquí</a></p>	
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