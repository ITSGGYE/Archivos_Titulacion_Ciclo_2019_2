<?php
include_once("conexion.php");

        //recuperar las variables
   


$codigo=$_POST["codigo"];
$nombre=$_POST["nombre"];
$cedula=$_POST["cedula"];
$fecha=$_POST["fecha"];
$genero=$_POST["genero"];
$correo=$_POST["correo"];
$edad=$_POST["edad"];
$pais=$_POST["pais"];
$provincia=$_POST["provincia"];
$ciudad=$_POST["ciudad"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$civil=$_POST["civil"];
$mot=$_POST["mot"];
$recom=$_POST["recom"];


    //sentencia sql
    //manda a traer los valores de '$nombre','$correo','$mensaje'
    
$sentencia=$bd->prepare("INSERT INTO historial(cod_paciente,id_paciente,cedula,fecha_nacimiento,genero,correo,edad,pais,provincia,ciudad,direccion,telefono,civil,mot,recom)VALUES(:codigo,:nombre,:cedula,:fecha,:genero,:correo,:edad,:pais,:provincia,:ciudad,:direccion,:telefono,:civil,:mot,:recom);");
 
    
$sentencia->bindParam(':codigo',$codigo);

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':cedula',$cedula);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':genero',$genero);

$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam(':edad',$edad);
$sentencia->bindParam(':pais',$pais);
$sentencia->bindParam(':provincia',$provincia);

$sentencia->bindParam(':ciudad',$ciudad);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':civil',$civil);
$sentencia->bindParam(':mot',$mot);
$sentencia->bindParam(':recom',$recom);


if($sentencia->execute()){
 echo '<script>
    alert("DATOS REGISTRADOS");
    window.history.go(-1);
 </script> ';
}
else {

return "error";

}


?>
 