<?php
$correo = $_POST['correo'];
$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];

$header = "MINE-Version:1.0\r\n";
$header.="Content-type: text/html; charset=iso-8859-1\r\n";
$header.="From: ariel osorio <arielgeremiasosoriojaen@gmail.com>\r\n";


$envio = mail($correo,$titulo,$mensaje,$header);


if($envio){
    header("location:../vista/reporte.php");


}else{
    echo "no se envio el correo por favor verifica que el correo sea correcto que tengas acceso a internet y que sea solo correo de gmail por motivos de interferncias sino le gusta pague un hosting y contacte al programador :)";
}

?>