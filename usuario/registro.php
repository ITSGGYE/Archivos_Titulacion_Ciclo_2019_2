<?php 
$mysqli=new mysqli("localhost","root","123456789","consultorios_odontologicos"); 
$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$contrasena=$_POST["contrasena"];
$rpass=$_POST['rpass'];
$fecha=$_POST["fecha"];
$genero=$_POST["genero"];
$checkemail=mysqli_query($mysqli,"SELECT * FROM paciente WHERE correo='$correo'");
$check_mail=mysqli_num_rows($checkemail);
if($contrasena==$rpass){
	if($check_mail>0){
		echo '<script>alert("Incorrecto ❌, ya existe el correo ✅, verifique sus datos ✏");
		window.location.href="registrate.php";
		</script> ';  
	}else{
		mysqli_query($mysqli,"INSERT INTO paciente(pac_cedula,nombre_apellido,pac_telefono, correo, contrasena, fecha_nacimiento, pac_sexo) VALUES('$cedula','$nombre','$telefono','$correo','$contrasena','$fecha','$genero')");
		echo '<script>alert("USUARIO REGISTARADO EXITOSAMENTE ✅");
		window.location.href="login.php";
		</script> ';  
	}
}else{
	echo '<script>
	alert("contraseña son incorrectas ❌");
	window.location.href="registrate.php";
	</script> ';  
}
?>