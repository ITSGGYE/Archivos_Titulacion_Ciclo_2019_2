<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php 
$mysqli=new mysqli("localhost","root","123456789","consultorios_odontologicos"); 
$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$telefono=$_POST["telefono"];
$email=$_POST["email"];
$pass=$_POST['pass'];
$fecha=$_POST["fecha"];
$genero=$_POST["genero"];
$checkemail=mysqli_query($mysqli,"SELECT * FROM paciente WHERE correo='$email'");
$check_mail=mysqli_num_rows($checkemail);
if($check_mail>0){
	echo '<script>
	alert("Incorrecto, ya existe el correo, verifique sus datos");
	window.location.href="paciente.php";
	</script> ';  
}else{
	mysqli_query($mysqli,"INSERT INTO paciente(pac_cedula,nombre_apellido,pac_telefono, correo, contrasena, fecha_nacimiento, pac_sexo) VALUES('$cedula','$nombre','$telefono','$email','$pass','$fecha','$genero')");
	echo '<script>
	window.location.href="paciente.php";
	</script> ';  
}

?>