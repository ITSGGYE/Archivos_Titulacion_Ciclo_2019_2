<?php

require_once ("conexion_base_datos/conexion.php");
if (isset($_POST['SERIE']) && !empty($_POST['SERIE']))
{


$actividad = $_POST["ACTIVIDAD"];



//parse_str($REPORTE);

$con = mysql_connect ($host, $user, $pw)
or die ("Pro_server");
       
mysql_select_db ($db,$con)
or die ("pro_select_db");



mysql_query("INSERT INTO registro_de_actividad (situacion_actividad) VALUES ('$actividad')", $con) or die ("pro_insert_db");


echo "Registro Correcto";

}

else {echo "datosIncorrectos";}
   

?>

