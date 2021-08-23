<?php
if(count($_POST)>0){
	$user = new CategoryData();
	$user->name = $_POST["name"];
	$user->detail = $_POST["detail"];
	$user->add();

	Core::alert("Agregado exitosamente!");
	Core::redir("./index.php?view=categories"); 
}else{
Core::alert("Error al agregar");
Core::redir("./index.php?view=newcategory"); 
}
?> 