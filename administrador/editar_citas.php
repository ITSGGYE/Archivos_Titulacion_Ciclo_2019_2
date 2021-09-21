<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$id=$_POST["id"];
$nombrecapa=$_POST["nombrecapa"];
$cursoe=$_POST["cursoe"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$estado=$_POST["estado"];
$observacion=$_POST["observacion"];
date_default_timezone_set("America/Guayaquil");  

$stmt = $bd->prepare("SELECT fecha, hora,cit_observacion FROM cita WHERE cit_estado='asignado' and fecha = '".$fecha."' AND hora = '".$hora."' AND cit_estado= '".$estado."'  "); 
$stmt->execute(); 
$users = $stmt->fetchAll(); 
foreach($users as $user)  
{   

  $fecha2 = $user['fecha']; 
  $hora2 = $user['hora'];                 
   $estado2 = $user['estado']; 


} 
if($hora===$hora2){
  echo '<script>
  alert("La Hora ⏰: '.$hora.', Ya Registrada para el día 📅'.$fecha.', Pruebe con otra ✏ ");  
  window.location.href="citas.php";
  </script> '; 
  
  
}
else {$stmt->execute();
$b = $nombrecapa;
$c = $cursoe;
$d = $fecha;
$e = $hora;
$f = $estado;
$g = $observacion; $stmt = $bd->prepare("UPDATE cita SET 
  id_especialidad='$nombrecapa',
  id_especialista='$cursoe',
  fecha='$fecha',
  hora='$hora',
  cit_estado='$estado',
  cit_observacion='$observacion'
  WHERE id_cita='$id';");
$stmt->execute();echo '<script>
alert("Cita Editada Exitosa ");
window.location.href="citas.php";
</script> '; $stmt->close();
$bd->close();

}
?>

