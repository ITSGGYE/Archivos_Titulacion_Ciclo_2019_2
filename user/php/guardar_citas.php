<?php  
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: index.php');
  } 

  if (isset($_POST)) {
include_once("conexion.php"); 

$nombre = $_POST["paciente"];  //id paciente
$nombrepaciente = $_POST["nombrepaciente"];
$nombrecapa=$_POST["especialidad"];
$curso=$_POST["especialista"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$estado=$_POST["estado"];
$observacion=$_POST["motivo"];
date_default_timezone_set("America/Guayaquil");  
$dateingresada = date_create($hora);
$dates = date_format($dateingresada, 'H:i:s');

                          $stmt = $bd->prepare("SELECT * FROM cita  WHERE  estado = 'cancelado'  AND id_especialidad =  '".$nombrecapa."'
                           AND id_especialista = '".$curso."' AND fecha = '".$fecha."' AND hora = '".$dates."'"); 

                          $stmt->execute(); 
                          $users = $stmt->fetchAll(); 
                          foreach($users as $user)  
                         {   
                           $idCita = $user['id_cita'];
                         /*   $idEspecialidad =  $user['id_especialidad'];
                           $idEspecialista =  $user['id_especialista'];
                           $idfecha =  $user['fecha'];
                           $idHora =  $user['hora']; */
                         }  
                          if(isset($idCita)){ 
                            $id = $idCita;

                                $sentencia=$bd->prepare("UPDATE cita SET id_paciente=:nombre, paciente=:nombrepaciente,id_especialidad=:nombrecapa, id_especialista=:curso, fecha=:fecha, hora=:dates, estado=:estado, observacion=:observacion  WHERE id_cita=:id;");
                                $sentencia->bindParam(':id',$id);
                                $sentencia->bindParam(':nombre',$nombre);
                                $sentencia->bindParam(':nombrepaciente',$nombrepaciente);
                                $sentencia->bindParam(':nombrecapa',$nombrecapa);
                                $sentencia->bindParam(':curso',$curso);
                                $sentencia->bindParam(':fecha',$fecha);
                                $sentencia->bindParam(':dates',$dates);
                                $sentencia->bindParam(':estado',$estado);
                                $sentencia->bindParam(':observacion',$observacion);
                                $sentencia->execute();
                   
                            } else {

                              $ids = $nombre;
                              $a = $nombrepaciente;
                              $b = $nombrecapa;
                              $c = $curso;
                              $d = $fecha;
                              $e = $dates;
                              $f = $estado;
                              $g = $observacion; 
                              $h = $especialista2; 
                              $i = $especialidad2;      
                               $stmt = $bd->prepare("INSERT INTO cita (id_paciente, paciente,id_especialidad,id_especialista,fecha,hora,estado,observacion) VALUES ('$ids','$a','$b','$c','$d','$e','$f','$g')");
                               $stmt->execute();

                            }  
                } 
?>