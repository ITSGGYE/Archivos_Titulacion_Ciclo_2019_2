<?php  
	session_start();
	session_destroy();
	header('Location:../usuario/index.php');
?>