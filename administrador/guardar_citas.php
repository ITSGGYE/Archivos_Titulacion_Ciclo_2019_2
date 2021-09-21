<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$nombre=$_POST["nombre"];
$nombrecapa=$_POST["nombrecapa"];
$curso=$_POST["curso"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$estado=$_POST["estado"];
$observacion=$_POST["observacion"];
$color=$_POST["color"];
$admin=$_POST["admin"];

date_default_timezone_set("America/Guayaquil");  


$stmt = $bd->prepare("SELECT fecha, hora FROM cita WHERE cit_estado='asignado' and fecha = '".$fecha."' AND hora = '".$hora."'"); 
$stmt->execute(); 
$users = $stmt->fetchAll(); 
foreach($users as $user)  
{   
  $fecha2 = $user['fecha']; 
  $hora2 = $user['hora'];                 
} 
if($hora===$hora2){
  echo '<script>

  alert("La Hora ⏰: '.$hora.', Ya Registrada para el día 📅'.$fecha.', Pruebe con otra ✏ ");  
  window.location.href="agregarcitas.php";
  </script> '; 
  
  
}
else {
  $a = $nombre;
  $b = $nombrecapa;
  $c = $curso;
  $d = $fecha;
  $e = $hora;
  $f = $estado;
  $g = $observacion; 
  $h = $color; 
  $i = $admin; 



  $stmt = $bd->prepare("INSERT INTO cita (paciente,id_especialidad,id_especialista,fecha,hora,cit_estado,cit_observacion,color,id_admin) VALUES ('$nombre','$nombrecapa','$curso','$fecha','$hora','$estado','$observacion','$color','$admin')");
  $stmt->execute();
  echo '<script>
  alert("Cita Registrada Exitosamente Hora ⏰: '.$e.', para el día 📅 '.$d.'");
  window.location.href="citas.php";
  </script> '; 
  $stmt->close();
  $bd->close();
}
?>