

 <?php



include_once("conexion.php");

$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$contrasena=$_POST["contrasena"];

$fecha=$_POST["fecha"];
$genero=$_POST["genero"];




$sentencia=$bd->prepare("INSERT INTO paciente(cedula,nombre_apellido,correo,contrasena,fecha_nacimiento,sexo)VALUES(:cedula,:nombre,:correo,:contrasena,:fecha,:genero); ");

$sentencia->bindParam(':cedula',$cedula);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam(':contrasena',$contrasena);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':genero',$genero);

if($sentencia->execute()){

			 echo '<script>
    alert("Registro con Exito");
   window.location.href="index3.php";
 </script> '; 


}
else {

return "error";

}

?>