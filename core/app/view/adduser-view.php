<?php

$userx = UserData::getRepeated($_POST["username"]);
if($userx==null){
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->is_admin=$_POST["is_admin"];
	$user->is_active=$_POST["is_active"]; 
	$user->password = sha1(md5($_POST["password"]));
	$user->add();

	Core::alert("Agregado exitosamente!");
	Core::redir("./index.php?view=users"); 
}else{
Core::alert("Error al agregar, Nombre de usuario repetido!");
Core::redir("./index.php?view=newuser"); 
}

?>