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

    $servidor = "localhost";
    $nombreusuario = "root";
	$password = "mylan2020";
	$db_name = "proyect";

    $conexion = new mysqli($servidor, $nombreusuario, $password, $db_name);
$msg ="";
if((isset($_POST["rid"])) && (isset($_POST["year"])) && (isset($_POST["section"])) && (isset($_POST["names"])) && (isset($_POST["espe"])) ){
	$id = $_POST["rid"];
	$year = $_POST["year"];
	$section=$_POST["section"];
    $sname = $_POST["names"];
    $esp = $_POST["espe"];
	
	if($id=="" && $year=="" && $section == "" && $sname==""  && $esp==""){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
	else{
	
	//new registration to  1-1 
	if($year == "Octavo"){
					$sql = mysqli_query( $conexion,"SELECT * FROM s1 where id='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `s1` (`id`, `sem`, `detained`,`sec`,`sname`,`especializacion`) VALUES ('$id', 'Octavo', '0','$section','$sname','$esp')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
	//for transfer students
	else if($year == "Noveno"){
					$sql = mysqli_query($conexion, "SELECT * FROM s2 where id='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados
</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `s2` (`id`, `sem`, `detained`,`sec`,`sname`,`especializacion`) VALUES ('$id', 'Noveno', '0','$section','$sname','$esp')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
	//REGISTRATION FOR LATERAL ENTRY
	else if($year == "Décimo"){
					$sql = mysqli_query( $conexion, "SELECT * FROM s3 where id='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `s3` (`id`, `sem`, `detained`,`sec`,`sname`,`especializacion`) VALUES ('$id', 'Décimo', '0','$section','$sname','$esp')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
//TRANSFER STUDENTS II II
	else if($year == "Primero de Bachillerato"){
					$sql = mysqli_query( $conexion, "SELECT * FROM s4 where id='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `s4` (`id`, `sem`, `detained`,`sec`,`sname`,`especializacion`) VALUES ('$id', 'Primero de Bachillerato', '0','$section','$sname','$esp')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
	// III-I TRANSFER STUDENTS
	else if($year == "Segundo de Bachillerato"){
					$sql = mysqli_query( $conexion, "SELECT * FROM s5 where id='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `s5` (`id`, `sem`, `detained`,`sec`,`sname`,`especializacion`) VALUES ('$id', 'Segundo de Bachillerato', '0','$section','$sname','$esp')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
	
	//FOR TRANSFER STUDENTS III -II 
	else if($year == "Tercero de Bachillerato"){
					$sql = mysqli_query( $conexion, "SELECT * FROM s6 where id='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `s6` (`id`, `sem`, `detained`,`sec`,`sname`,`especializacion`) VALUES ('$id', 'Tercero de Bachillerato', '0','$section','$sname','$esp')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
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
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="student_register2.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Registro de nuevos estudiantes
 </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Registro				
				</th>
			<tr>
					<td class="info" colspan="3">
					<input type="text" name="names" class="form-control" placeholder="Nombre" />
						</td>
			</tr>
				<tr>
                <td class="info">	
						<input type="text" name="rid" class="form-control" placeholder="ID" />
					</td>

					<td class="info" > 	
						<select name="year" class="form-control">
					<option value="">--SELECCIONE UN CURSO--</option>
								
			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
			
						</select>
					</td>
					<td class="info"> 	
						<select name="section" class="form-control">
					<option value=""> -- Seccion--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
			
						</select>
					</td>

				</tr>
                <tr>
                <td class="info" colspan="3"> 	
						<select name="espe" class="form-control">
					<option value=""> -- Especializacion--</option>
					<option value="1">Informatica</option>
					<option value="2">Electónica</option>
					<option value="3">Electromecánica</option>
			
						</select>
					</td>
                </tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Registrar">	
								<p>Nota: para promover a los estudiantes<a href="promote.php">haga clic aquí</a></p>	
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