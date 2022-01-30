<?php
$correo = $_POST['correo'];
$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];

$header = "MINE-Version:1.0\r\n";
$header.="Content-type: text/html; charset=iso-8859-1\r\n";
$header.="From: ariel osorio <arielgeremiasosoriojaen@gmail.com>\r\n";


$envio = mail($correo,$titulo,$mensaje,$header);


if($envio){
    
    header("location:../vista/GestionUsuario.php");


}else{
    echo "no se envio";
}

?>