
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
if((isset($_POST["detainId"])) && (isset($_POST["year"]))){
	$id = $_POST["detainId"];
	$year = $_POST["year"];
	
	
 // NOW CHECKING 2-2 
if($year == "Primero de Bachillerato"){
	//CHECKING IN SECOND YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM s4 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query( $conexion, "UPDATE s4 SET detained = '0' WHERE id = '$id' AND detained = '1' ");
		if($det){
			$msg = "<font color=\"green\">Exitosamente</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
  // NOW CHECKING 3-1 
  else if($year == "Segundo de Bachillerato"){
	//CHECKING IN THIRD YEAR FIRST SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion,"SELECT * FROM s5 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query( $conexion,"UPDATE s5 SET detained = '0' WHERE id = '$id' AND detained = '1'");
		if($det){
			$msg = "<font color=\"green\">Exitosamente</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
   // NOW CHECKING 3-2 
  else if($year == "Tercero de Bachillerato"){
	//CHECKING IN THIRD YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM s6 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query( $conexion, "UPDATE s6 SET detained = '0' WHERE id = '$id' AND detained = '1' ");
		if($det){
			$msg = "<font color=\"green\">Exitosamente</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
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
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="undetain2.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Deshacer estudiantes </h3></caption>
			<tbody>
					<th class="danger" colspan="2">Eliminar Suspensión				
				</th>
				<tr>
					<td class="active">	
						<input type="text" class="form-control" placeholder="REG ID" name="detainId"/>
						</select>
					</td>
					<td class="active"> 	
						<select name="year" class="form-control">
					
					<option>-- SELECCIONAR CURSO --</option>
			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Recuperar">	
								<p>Nota: Para promover a los estudiantes<a href="promote.php">haga clic aquí</a></p>	
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