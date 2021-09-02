<?php
	require_once ("conexion_base_datos/conexion.php"); 
$user=mysqli_real_escape_string($con,(strip_tags($_POST["text"],ENT_QUOTES)));
	        $nombre=mysqli_real_escape_string($con,(strip_tags($_POST["pass_update"],ENT_QUOTES)));		  
		$sql="UPDATE admin SET pass_admin='".$nombre."' WHERE usuario_admin='$user'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
			     ?><script> alert("Su Password se ha actualizado correctamente"); window.location='home.php'; </script> <?php  
			} else{
			  ?><script> alert("Error al actualizar su password"); window.location='home.php'; </script> <?php  
			}
?>