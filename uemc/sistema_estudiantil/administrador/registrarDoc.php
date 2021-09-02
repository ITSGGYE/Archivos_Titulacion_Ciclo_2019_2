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
$ids="";
$name="";
if((isset($_POST["id"])) && (isset($_POST["names"])) && (isset($_POST["dic"])) && (isset($_POST["sec"]))  && (isset($_POST["ub"])) && (isset($_POST["conv"])) && (isset($_POST["cel"]))  && (isset($_POST["em"])) && (isset($_POST["cor"])) && (isset($_POST["est"])) ){
	$id = $_POST["id"];
	$sname = $_POST["names"];
	$dic=$_POST["dic"];
	$sec = $_POST["sec"];
	$ub = $_POST["ub"];
	$conv = $_POST["conv"];
	$cel = $_POST["cel"];
	$em = $_POST["em"];
	$cor = $_POST["cor"];
	$est = $_POST["est"];
	
	if( $id==""&& $sname=="" && $dic=="" && $sec == "" && $ub == "" && $conv == "" && $cel == "" && $em == "" && $cor == ""  && $est == ""  ){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
	else{
	

		 
		$sql = mysqli_query($conexion,"SELECT nombreDoc , idDoc FROM docente WHERE NombreDoc='$sname' ");
		//retriving id to check
		while($row = mysqli_fetch_array($sql)){
				$name = $row["nombreDoc"];
				$ids = $row["idDoc"];
			}
		 if(($sname == $name) || ($id == $ids)){
			$msg = "<div align='center'> <font color='red'>Actualmente ya se encuentra registrado</font></div>";
			
		 }else{
		// echo "hi";
			//not yet registered so register new faculty with new id and password
			$insert = mysqli_query($conexion,"INSERT INTO docente (idDoc,nombreDoc,direccion,sector,barrioCiudadela,TelfCon,TelfCel,email,CorreoInst,estadoDoc) VALUES ('$id','$sname','$dic','$sec','$ub','$conv','$cel','$em','$cor','$est') ");
			if($insert){
				$msg = "<div align='center'> <font color='green'>Registrado satisfactoriamente</font></div>";
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
			<div><?php include("../menu_conexion/administradormenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="registrarDoc.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Registro de nuevos Docentes
 </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Llene los siguientes campos				
				</th>
			<tr>
					<td class="info" colspan="3">
					<input type="text" name="names" class="form-control" placeholder="Nombre del Docente" />
						</td>
			</tr>
            <tr>
					<td class="info" colspan="1">
					<input type="text" name="dic" class="form-control" placeholder="Dirección Domiciliaria" />
						</td>
                        <td class="info" colspan="1">
					<input type="text" name="sec" class="form-control" placeholder="Sector" />
						</td>
                        <td class="info" colspan="1">
					<input type="text" name="ub" class="form-control" placeholder="Barrio/Ciudadela" />
						</td>
			</tr>
            <tr>
					<td class="info" colspan="1">
					<input type="text" name="conv" class="form-control" placeholder="Telf. Convencional" />
						</td>
                        <td class="info" colspan="1">
					<input type="text" name="cel" class="form-control" placeholder="Telf.Celular" />
						</td>
                        <td class="info" colspan="1">
					<input type="email" name="em" class="form-control" placeholder="Email" />
						</td>
			</tr>
				<tr>
					<td class="info">	
						<input type="text" name="cor" class="form-control" placeholder="Correo institucional" />
					</td>
                    <td class="info">	
						<input type="text" name="id" class="form-control" placeholder="ID del Docente" />
					</td>
					<td class="info"> 	
						<select name="est" class="form-control">
					<option value="">--Estado del Docente--</option>
								
			<option value="Activo">Activo</option>
			<option value="Inactivo">Inactivo</option>
	
			
						</select> 
					</td>

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