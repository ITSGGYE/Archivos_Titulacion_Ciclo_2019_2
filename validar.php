
<?php
//include("connect_db.php");






session_start();
	$mysqli=new mysqli("localhost","root","12345678","citas"); 

	$correo=$_POST['correo'];
	$contrasena=$_POST['contrasena'];

	



	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM paciente WHERE correo='$correo'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['contrasena']){
			$_SESSION['id_pacinete']=$f2['id_pacinete'];
			$_SESSION['correo']=$f2['correo'];
			

			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='user/inicio.php'</script>";
		
		}
	}


	$sql=mysqli_query($mysqli,"SELECT * FROM paciente WHERE correo='$correo'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['contrasena']){
			$_SESSION['id_pacinete']=$f['id_paciente'];
			$_SESSION['correo']=$f['correo'];
		

			
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='index3.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR INTENTE DE NUEVO")</script> ';
		
		echo "<script>location.href='index3.php'</script>";	

	}

?>