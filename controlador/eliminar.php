<?php
     require_once("../modelo/conexion.php");

     $id=$_GET['ID_Aspirante'];
     $db=Conectar::conexion();

     $db->query("delete from aspirante where ID_Aspirante='$id'");
     

     header("location:../vista/acciones.php");

?>