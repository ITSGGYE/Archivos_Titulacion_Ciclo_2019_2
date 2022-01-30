<?php
     require_once("../modelo/conexion.php");

     $id=$_GET['ID_Usuario'];
     $db=Conectar::conexion();

     $db->query("delete from usuarios where ID_Usuario ='$id'");
     

     header("location:../vista/GestionUsuario.php");



?>