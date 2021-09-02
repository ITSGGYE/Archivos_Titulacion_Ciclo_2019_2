
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
$ids="";
$name="";
if((isset($_POST["fname"])) && (isset($_POST["fid"])) &&(isset($_POST["pass"])) ){
	$fnames = $_POST["fname"];
	$userid = $_POST["fid"];
	$deg =$_POST["desg"];
	$password = $_POST["pass"];
	//for faculty
	if($deg ==1){
	//retrive 
 	
	$sql = mysqli_query($conexion,"SELECT userId,fname FROM user WHERE did='1' and fname='$fnames' ");
	//retriving id to check
	while($row = mysqli_fetch_array($sql)){
			$ids = $row["userId"];
			$name = $row["fname"];
		}
	 if(($fnames == $name) || ($userid == $ids)){
		$msg = "<div align='center'> <font color='red'>Already registered</font></div>";
		
	 }else{
	// echo "hi";
		//not yet registered so register new faculty with new id and password
		$insert = mysqli_query($conexion,"INSERT INTO user (userId,fname,password,did) VALUES ('$userid','$fnames','$password','1') ");
		if($insert){
			$msg = "<div align='center'> <font color='green'>Success</font></div>";
		}
	}
	}
	else if($deg==2){
	//retrive 
 	
	$sql = mysqli_query($conexion,"SELECT userId,fname FROM user WHERE did='2' and fname='$fnames' ");
	//retriving id to check
	while($row = mysqli_fetch_array($sql)){
			$ids = $row["userId"];
			$name = $row["fname"];
		}
	 if(($fnames == $name) || ($userid == $ids)){
		$msg = "<div align='center'> <font color='red'>Already registered</font></div>";
		
	 }else{
	// echo "hi";
		//not yet registered so register new faculty with new id and password
		$insert = mysqli_query($conexion,"INSERT INTO user (userId,fname,password,did) VALUES ('$userid','$fnames','$password','2') ");
		if($insert){
			$msg = "<div align='center'> <font color='green'>Success</font></div>";
		}
	}
	}
	else if($deg==3){
		//retrive 
		 
		$sql = mysqli_query($conexion,"SELECT userId,fname FROM user WHERE did='3' and fname='$fnames' ");
		//retriving id to check
		while($row = mysqli_fetch_array($sql)){
				$ids = $row["userId"];
				$name = $row["fname"];
			}
		 if(($fnames == $name) || ($userid == $ids)){
			$msg = "<div align='center'> <font color='red'>Already registered</font></div>";
			
		 }else{
		// echo "hi";
			//not yet registered so register new faculty with new id and password
			$insert = mysqli_query($conexion,"INSERT INTO user (userId,fname,password,did) VALUES ('$userid','$fnames','$password','3') ");
			if($insert){
				$msg = "<div align='center'> <font color='green'>Success</font></div>";
			}
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
			<form method="post" action="fac_register.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Nuevo registro de usuarios</h3></caption>
			<tbody>
				<th class="danger" colspan="3">	Registro				
				</th>
			
				<tr>
					<td class="active" colspan="2">	
						<input type="text" name="fname" class="form-control" placeholder="Nombres completos del nuevo usuario" />
					</td>
						<td class="active" colspan="2">	
						<select name="desg" class="form-control">
						<option >--- Seleccionar rol ---</option>
			                 <option value="3">ALUMNO</option>
			                 <option value="2">ADMINISTRADOR</option>
			                 <option value="1">DOCENTE</option>

						</select>
					</td>
					
					
				</tr>

				<tr>
					<!-- Textbox for faculty signup -->
					<td class="active"><input type="text" name="fid" class="form-control" placeholder="Escriba el nuevo ID del Usuario" />	</td>
					<td class="active" colspan="2">	<input type="password" name="pass" class="form-control" placeholder="Crear Contraseña" /></td>
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