
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
	
	  //checking whether student is present in the database or not according to year wise
  if($year == "Octavo"){
	//CHECKING IN FIRST YEAR FIRST SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($conexion, "SELECT * FROM s1 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($conexion,"UPDATE s1 SET detained = '1' WHERE id = '$id' ");
		if($det){
				$msg = "<font color=\"green\">Suspendido con exito</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo Sentimos, no se pudo suspender al alumno</font>";
	}
  }
// NOW CHECKING 1-2 
  else if($year == "Noveno"){
	//CHECKING IN FIRST YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM s2 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query( $conexion, "UPDATE s2 SET detained = '1' WHERE id = '$id' ");
		if($det){
			$msg = "<font color=\"green\">Suspendido con exito</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo Sentimos, no se pudo suspender al alumno</font>";
	}
  }
// NOW CHECKING 2-1 
  else if($year == "Décimo"){
	//CHECKING IN SECOND YEAR FIRST SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query( $conexion, "SELECT * FROM s3 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query( $conexion, "UPDATE s3 SET detained = '1' WHERE id = '$id' ");
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
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="detain.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Suspender estudiantes </h3></caption>
			<tbody>
					<th class="danger" colspan="2">Detener				
				</th>
				<tr>
					<td class="active">	
						<input type="text" class="form-control" placeholder="REG ID" name="detainId"/>
						</select>
					</td>
					<td class="active"> 	
						<select name="year" class="form-control">
					
					<option>-- SELECCIONAR CURSO--</option>
					<option value="Octavo">Octavo</option>
			        <option value="Noveno">Noveno</option>
			        <option value="Décimo">Décimo</option>

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