
<?php
session_start();
include ("../menu_conexion/conectar.php");
     if(!isset($_SESSION["tipo_usuario"])){
       header("location:../inicio.php");
     }
	 else{
	
	   $check_did = $_SESSION["tipo_usuario"];
		if($check_did !=1){
			 header("location:../inicio.php");
		}
	}
$msg ="";
if( (isset($_POST["year"])) && (isset($_POST["section"]))  && (isset($_POST["espe"]))  ){
	
	$year = $_POST["year"];
	$section=$_POST["section"];
	$especialization=$_POST["espe"];
	
	
	if( $year=="" || $section == ""  || $especialization == "" ){
					$msg = "<font color=\"red\">Todos los campos son requeridos.</font>";

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
			<div class="hidden-print"><?php include("../menu_conexion/docentemenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="verHorarios.php" name="regupdate">
			<table class="table table-bordered table-hover hidden-print" width="400px" >
			<caption align="center"><h3>Ver Horarios Académicos</h3></caption>
			<tbody>
				<th class="danger" colspan="8">Vista de Horarios			
				</th>
			</td>
			</tr>
				<tr>
				
					<td class="info" colspan="2"> 	
						<select name="year" class="form-control">
					<option value="">-- SELECCIONAR CURSO--</option>
				
            <option value="Octavo">Octavo</option>
            <option value="Noveno">Noveno</option>
			<option value="Décimo">Décimo</option>
			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
			
						</select>
						
					</td>
					<td class="info" colspan="2"> 	
						<select name="section" class="form-control">
					<option value=""> -- SECCIÓN--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
			
						</select>
						
					</td>
                    </tr>			
                    <tr>
					<td class="info" colspan="6"> 	
						<select name="espe" class="form-control">
					<option value="">ESPECIALIZACIÓN</option>
                                <option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>
			
						</select>
						
					</td>
				</tr>			
				<tr>
					<td colspan="8" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Ver">	
					</td>
				</tr>
				<tr>
					<td colspan="8" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		 <?php
if( (isset($_POST["year"])) && (isset($_POST["section"]))  && (isset($_POST["espe"])) ){
	
	$year = $_POST["year"];
	$section=$_POST["section"];
	$especialization=$_POST["espe"];
	
	if( $year=="" || $section == "" || $especialization == ""  ){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
	else{
		echo "<table class=\"table table-hover table-bordered\">
		<caption><h3><i>Horario de $year Sección $section Especialización $especialization</i></h3></caption>";
		echo '<form><input type="button" class="btn btn-success hidden-print" value="Imprimir" onClick="javascript:print()"/></form>
						<tr align="center">
					<td class="danger">Día</td><td class="danger">HORA-1</td><td class="danger">HORA-2</td><td class="danger">HORA-3</td><td class="danger">HORA-4</td><td class="danger">HORA-5</td><td class="danger">HORA-6</td><td class="danger">HORA-7</td><td class="danger">HORA-8</td>
				</tr>';
			$qr1 = mysqli_query($conexion,"SELECT * FROM horarios WHERE año = '$year' AND seccion = '$section' AND cicloEspecializacion = '$especialization' ");
			while($row = mysqli_fetch_array($qr1)){
				$day = $row["dia"];
				$per1 = $row["hora1"];
				$per2 = $row["hora2"];
				$per3 = $row["hora3"];
				$per4 = $row["hora4"];
				$per5 = $row["hora5"];
				$per6 = $row["hora6"];
				$per7 = $row["hora7"];
				$per8 = $row["hora8"];
				
				echo "
				<tr align='center'>
					<td class='info'>$day</td>
					<td class='info'>$per1</td><td class='info'>$per2</td><td class='info'>$per3</td><td class='info'>$per4</td>
					<td class='info'>$per5</td><td class='info'>$per6</td><td class='info'>$per7</td><td class='info'>$per8</td>
				</tr>				
				";
				
			}
		
		echo '</table>';
	// end of not null
	}
}?>
		</div>
	</body>
</html>