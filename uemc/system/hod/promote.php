
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
if((isset($_POST["from"])) && (isset($_POST["to"]))){
	$from = $_POST["from"];
	$to = $_POST["to"];
	//upgrade form 1-1 to 1-2
	if($from == "Octavo" && $to =="Noveno"){
					$sql = mysqli_query( $conexion, "SELECT * FROM s1 where detained != '1' ");
				if($sql){
					while($row = mysqli_fetch_array($sql)){
						$ids = $row["id"];
						$section = $row["sec"];
						$name = $row["sname"];
						$sql1 = mysqli_query( $conexion,"INSERT INTO `s2` (`sname`,`id`, `sem`, `detained`,`sec`) VALUES ('$name','$ids', 'Octavo', '0','$section')");
					
					}
					$drop=mysqli_query( $conexion, "DELETE FROM `s1` WHERE `detained` !='1'");
					if($drop){
						$msg = "<font color=\"green\">Promocionado exitosamente
<a href=\"viewpromoted.php?yr=I-II\">View Promoted List</a></font>";
					}
				}
				else{
					$msg = "<font color=\"red\">Lo siento no puede ser promovido</font>";
				}
	}
	//upgrade form 1-2 to 2-1
	else if($from == "Noveno" && $to =="Décimo"){
					$sql = mysqli_query( $conexion, "SELECT * FROM s2 where detained != '1' ");
				if($sql){
					while($row = mysqli_fetch_array($sql)){
						$ids = $row["id"];
						$section = $row["sec"];
						$name = $row["sname"];
						$sql1 = mysqli_query( $conexion,"INSERT INTO `s3` (`sname`,`id`, `sem`, `detained`,`sec`) VALUES ('$name','$ids', 'Noveno', '0','$section')");
					
					}
					$drop=mysqli_query( $conexion, "DELETE FROM `s2` WHERE `detained` !='1'");
					if($drop){
						$msg = "<font color=\"green\">Successfully Promoted<a href=\"viewpromoted.php?yr=II-I\">View Promoted List</a></font>";
					
					}
				}
				else{
					$msg = "<font color=\"red\">Lo siento no puede ser promovido</font>";
				}
	}
}



?>

<?php
$msg1="";
//Clearing the records of passout students
if(isset($_POST["clearAll"])){
				$drop=mysqli_query( $conexion, "DELETE FROM `s3` WHERE `detained` !='1'");
				if($drop){
					$msg1 = "<font color=\"green\">Exitosamente borrado</font>";
				}
				else{
					$msg1 = "<font color=\"red\">Lo siento no se puede borrar</font>";
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
			<form method="post" action="promote.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Promover estudiantes </h3></caption>
			<tbody>
				<th class="danger">Promover desde			
				</th>
				<th class="danger">
					Promover a

				</th>
				<tr>
					<td class="active">	
						<select name="from" class="form-control">
					<option>-- De --</option>
			<option value="Octavo">Octavo</option>
			<option value="Noveno">Noveno</option>
						</select>
					</td>
					<td class="info"> 	
						<select name="to" class="form-control">
					<option>-- A --</option>
			<option value="Noveno">Noveno</option>
			<option value="Décimo">Décimo</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Promover">	
								<p>Nota: detener a los estudiantes <a href="detain.php">haga clic aquí</a></p>	
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
			<form method="post" action="promote.php">
			<table class="table table-bordered table-hover">
			<caption><h3>Borrar detalles del estudiante de paso</h3></caption>
			<tbody>
							<th class="danger" colspan="2">
							Limpiar 4-2 Lista para Passout
				</th>
				<tr>
					<td colspan="2" align="center" class="success">
						<input type="checkbox" name="clearAll">Limpiar Todo</input>
					</td>
				</tr>
				
				<tr>
					<td colspan="2" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Limpiar">	
								
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="success">
						<?php echo $msg1; ?>
					</td>
				</tr>
			</tbody>
			</table>
			</form>
		 </div>
		</div>
	</body>
</html>