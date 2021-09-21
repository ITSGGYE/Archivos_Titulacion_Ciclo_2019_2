<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('America/Ecuador');
setlocale(LC_ALL,"es_VE.UTF-8","es_VE","esp");
$dbhost="localhost";
$dbname="softhotel";
$dbuser="root";
$dbpass="";
$tabla="detallereservaciones";
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($db->connect_errno) {
	die ("<h1>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</h1>");
}
?>
