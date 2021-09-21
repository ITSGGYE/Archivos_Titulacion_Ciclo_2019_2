<?php
	include('class.consultas.php');
	$filtro    = $_GET["term"];
	$Json      = new Json;
	$kardex  = $Json->BuscaProductoC($filtro);
	echo  json_encode($kardex);
?>  