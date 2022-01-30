<?php
include("../conexion.php");
$id_examen=$_POST['id_examen'];
$id_preguntas=$_POST['id_preguntas'];
$preg1=$_POST['preg1'];
$resp1=$_POST['resp1'];
$preg2=$_POST['preg2'];
$resp2=$_POST['resp2'];
$A=$_POST['A'];
$B=$_POST['B'];
$C=$_POST['C'];
$D=$_POST['D'];
$ci=$_POST['ci'];

$c = count($_POST["ci"]);
if ($c > 0) {
for ($i=0; $i<$c; $i++) {
$id_preguntas=$_POST['id_preguntas'][$i];
$preg1=$_POST['preg1'][$i];
$resp1=$_POST['resp1'][$i];
$preg2=$_POST['preg2'][$i];
$resp2=$_POST['resp2'][$i];
$A=$_POST['A'][$i];
$B=$_POST['B'][$i];
$C=$_POST['C'][$i];
$D=$_POST['D'][$i];


$insertar="INSERT INTO cuestionarios(id,ci,id_examen,id_preguntas,preg1,preg2,resp1,resp2) VALUES(NULL,'$ci','$id_examen','$id_preguntas','$preg1','$preg2','$resp1','$resp2' )";
if ($resultado=$link->query($insertar)) {
	echo "PROCESO CORRECTO";
}else{
	echo "Error en el PROCESO";
}


}
}

?>