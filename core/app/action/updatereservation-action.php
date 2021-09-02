<?php

if(count($_POST)>0){
	$user = ReservationData::getById($_POST["id"]);
	$user->title = $_POST["title"];
	$user->pacient_id = $_POST["pacient_id"];
	$user->medic_id = $_POST["medic_id"];
	$user->date_at = $_POST["date_at"];
	$user->time_at = $_POST["time_at"];
	$user->note = $_POST["note"];
	$user->peso = $_POST["peso"];
	$user->status_id = $_POST["status_id"];
	$user->payment_id = $_POST["payment_id"];
	$user->price = $_POST["price"];
	$user->dosis = $_POST["dosis"];
	$user->sick = $_POST["sick"];
	$user->symtoms = $_POST["symtoms"];
	$user->medicaments = $_POST["medicaments"];

	$user->update();

	Core::alert("Se actualizo exitosamente!");
	Core::redir("./index.php?view=reservations"); 
}else{
Core::alert("Error al realizar cambios");
Core::redir("./index.php?view=editreservation"); 
}
?>  