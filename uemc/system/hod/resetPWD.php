
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
$ck="";
$id = $_SESSION["id"];
//checking whether new id is passed or not
if(isset($_POST["old_Id"])){
	//$newID = $_POST["new_Id"];
	$old = $_POST["old_Id"];
	//retriving data to check old password
	$sql1 = mysqli_query($conexion, "SELECT * FROM user WHERE  userId = '$old' ");
	while($row= mysqli_fetch_array($sql1)){
		$ck = $row["userId"];
	}

	if($ck == $old){
		//means success so updating
		$sql = mysqli_query($conexion, "UPDATE user SET password = 'ssn1234cse' WHERE userId='$old' ");
		$msg = "<div align='center'><font color='green'>Password Reset Success</font></div>";
		
	}
	else{
		//means some error occured
		$msg = "<div align='center'><font color='red'>Sorry Wrong ID provided, try again</font></div>";
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
			<form method="post" action="resetPWD.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Restablecer la contraseña</h3></caption>
			<tbody>
					<th class="danger" colspan="2">Ingresar ID para restablecer la contraseña				
				</th>
				<tr>
					<td class="active" colspan="2">	
						<input type="text" class="form-control" placeholder="Enter ID" name="old_Id"/>
						</select>
					</td>
		
				</tr>
				<tr>
					<td class="active" colspan="2">	
						Nota: La contraseña de reinicio es: ssn1234cse.

					</td>
		
				</tr>

				<tr>
					<td colspan="2" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Restablecer la Contraseña">	
							
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