<?php
include_once("conexion.php");

        //recuperar las variables
   



$nombre=$_POST["nombre"];

$telefono=$_POST["telefono"];

$email=$_POST["email"];
$mensaje=$_POST["mensaje"];


////////////////////////////////////////////////// datos correo
$destinarios="nathaliiuvidia1995@gmail.com";
$asunto="contactos web fundacion";

mail($destinarios,$asunto);
/////////////////////////////////////////////////////

    //sentencia sql
    //manda a traer los valores de '$nombre','$correo','$mensaje'
    
$sentencia=$bd->prepare("INSERT INTO contacto(
    nombre_contacto,
    telefono,
    correo,
    mensaje
    )VALUES(
    :nombre,
    :telefono,
    :email,
    :mensaje); ");
 
    





$sentencia->bindParam(':nombre',$nombre);

$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':mensaje',$mensaje);



if($sentencia->execute()){
   echo '<script>
    alert("Su mensaje ha sido Enviado");
    window.history.go(-1);
 </script> ';
}
else {

return "Error envio";

}

?>
 