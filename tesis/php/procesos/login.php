<?php 
	
	require "../conexion.php";

	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	$co = new conexion;
	$con = $co->conectar();

	$result = mysqli_query($con, "SELECT usuario, clave FROM usuario WHERE usuario='$usuario'");
	$fila = mysqli_fetch_row($result);

	if ($usuario == "" && $clave == ""){
		echo "<span style='color: red; text-align: center; font-size: 16px'>INGRESE EL USUARIO Y LA CONTRASEÑA</span>";
	}
	else if ($usuario == "") {
		echo "<span style='color: red; text-align: center; font-size: 16px';>INGRESE SU USUARIO</span>";
	}
	else if ($clave == ""){
		echo "<span style='color: red; text-align: center; font-size: 16px'>INGRESE LA CONTRASEÑA</span>";
	}
	else{
		if ($usuario == $fila[0] && $clave == $fila[1]){
			echo "USUARIO Y CONTRASEÑA CORRECTAS";
			mysqli_close($con);
		}
		else{
			echo "USUARIO Y CONTRASEÑA INCORRECTAS";
		}
	} 

?>