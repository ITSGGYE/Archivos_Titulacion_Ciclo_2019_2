<?php

if(count($_POST)>0){
	$user = new MedicData();
	$category_id = "NULL";
	if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
	$user->name = $_POST["name"];
	$user->category_id = $category_id;
	$user->lastname = $_POST["lastname"];
	$user->gender = $_POST["gender"];
	$user->profe = $_POST["profe"];
	$user->add();

	Core::alert("Agregado exitosamente!");
	Core::redir("./index.php?view=medics"); 
}else{
Core::alert("Error al agregar");
Core::redir("./index.php?view=newmedic"); 
}
?> 