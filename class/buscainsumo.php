<?php
	include('class.consultas.php');
	$filtro    = $_GET["term"];
	$Json      = new Json;
	$insumo  = $Json->BuscaInsumo($filtro);
	echo  json_encode($insumo);
?>  