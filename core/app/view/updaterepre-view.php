<?php

if(count($_POST)>0){
	$user = RepreData::getById($_POST["user_id"]);
	$user->id = $_POST["id"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->email = $_POST["email"];
	$user->address = $_POST["address"];
	$user->phone = $_POST["phone"];
	$user->update();
print "<script>window.location='index.php?view=repres';</script>";


}


?>