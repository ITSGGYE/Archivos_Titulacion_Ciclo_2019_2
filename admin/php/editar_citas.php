<?php  
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: index.php');
  } 

  if (isset($_POST)) {
include_once("conexion.php");
 date_default_timezone_set("America/Guayaquil");  
$id=$_POST["idCita"];
$nombre = $_POST["paciente"];  //id paciente
$especialidad=$_POST["especialidad"];
$especialista=$_POST["especialista"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$estado=$_POST["estado"];
$observacion=$_POST["motivo"];
$dateingresada = date_create($hora);
$dates = date_format($dateingresada, 'H:i:s');

                
                       $selePac = $bd->prepare("SELECT id_paciente, nombre_apellido FROM paciente WHERE id_paciente = '".$nombre."'"); 

                         $selePac->execute(); 
                         $users = $selePac->fetchAll(); 
                         foreach($users as $user)  
                        {   
                          $idPaciente =  $user['id_paciente'];
                          $nombrePaciente =  $user['nombre_apellido'];
                        }  
                         if($nombre === $idPaciente){ 
                          $paciente = $nombrePaciente; 
                                                
                          $sentencia=$bd->prepare("UPDATE cita SET id_paciente=:nombre, paciente=:paciente,id_especialidad=:especialidad, id_especialista=:especialista,
                           fecha=:fecha, hora=:dates, estado=:estado, observacion=:observacion  WHERE id_cita=:id;");
                          $sentencia->bindParam(':id',$id);
                          $sentencia->bindParam(':nombre',$nombre);
                          $sentencia->bindParam(':paciente',$paciente);
                          $sentencia->bindParam(':especialidad',$especialidad);
                          $sentencia->bindParam(':especialista',$especialista);
                          $sentencia->bindParam(':fecha',$fecha);
                          $sentencia->bindParam(':dates',$dates);
                          $sentencia->bindParam(':estado',$estado);
                          $sentencia->bindParam(':observacion',$observacion);
                          $sentencia->execute();  

                            }
                    } 
?>


