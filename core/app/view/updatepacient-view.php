<?php

if(count($_POST)>0){
	$user = PacientData::getById($_POST["user_id"]);

	$user->id = $_POST["id"];
	$user->name = $_POST["name"];
	$lastname = "NULL";
	if($_POST["lastname"]!=""){ $lastname = $_POST["lastname"]; }
	$user->lastname = $lastname;
	$user->gender = $_POST["gender"];
	$user->day_of_birth = $_POST["day_of_birth"];
	$user->sick = $_POST["sick"];
	$user->medicaments = $_POST["medicaments"];
	$user->alergy = $_POST["alergy"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->info = $_POST["info"];
	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=pacients';</script>";


}


?>