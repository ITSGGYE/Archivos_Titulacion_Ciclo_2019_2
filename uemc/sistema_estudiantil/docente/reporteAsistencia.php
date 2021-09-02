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
			<div align="center" class="promote hidden-print">
			<form method="post" action="reporteAsistencia.php">			
			<table class="table table-bordered table-hover">
				<caption>Ver Asistencia Estudiantil</caption>
				<tbody>
					<th class="danger" colspan="6">Asistencia del estudiante</th>
					<tr>
						<td class="active" colspan="4" >
								ASISTENCIA DESDE:<input type ="date" name="dateFrom" class="form-control"/>
						</td>
													<td class="active"  >
							ASISTENCIA A:<input type="date" name="dateTo" class="form-control"/>
							
						</td>

					
					</tr>
					<tr>
						<td class="active" colspan="6">
								<select name="sem" class="form-control">
			<option value="">Curso</option>
		                    	<option value="Octavo">Octavo</option>
								<option value="Noveno">Noveno</option>
								<option value="Décimo">Décimo</option>
								<option value="Primero de Bachillerato">Primero de Bachillerato</option>
								<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
								<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
					
		 </select>
						</td>
					</tr>

					<tr>
				
				<td class="active" colspan="3"> 	
					<select name="section" class="form-control">				
					<option value=""> -- Sección--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
		
					</select>
					
				</td>
				<td class="active" colspan="3"> 	
					<select name="espe" class="form-control">
					<option value="">-- SELECIONE EL CICLO O ESPECIALIDAD--</option>
							
							<option value="Básica">Básica</option>
							<option value="Bachillerato en Informática">Bachillerato en Informática</option>
							<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
							<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>
		
					</select>
					
				</td>
				</tr>
	
					<td class="active" align="center" colspan="6">
						<input type="submit" name="submit" class="btn btn-success" value="Consultar"/>
					</td>
					</tr>
				</tbody>
			</table>
			</form>
			
			</div>
	<?php
	$msg="";
	$id="";
	$sec="";
	$sub="";
		if((isset($_POST["sem"]))  && (isset($_POST["dateFrom"])) && (isset($_POST["dateTo"])) && (isset($_POST["section"])) && (isset($_POST["espe"])) ){
            $sem = $_POST["sem"];
			$from = $_POST["dateFrom"];
			 $to = $_POST["dateTo"];
			 $sec = $_POST["section"];
			 $esp = $_POST["espe"];
			 $final = $_POST["dateTo"];
	

			//checking whether all values are posted properly or not
			if($sem==""  || $from=="" || $to=""  || $sec=="" || $esp==""  ){
				//alert if there is null value i.e some field is not selected properly
				$msg = "<div align='center'><font color='red'>Seleccione todas las opciones apropiadamente
</font></div>";
			}
		  else{


			if($sem =="Octavo"){
				$sql = mysqli_query($conexion, "SELECT nombreMat FROM materias WHERE cursoMateria='Octavo'  ");
				echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
				<caption><b>REPORTE DE ASISTENCIA  DE $sem CORRESPONDIENTE AL $from A $final </b></caption>
				<th class='danger'><b>ID</th><th class='danger'>CURSO</font></th><th class='danger'>ESPECIALIZACIÓN</font></th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
				while($row = mysqli_fetch_array($sql)){
					$sub=$row["nombreMat"];
					//subject showing
					echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				}
				//echo "$from : $final";
				echo "<th class='danger'><b>Clase total</b></th>";
				echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
				echo "<tr>";
				$sql1 = mysqli_query($conexion,"SELECT distinct(idAsis) as idAsis,curso,nombre,seccion,asistEsp FROM asistencia order by idAsis asc ");
				while($row = mysqli_fetch_array($sql1)){
						$ids=$row["idAsis"];
						$sem= $row["curso"];
						$sec = $row["seccion"];
						$especializacion =$row["asistEsp"];
						$nom = $row["nombre"];
						//displaying ids and section 
						echo "<td class='active'>$ids</td><td class='active'>$sem</td><td class='active'>$especializacion</td><td class='active'>$sec</td><td class='active'>$nom</td>";
						$sql11 = mysqli_query( $conexion,"SELECT  nombreMat  FROM materias WHERE CursoMateria='Primero de Bachillerato' ");
						while($row = mysqli_fetch_array($sql11) ){
					
						$sub = $row["nombreMat"];
						
						//counting total number of days based on registered id i.e total of all subjects
				$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE  atten='0' and `idAsis`='$ids' and dia between '$from' and '$final' ");
						if($rows = mysqli_fetch_array($sql31)){
							//retriving number of absent days 
								$totalall2 = $rows["LOSS"];
						}
					
							
						//counting total number of days based on registered id i.e total of all subjects
			$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$ids' and atten = '1' and dia between '$from' and '$final' ");
						if($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$totalall1 = $rows["LOSS"];
						}
					
						//counting toal days for particular registered id
						 $totalall = $totalall1+$totalall2;
						
						//counting the total number of present days subject wise
$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `asistencia` WHERE (`idAsis`='$ids' and `materia` = '$sub' and atten = '1' and dia between '$from' and '$final') ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							 $total1 = $rows["ATTEN"];
							echo "<td class='active'>$total1</td>";
						}
						if($totalall!=0){
							$per = round((($totalall1/$totalall)*100),2);
						}
						else{
							$per = 0;
						}
					
						

					}
					echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
				}
				echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";

			}
				// end of IF AND STARTING OF III-I
			//indicates everything is posted properly so begin the task
			else if($sem =="Noveno"){
				$sql = mysqli_query($conexion, "SELECT nombreMat FROM materias WHERE cursoMateria='Noveno'  ");
				echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
				<caption><b>REPORTE DE ASISTENCIA  DE $sem CORRESPONDIENTE AL $from A $final </b></caption>
				<th class='danger'><b>ID</th><th class='danger'>CURSO</font></th><th class='danger'>ESPECIALIZACIÓN</font></th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
				while($row = mysqli_fetch_array($sql)){
					$sub=$row["nombreMat"];
					//subject showing
					echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				}
				//echo "$from : $final";
				echo "<th class='danger'><b>Clase total</b></th>";
				echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
				echo "<tr>";
				$sql1 = mysqli_query($conexion,"SELECT distinct(idAsis) as idAsis,curso,nombre,seccion,asistEsp FROM asistencia order by idAsis asc ");
				while($row = mysqli_fetch_array($sql1)){
						$ids=$row["idAsis"];
						$sem= $row["curso"];
						$sec = $row["seccion"];
						$especializacion =$row["asistEsp"];
						$nom = $row["nombre"];
						//displaying ids and section 
						echo "<td class='active'>$ids</td><td class='active'>$sem</td><td class='active'>$especializacion</td><td class='active'>$sec</td><td class='active'>$nom</td>";
						$sql11 = mysqli_query( $conexion,"SELECT  nombreMat  FROM materias WHERE CursoMateria='Primero de Bachillerato' ");
						while($row = mysqli_fetch_array($sql11) ){
					
						$sub = $row["nombreMat"];
						
						//counting total number of days based on registered id i.e total of all subjects
				$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE  atten='0' and `idAsis`='$ids' and dia between '$from' and '$final' ");
						if($rows = mysqli_fetch_array($sql31)){
							//retriving number of absent days 
								$totalall2 = $rows["LOSS"];
						}
					
							
						//counting total number of days based on registered id i.e total of all subjects
			$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$ids' and atten = '1' and dia between '$from' and '$final' ");
						if($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$totalall1 = $rows["LOSS"];
						}
					
						//counting toal days for particular registered id
						 $totalall = $totalall1+$totalall2;
						
						//counting the total number of present days subject wise
$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `asistencia` WHERE (`idAsis`='$ids' and `materia` = '$sub' and atten = '1' and dia between '$from' and '$final') ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							 $total1 = $rows["ATTEN"];
							echo "<td class='active'>$total1</td>";
						}
						if($totalall!=0){
							$per = round((($totalall1/$totalall)*100),2);
						}
						else{
							$per = 0;
						}
					
						

					}
					echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
				}
				echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";

			}			
			
			// end of IF STARTING III-II
						//indicates everything is posted properly so begin the task
						else if($sem =="Décimo"){
							$sql = mysqli_query($conexion, "SELECT nombreMat FROM materias WHERE cursoMateria='Décimo'  ");
							echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
							<caption><b>REPORTE DE ASISTENCIA  DE $sem CORRESPONDIENTE AL $from A $final </b></caption>
							<th class='danger'><b>ID</th><th class='danger'>CURSO</font></th><th class='danger'>ESPECIALIZACIÓN</font></th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
							while($row = mysqli_fetch_array($sql)){
								$sub=$row["nombreMat"];
								//subject showing
								echo "<th class='danger'><b>$sub&nbsp;<b></th>";
							}
							//echo "$from : $final";
							echo "<th class='danger'><b>Clase total</b></th>";
							echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
							echo "<tr>";
							$sql1 = mysqli_query($conexion,"SELECT distinct(idAsis) as idAsis,curso,nombre,seccion,asistEsp FROM asistencia order by idAsis asc ");
							while($row = mysqli_fetch_array($sql1)){
									$ids=$row["idAsis"];
									$sem= $row["curso"];
									$sec = $row["seccion"];
									$especializacion =$row["asistEsp"];
									$nom = $row["nombre"];
									//displaying ids and section 
									echo "<td class='active'>$ids</td><td class='active'>$sem</td><td class='active'>$especializacion</td><td class='active'>$sec</td><td class='active'>$nom</td>";
									$sql11 = mysqli_query( $conexion,"SELECT  nombreMat  FROM materias WHERE CursoMateria='Primero de Bachillerato' ");
									while($row = mysqli_fetch_array($sql11) ){
								
									$sub = $row["nombreMat"];
									
									//counting total number of days based on registered id i.e total of all subjects
							$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE  atten='0' and `idAsis`='$ids' and dia between '$from' and '$final' ");
									if($rows = mysqli_fetch_array($sql31)){
										//retriving number of absent days 
											$totalall2 = $rows["LOSS"];
									}
								
										
									//counting total number of days based on registered id i.e total of all subjects
						$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$ids' and atten = '1' and dia between '$from' and '$final' ");
									if($rows = mysqli_fetch_array($sql3)){
										//retriving number of absent days 
										$totalall1 = $rows["LOSS"];
									}
								
									//counting toal days for particular registered id
									 $totalall = $totalall1+$totalall2;
									
									//counting the total number of present days subject wise
			$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `asistencia` WHERE (`idAsis`='$ids' and `materia` = '$sub' and atten = '1' and dia between '$from' and '$final') ");
									while($rows = mysqli_fetch_array($sql2)){
										//retriving number of present days 
										 $total1 = $rows["ATTEN"];
										echo "<td class='active'>$total1</td>";
									}
									if($totalall!=0){
										$per = round((($totalall1/$totalall)*100),2);
									}
									else{
										$per = 0;
									}
								
									
			
								}
								echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
							}
							echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";
			
						}
			
			//indicates everything is posted properly so begin the task
			if($sem =="Primero de Bachillerato"){
				$sql = mysqli_query($conexion, "SELECT nombreMat FROM materias WHERE cursoMateria='Primero de Bachillerato'  ");
				echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
				<caption><b>REPORTE DE ASISTENCIA  DE $sem CORRESPONDIENTE AL $from A $final </b></caption>
				<th class='danger'><b>ID</th><th class='danger'>CURSO</font></th><th class='danger'>ESPECIALIZACIÓN</font></th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
				while($row = mysqli_fetch_array($sql)){
					$sub=$row["nombreMat"];
					//subject showing
					echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				}
				//echo "$from : $final";
				echo "<th class='danger'><b>Clase total</b></th>";
				echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
				echo "<tr>";
				$sql1 = mysqli_query($conexion,"SELECT distinct(idAsis) as idAsis,curso,nombre,seccion,asistEsp FROM asistencia order by idAsis asc ");
				while($row = mysqli_fetch_array($sql1)){
						$ids=$row["idAsis"];
						$sem= $row["curso"];
						$sec = $row["seccion"];
						$especializacion =$row["asistEsp"];
						$nom = $row["nombre"];
						//displaying ids and section 
						echo "<td class='active'>$ids</td><td class='active'>$sem</td><td class='active'>$especializacion</td><td class='active'>$sec</td><td class='active'>$nom</td>";
						$sql11 = mysqli_query( $conexion,"SELECT  nombreMat  FROM materias WHERE CursoMateria='Primero de Bachillerato' ");
						while($row = mysqli_fetch_array($sql11) ){
					
						$sub = $row["nombreMat"];
						
						//counting total number of days based on registered id i.e total of all subjects
				$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE  atten='0' and `idAsis`='$ids' and dia between '$from' and '$final' ");
						if($rows = mysqli_fetch_array($sql31)){
							//retriving number of absent days 
								$totalall2 = $rows["LOSS"];
						}
					
							
						//counting total number of days based on registered id i.e total of all subjects
			$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$ids' and atten = '1' and dia between '$from' and '$final' ");
						if($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$totalall1 = $rows["LOSS"];
						}
					
						//counting toal days for particular registered id
						 $totalall = $totalall1+$totalall2;
						
						//counting the total number of present days subject wise
$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `asistencia` WHERE (`idAsis`='$ids' and `materia` = '$sub' and atten = '1' and dia between '$from' and '$final') ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							 $total1 = $rows["ATTEN"];
							echo "<td class='active'>$total1</td>";
						}
						if($totalall!=0){
							$per = round((($totalall1/$totalall)*100),2);
						}
						else{
							$per = 0;
						}
					
						

					}
					echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
				}
				echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";

			}
				// end of IF AND STARTING OF III-I
			//indicates everything is posted properly so begin the task
			else if($sem =="Segundo de Bachillerato"){
				$sql = mysqli_query($conexion, "SELECT nombreMat FROM materias WHERE cursoMateria='Segundo de Bachillerato'  ");
				echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
				<caption><b>REPORTE DE ASISTENCIA  DE $sem CORRESPONDIENTE AL $from A $final </b></caption>
				<th class='danger'><b>ID</th><th class='danger'>CURSO</font></th><th class='danger'>ESPECIALIZACIÓN</font></th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
				while($row = mysqli_fetch_array($sql)){
					$sub=$row["nombreMat"];
					//subject showing
					echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				}
				//echo "$from : $final";
				echo "<th class='danger'><b>Clase total</b></th>";
				echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
				echo "<tr>";
				$sql1 = mysqli_query($conexion,"SELECT distinct(idAsis) as idAsis,curso,nombre,seccion,asistEsp FROM asistencia order by idAsis asc ");
				while($row = mysqli_fetch_array($sql1)){
						$ids=$row["idAsis"];
						$sem= $row["curso"];
						$sec = $row["seccion"];
						$especializacion =$row["asistEsp"];
						$nom = $row["nombre"];
						//displaying ids and section 
						echo "<td class='active'>$ids</td><td class='active'>$sem</td><td class='active'>$especializacion</td><td class='active'>$sec</td><td class='active'>$nom</td>";
						$sql11 = mysqli_query( $conexion,"SELECT  nombreMat  FROM materias WHERE CursoMateria='Primero de Bachillerato' ");
						while($row = mysqli_fetch_array($sql11) ){
					
						$sub = $row["nombreMat"];
						
						//counting total number of days based on registered id i.e total of all subjects
				$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE  atten='0' and `idAsis`='$ids' and dia between '$from' and '$final' ");
						if($rows = mysqli_fetch_array($sql31)){
							//retriving number of absent days 
								$totalall2 = $rows["LOSS"];
						}
					
							
						//counting total number of days based on registered id i.e total of all subjects
			$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$ids' and atten = '1' and dia between '$from' and '$final' ");
						if($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$totalall1 = $rows["LOSS"];
						}
					
						//counting toal days for particular registered id
						 $totalall = $totalall1+$totalall2;
						
						//counting the total number of present days subject wise
$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `asistencia` WHERE (`idAsis`='$ids' and `materia` = '$sub' and atten = '1' and dia between '$from' and '$final') ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							 $total1 = $rows["ATTEN"];
							echo "<td class='active'>$total1</td>";
						}
						if($totalall!=0){
							$per = round((($totalall1/$totalall)*100),2);
						}
						else{
							$per = 0;
						}
					
						

					}
					echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
				}
				echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";

			}			
			
			// end of IF STARTING III-II
						//indicates everything is posted properly so begin the task
						else if($sem =="Tercero de Bachillerato"){
							$sql = mysqli_query($conexion, "SELECT nombreMat FROM materias WHERE cursoMateria='Tercero de Bachillerato'  ");
							echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
							<caption><b>REPORTE DE ASISTENCIA  DE $sem CORRESPONDIENTE AL $from A $final </b></caption>
							<th class='danger'><b>ID</th><th class='danger'>CURSO</font></th><th class='danger'>ESPECIALIZACIÓN</font></th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
							while($row = mysqli_fetch_array($sql)){
								$sub=$row["nombreMat"];
								//subject showing
								echo "<th class='danger'><b>$sub&nbsp;<b></th>";
							}
							//echo "$from : $final";
							echo "<th class='danger'><b>Clase total</b></th>";
							echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
							echo "<tr>";
							$sql1 = mysqli_query($conexion,"SELECT distinct(idAsis) as idAsis,curso,nombre,seccion,asistEsp FROM asistencia order by idAsis asc ");
							while($row = mysqli_fetch_array($sql1)){
									$ids=$row["idAsis"];
									$sem= $row["curso"];
									$sec = $row["seccion"];
									$especializacion =$row["asistEsp"];
									$nom = $row["nombre"];
									//displaying ids and section 
									echo "<td class='active'>$ids</td><td class='active'>$sem</td><td class='active'>$especializacion</td><td class='active'>$sec</td><td class='active'>$nom</td>";
									$sql11 = mysqli_query( $conexion,"SELECT  nombreMat  FROM materias WHERE CursoMateria='Primero de Bachillerato' ");
									while($row = mysqli_fetch_array($sql11) ){
								
									$sub = $row["nombreMat"];
									
									//counting total number of days based on registered id i.e total of all subjects
							$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE  atten='0' and `idAsis`='$ids' and dia between '$from' and '$final' ");
									if($rows = mysqli_fetch_array($sql31)){
										//retriving number of absent days 
											$totalall2 = $rows["LOSS"];
									}
								
										
									//counting total number of days based on registered id i.e total of all subjects
						$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$ids' and atten = '1' and dia between '$from' and '$final' ");
									if($rows = mysqli_fetch_array($sql3)){
										//retriving number of absent days 
										$totalall1 = $rows["LOSS"];
									}
								
									//counting toal days for particular registered id
									 $totalall = $totalall1+$totalall2;
									
									//counting the total number of present days subject wise
			$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `asistencia` WHERE (`idAsis`='$ids' and `materia` = '$sub' and atten = '1' and dia between '$from' and '$final') ");
									while($rows = mysqli_fetch_array($sql2)){
										//retriving number of present days 
										 $total1 = $rows["ATTEN"];
										echo "<td class='active'>$total1</td>";
									}
									if($totalall!=0){
										$per = round((($totalall1/$totalall)*100),2);
									}
									else{
										$per = 0;
									}
								
									
			
								}
								echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
							}
							echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";
			
						}
						// end of IF STARTING 4-1														
		 }
		}
	?>
<?php
	echo $msg;
?>
		</div>
	</body>
</html>