<?php 
	require "../conexion.php";
	require "../metodosCRUD.php";

	$id = $_POST['id'];

	$obj = new metodos();
	$obj->eliminargrado($id);

 ?>