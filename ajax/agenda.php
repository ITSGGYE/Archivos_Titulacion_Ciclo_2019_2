<?php

if(strlen(session_id()) < 1)
session_start();

require_once "../modelos/Agenda.php";

$agenda = new Agenda();


$agenda_id=isset($_POST["agenda_id"])? LimpiarCadena($_POST["agenda_id"]):"";
$registrador_id=$_SESSION["idpersona"];
$paciente=isset($_POST["paciente"])? LimpiarCadena($_POST["paciente"]):"";
 /* $paciente_cod=isset($_POST["paciente_cod"])? LimpiarCadena($_POST["paciente_cod"]):"";*/
$medico_id=isset($_POST["medico_id"])? LimpiarCadena($_POST["medico_id"]):"";
$asunto=isset($_POST["asunto"])? LimpiarCadena($_POST["asunto"]):"";
$costo_cita=isset($_POST["costo_cita"])? LimpiarCadena($_POST["costo_cita"]):"";
$fecha_cita=isset($_POST["fecha_cita"])? LimpiarCadena($_POST["fecha_cita"]):"";
$hora_cita=isset($_POST["hora_cita"])? LimpiarCadena($_POST["hora_cita"]):"";
$idhorario=isset($_POST["idhorario"])? LimpiarCadena($_POST["idhorario"]):"";
$estado_pago=isset($_POST["estado_pago"])? LimpiarCadena($_POST["estado_pago"]):"";


switch($_GET["op"]){
        
  
    case 'guardar':
      {
        $rspta=$agenda->insertar($paciente,$medico_id,$registrador_id,$asunto,$costo_cita,$fecha_cita,$idhorario,$estado_pago);
        echo $rspta ? "Cita registrada" : "No se pudo registrar la Cita";
      }
    break;
   

   /*
  case 'guardaryeditar':
    if (empty($agenda_id))
    {
			$rspta=$agenda->insertar($paciente_cod,$medico_id,$asunto,$costo_cita,$fecha_cita,$hora_cita,$estado_pago);
			echo $rspta ? "Cita registrada" : "Especialidad no se pudo registrar";
		}
		else {
			$rspta=$agenda->editar($agenda_id,$paciente_cod,$medico_id,$asunto,$costo_cita,$fecha_cita,$hora_cita);
			echo $rspta ? "Cita actualizada" : "Especialidad no se pudo actualizar";
		}
	break;

  */
    case 'anular':
      $rspta=$agenda->anular_cita($agenda_id);
       echo $rspta ? "Cita Anulada" : "No se puede ";
       break;
    break;

   
    case 'pagar_cita':
      $rspta=$agenda->pagar_cita($agenda_id);
       echo $rspta ? "El paciente esta para la valoracion de sus Vitales" : "No se Puede procesar el pago";
       break;
    break;
   

   
    /*

    case 'mostrar':
      $rspta=$agenda->mostrar($agenda_id);
       //Codificar el resultado utilizando json
       echo json_encode($rspta);
       break;
    break;*/
  


    case 'listar':
      $rspta=$agenda->listar();
      $data= Array();
      while($reg=$rspta->fetch_object()){

        $url='../Reportes/exTicket.php?id=';
        $data[]=array(
          "0"=>($reg->estado_pago=='Pendiente')?'<button class="btn btn-danger" onclick="anular('.$reg->agenda_id.')"><i class="fa fa-close"></i></button> '.
          '&nbsp <button class="btn btn-success" onclick="pagar_cita('.$reg->agenda_id.')"><i class="fa fa-usd"></i></button> ':
          '<a target="_blank" href="'.$url.$reg->agenda_id.'"  <button class="btn btn-primary"><i class="fa fa-file"></i></button> '. 
          '   ',
          "1"=>$reg->fecha,
          "2"=>$reg->Nombres,
          "3"=>$reg->Medic,
          "4"=>$reg->esp_nombre,
          "5"=>$reg->registrador,
          "6"=>$reg->costo_cita,
          "7"=>$reg->estado_pago,

        );
      }
      $results= array(
          "sEcho"=>1, 
          "iTotalRecords"=>count($data),
          "iTotalDisplayRecord"=>count($data), 
          "aaData"=>$data);

          echo json_encode($results);

    break;



    case 'buscarpaciente':
      $busqueda=$_POST['busqueda'];
      $rspta=$agenda->buscar($busqueda);

      while($reg=$rspta->fetch_object()){
        echo '<option value='. $reg->paciente_cod .'>'. $reg->pac_nombre .' '.$reg->pac_apellido .'</option>';
      }
      break; 


  case "selectpac":
   

    $rspta = $agenda->paciente();
    echo '<option value="" selected disabled>Seleccione un Paciente </option>';
    while ($reg = $rspta->fetch_object())
        {
          echo '<option value='. $reg->paciente_cod .'>'. $reg->pac_nombre .' '.$reg->pac_apellido. '</option>';
        }
  break;


  
  case 'selectesp':
  $rspta=$agenda->especialidad();
    echo '<option value="" selected disabled>Seleccione Especialidad </option>';
  while($reg=$rspta->fetch_object()){
    
    echo '<option value='. $reg->esp_id .'>'. $reg->esp_nombre .'</option>';
  }

  break; 



  case 'selectmed':
  $esp_id=$_POST['esp_id'];
  $rspta=$agenda->medico($esp_id);
  echo '<option value="" selected disabled>Seleccione Medico </option>';
  while($reg=$rspta->fetch_object()){
    echo '<option value='. $reg->idpersona .'>'. $reg->per_nombre .' '.$reg->per_apellido .'</option>';
  }
  break; 

  

  case "selectdia":
		require_once "../modelos/Dia.php";
		$dia = new Dia();

		$rspta = $dia->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->cod_dia . '>' . $reg->dia . '</option>';
				}
	break;


  case 'selecthorario':

    $fecha_cita=$_POST["fecha_cita"];
    $medico_id=$_POST["medico_id"];

    $rspta=$agenda->horario($fecha_cita,$medico_id);
    echo '<option value="" selected disabled>Seleccione Horario </option>';
    while($reg=$rspta->fetch_object()){
      echo '<option value='. $reg->idhorario .'>'.$reg->horario.'</option>';
    }
    break; 


/*
case 'selectmed':
  $esp_id=$_POST['esp_id'];
  echo $esp_id;
  return $esp_id;
  $rspta=$agenda->medico($esp_id);
  echo '<option value="" selected disabled>Seleccione Medico </option>';
  while($reg=$rspta->fetch_object()){
    echo '<option value='.$reg->medico_id.'>'.$reg->med_nomape.'</option>';
  }
  break; 
*/

}
?>