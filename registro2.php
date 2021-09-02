<?php

include_once "conexion.php";
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$email = $_POST["correo"];
$fecha = $_POST["fecha"];
$genero = $_POST["genero"];
$rol = '2';
$rpass = $_POST['rpass'];
$pas = $_POST["contrasena"];
$pass = encryptData($pas);

function encryptData($data)
{
    $clave = 'cadalargadepassdeingresodelsistemafundacionconexionvital';
    $method = 'aes-256-cbc';
    $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
    $encrypted_data = openssl_encrypt($data, $method, $clave, false, $iv);
    return $encrypted_data;
}
$stmt = $bd->prepare("SELECT * FROM paciente  WHERE correo = '" . $email . "'");
$stmt->execute();
$users = $stmt->fetchAll();
foreach ($users as $user) {
    $co = $user['correo'];
}

$correoBD = $co;
if ($correoBD) {

    echo '<script>swal("Error!", "Incorrecto, ya existe el correo", "error");
 setTimeout(function() {
    window.location.href="index3.php"
}, 1200);</script> ';

} else {
    $sentencia = $bd->prepare(
        "INSERT INTO paciente(cedula,nombre_apellido,correo,
               contrasena,fecha_nacimiento,sexo, id_rol)VALUES(:cedula,:nombre,:email,:pass,:fecha,:genero,:rol);"
    );

    $sentencia->bindParam(':cedula', $cedula);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':pass', $pass);
    $sentencia->bindParam(':fecha', $fecha);
    $sentencia->bindParam(':genero', $genero);
    $sentencia->bindParam(':rol', $rol);
    $sentencia->execute();

    echo '<script>swal("Guardado", "Registro Exitosamente", "success");
           setTimeout(function() {
              window.location.href="index3.php"
          }, 1200);</script> ';

}
