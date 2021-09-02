
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
if( (isset($_POST["year"])) && (isset($_POST["section"]))  ){
	
	$year = $_POST["year"];
	$section=$_POST["section"];
	
	
	if( $year=="" || $section == "" ){
					$msg = "<font color=\"red\">Todos los archivos son requeridos.</font>";

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
			<div class="hidden-print"><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="view_timetable2.php" name="regupdate">
			<table class="table table-bordered table-hover hidden-print" width="400px" >
			<caption align="center"><h3>Ver Horarios Académicos "Básica"  </h3></caption>
			<tbody>
				<th class="danger" colspan="8">Vista de Horarios		
				</th>
			</td>
			</tr>
				<tr>
				
					<td class="info" colspan="4"> 	
						<select name="year" class="form-control">
					<option value="">-- SELECCIONAR CURSO--</option>
								
			<option value="Octavo">Octavo</option>
			<option value="Noveno">Noveno</option>
			<option value="Décimo">Décimo</option>

			
						</select>
						
					</td>
					<td class="info" colspan="4"> 	
						<select name="section" class="form-control">
					<option value=""> -- Seccion--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
			
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
if( (isset($_POST["year"])) && (isset($_POST["section"]))  ){
	
	$year = $_POST["year"];
	$section=$_POST["section"];
	
	
	if( $year=="" || $section == "" ){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
	else{
		echo "<table class=\"table table-hover table-bordered\">
		<caption><h3><i>Horario de $year Sección $section</i></h3></caption>";
		echo '<form><input type="button" class="btn btn-success hidden-print" value="Imprimir" onClick="javascript:print()"/></form>
						<tr align="center">
                        <td class="danger">Day</td><td class="danger">HORA-1</td><td class="danger">HORA-2</td><td class="danger">HORA-3</td><td class="danger">HORA-4</td><td class="danger">HORA-5</td><td class="danger">HORA-6</td><td class="danger">HORA-7</td><td class="danger">HORA-8</td>
				</tr>';
			$qr1 = mysqli_query($conexion,"SELECT * FROM timetable2 WHERE year = '$year' AND sec = '$section' ");
			while($row = mysqli_fetch_array($qr1)){
				$day = $row["day"];
				$per1 = $row["per1"];
				$per2 = $row["per2"];
				$per3 = $row["per3"];
				$per4 = $row["per4"];
				$per5 = $row["per5"];
				$per6 = $row["per6"];
                $per7 = $row["per7"];
                $per8 = $row["per8"];
				
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