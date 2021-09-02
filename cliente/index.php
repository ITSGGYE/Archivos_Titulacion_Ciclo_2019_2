<?php
 
session_start();
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos 
 
if(!isset($_SESSION['usuario']))
{
     ?><script>  window.location.replace('login.php');</script><?php   
} 
     ?><script>  window.location.replace('inicio.php');</script><?php   
?>