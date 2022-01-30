<?php
     require_once("../modelo/conexion.php");

     $id=$_GET['cedula'];
     $db=Conectar::conexion();

     $db->query("delete from puntaje where cedula ='$id'");
     

     header("location:../vista/reporte.php");

?>