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
if((isset($_POST["rid"])) && (isset($_POST["names"])) && (isset($_POST["namesrep"])) && (isset($_POST["fn"])) &&
(isset($_POST["edad"])) && (isset($_POST["em"])) && (isset($_POST["year"])) && (isset($_POST["section"]))  && (isset($_POST["espe"])) ){
	$id = $_POST["rid"];
	$sname = $_POST["names"];
    $repre = $_POST["namesrep"];
    $fechna = $_POST["fn"];
    $ed = $_POST["edad"];
    $corr = $_POST["em"];	
	$year = $_POST["year"];
	$section=$_POST["section"];
    $esp = $_POST["espe"];
	
	if($id=="" && $sname=="" && $repre== "" && $fechna==""  && $ed=="" && $corr=="" && $year== "" && $section==""  && $esp==""){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
	else{
	
	//new registration to  1-1 
	if($year == "Octavo"){
					$sql = mysqli_query( $conexion,"SELECT * FROM estudiantes where idEst='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `estudiantes` (`idEst`, `nombreEst`, `repEst`,`fechaNacimiento`,`edad`,`correo`,`curso`,`seccion`,`cicloEsp`,`Estado`) VALUES ('$id','$sname','$repre','$fechna','$ed','$corr', 'Octavo','$section','$esp','Activo')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
	//for transfer students
	else if($year == "Noveno"){
					$sql = mysqli_query( $conexion,"SELECT * FROM estudiantes where idEst='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados
</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `estudiantes` (`idEst`, `nombreEst`, `repEst`,`fechaNacimiento`,`edad`,`correo`,`curso`,`seccion`,`cicloEsp`,`Estado`) VALUES ('$id','$sname','$repre','$fechna','$ed','$corr', 'Noveno','$section','$esp','Activo')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
	//REGISTRATION FOR LATERAL ENTRY
	else if($year == "Décimo"){
					$sql = mysqli_query( $conexion,"SELECT * FROM estudiantes where idEst='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `estudiantes` (`idEst`, `nombreEst`, `repEst`,`fechaNacimiento`,`edad`,`correo`,`curso`,`seccion`,`cicloEsp`,`Estado`) VALUES ('$id','$sname','$repre','$fechna','$ed','$corr', 'Décimo','$section','$esp','Activo')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
//TRANSFER STUDENTS II II
	else if($year == "Primero de Bachillerato"){
					$sql = mysqli_query( $conexion,"SELECT * FROM estudiantes where idEst='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `estudiantes` (`idEst`, `nombreEst`, `repEst`,`fechaNacimiento`,`edad`,`correo`,`curso`,`seccion`,`cicloEsp`,`Estado`) VALUES ('$id','$sname','$repre','$fechna','$ed','$corr', 'Primero de Bachillerato','$section','$esp','Activo')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
	// III-I TRANSFER STUDENTS
	else if($year == "Segundo de Bachillerato"){
					$sql = mysqli_query( $conexion,"SELECT * FROM estudiantes where idEst='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `estudiantes` (`idEst`, `nombreEst`, `repEst`,`fechaNacimiento`,`edad`,`correo`,`curso`,`seccion`,`cicloEsp`,`Estado`) VALUES ('$id','$sname','$repre','$fechna','$ed','$corr', 'Segundo de Bachillerato','$section','$esp','Activo')");
					if($sql1){
						$msg = "<font color=\"green\">Registrado exitosamente</font>";
					}
					
				}
	}
	
	//FOR TRANSFER STUDENTS III -II 
	else if($year == "Tercero de Bachillerato"){
					$sql = mysqli_query( $conexion,"SELECT * FROM estudiantes where idEst='$id' ");
					$count = mysqli_num_rows($sql);
				if($count){
					$msg = "<font color=\"red\">Lo sentimos Estudiantes ya registrados</font>";
				}
				else{
					$sql1 = mysqli_query( $conexion, "INSERT INTO `estudiantes` (`idEst`, `nombreEst`, `repEst`,`fechaNacimiento`,`edad`,`correo`,`curso`,`seccion`,`cicloEsp`,`Estado`) VALUES ('$id','$sname','$repre','$fechna','$ed','$corr', 'Tercero de Bachillerato','$section','$esp','Activo')");
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
			<div><?php include("../menu_conexion/administradormenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="registrarEst.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Registro de nuevos estudiantes
 </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Registro				
				</th>
			<tr>

					<td class="info">	
					<input type="text" name="rid" class="form-control" placeholder="Id del estudiante" />
					</td>

					<td class="info" >
					<input type="text" name="names" class="form-control" placeholder="Nombre del estudiante" />
					</td>

					<td class="info" >
					<input type="text" name="namesrep" class="form-control" placeholder="Nombre del representante" />
					</td>
			</tr>

			<tr>

					<td class="info">	
					<input type="date" name="fn" class="form-control" placeholder="Fecha de Nacimiento" />
					</td>

					<td class="info" >
					<input type="text" name="edad" class="form-control" placeholder="edad" />
					</td>

					<td class="info" >
					<input type="email" name="em" class="form-control" placeholder="correo" />
					</td>
			</tr>
				<tr>


					<td class="info" > 	
						<select name="year" class="form-control">
					<option value="">--SELECCIONE UN CURSO--</option>
								
					            <option value="Octavo">Octavo</option>
								<option value="Noveno">Noveno</option>
								<option value="Décimo">Décimo</option>
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

					<td class="info" colspan="3"> 	
						<select name="espe" class="form-control">
					<option value=""> -- Especializacion--</option>
					            <option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>
			
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