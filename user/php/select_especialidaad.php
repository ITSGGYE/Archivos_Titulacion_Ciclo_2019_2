<?php

$datVariable = $_REQUEST['dato'];
$arreglo = array();
switch ($datVariable) {
    case 1:
            $idCita = $_REQUEST['especialidad'];
            include_once "conexion.php";
            $sentencia = $bd->query("SELECT e.*, ed.* FROM especialista e, especialidad ed WHERE  e.id_especialidad = '" . $idCita . "' AND  e.id_especialidad = ed.id_especialidad");
            $pacientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($pacientes));
        break;
    case 2:
            include_once "conexion.php";
            $paciente = $_REQUEST['Dpaciente']; 
            $especialidad = $_REQUEST['Despecialidad'];
            $especialista = $_REQUEST['Despecialista'];
            
            $sentencia = $bd->query("SELECT c.id_paciente, c.paciente, c.id_especialista, 
            c.id_especialidad, es.nombre_especialidad, e.nombre_doctor, c.paciente, c.fecha, c.hora, c.estado
            FROM cita c, especialista e, especialidad es
            WHERE c.id_paciente = '".$paciente."'
            AND e.id_especialista = c.id_especialista
            AND es.id_especialidad = c.id_especialidad
            AND c.id_especialidad  = '".$especialidad."'
        
            AND c.estado = 'asignado'
            ");/*     AND c.id_especialista = '".$especialista."' */
            $pacientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($pacientes));
        break;
    case 3:
            include_once "conexion.php";
            $paciente = $_REQUEST['Cpaciente']; 
            $especialidad = $_REQUEST['Cespecialidad'];
            $especialista = $_REQUEST['Cespecialista'];
            $fecha = $_REQUEST['Cfecha'];
            $name = $_REQUEST['Chora'];

            $sentencia = $bd->query("SELECT c.id_paciente, c.paciente, c.id_especialista, c.id_especialidad, es.nombre_especialidad, e.nombre_doctor, c.paciente, c.fecha, c.hora, c.estado
            FROM cita c, especialista e, especialidad es
            WHERE c.fecha = '".$fecha."'
            AND hora = '".$name."'
            AND e.id_especialista = c.id_especialista
            AND es.id_especialidad = c.id_especialidad
            AND c.id_especialidad  = '".$especialidad."'
            AND c.id_especialista = '".$especialista."'
            AND (c.estado = 'asignado' OR c.estado = 'atendido')"); 
            $pacientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            print_r(json_encode($pacientes));
        break;
    case 4:
           include_once "conexion.php";
            $nombre = $_REQUEST["paciente"];  //id paciente
            $nombrepaciente = $_REQUEST["nombrepaciente"];
            $nombrecapa=$_REQUEST["especialidad"];
            $curso=$_REQUEST["especialista"];
            $fecha=$_REQUEST["fecha"];
            $hora=$_REQUEST["hora"];
            $estado=$_REQUEST["estado"];
            $observacion=$_REQUEST["motivo"];
            date_default_timezone_set("America/Guayaquil");  
            $dateingresada = date_create($hora);
            $date = date_format($dateingresada, 'H:i:s');
                         $id = $nombre;
                         $a = $nombrepaciente;
                         $b = $nombrecapa;
                         $c = $curso;
                         $d = $fecha;
                         $e = $date;
                         $f = $estado;
                         $g = $observacion; 
                         $h = $especialista2; 
                         $i = $especialidad2;  
                         $stmt = $bd->prepare("INSERT INTO cita (id_paciente, paciente,id_especialidad,id_especialista,fecha,hora,estado,observacion) VALUES ('$id','$a','$b','$c','$d','$e','$f','$g')");
                         $stmt->execute();
        break;
        case 5:
          include_once("conexion.php");
            $id=$_REQUEST["id"];
            $estado=$_REQUEST["estado"];
            $sentencia=$bd->prepare("UPDATE cita SET estado=:estado WHERE id_cita=:id");  
            $sentencia->bindParam(':id',$id);
            $sentencia->bindParam(':estado',$estado);
            $sentencia->execute();
       break;
    default:
        echo ("no hay datos");
        break;
}

