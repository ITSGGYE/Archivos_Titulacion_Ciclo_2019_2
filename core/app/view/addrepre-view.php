<?php

$userx = RepreData::getRepeated($_POST["id"]);
if($userx==null){
	$user = new RepreData();
	$user->id = $_POST["id"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->gender = $_POST["gender"];
	$user->day_of_birth = $_POST["day_of_birth"];
	$user->email = $_POST["email"];
	$user->address = $_POST["address"];
	$user->phone = $_POST["phone"];
	$user->add();

	Core::alert("Agregado exitosamente!");
	Core::redir("./index.php?view=repres"); 
}else{
Core::alert("Error al agregar, Cedula repetida!");
Core::redir("./index.php?view=newrepre"); 
}
?>  