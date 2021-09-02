<?php

if(count($_POST)>0){
	$user = MedicData::getById($_POST["user_id"]);

	$category_id = "NULL";
	if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
	$user->name = $_POST["name"];
	$user->category_id = $category_id;
	$user->lastname = $_POST["lastname"];
	$user->gender = $_POST["gender"];
	$user->profe = $_POST["profe"];
	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=medics';</script>";


}


?>