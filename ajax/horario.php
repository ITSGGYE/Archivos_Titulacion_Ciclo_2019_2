<?php
require_once "../modelos/Horario.php";

$horario = new Horario();

$idhorario=isset($_POST["idhorario"])? LimpiarCadena($_POST["idhorario"]):"";
$medico_id=isset($_POST["medico_id"])? LimpiarCadena($_POST["medico_id"]):"";
$cod_dia=isset($_POST["cod_dia"])? LimpiarCadena($_POST["cod_dia"]):"";
$hora_inicio=isset($_POST["hora_inicio"])? LimpiarCadena($_POST["hora_inicio"]):"";
$hora_fin=isset($_POST["hora_fin"])? LimpiarCadena($_POST["hora_fin"]):"";
$intervalo=isset($_POST["intervalo"])? LimpiarCadena($_POST["intervalo"]):"";


switch($_GET["op"]){
        

  case 'guardar':
    {
      $rspta=$horario->insertar($medico_id,$cod_dia,$hora_inicio,$hora_fin,$intervalo);
      echo $rspta ? "Horario Registrado" : "Horario Registrado";
    }
  break;




    case 'eliminar':
      $rspta=$horario->eliminar_horario($medico_id,$cod_dia);
       echo $rspta ? "Horario Eliminado" : "No se puede Eliminar Horario ";
       break;
    break;




    case 'listar':
      $rspta=$horario->listar();
      $data= Array();
      while($reg=$rspta->fetch_object()){
        $data[]=array(
          "0"=>'&nbsp <button class="btn btn-danger" onclick="eliminar_horario('.$reg->medico_id.','.$reg->cod_dia.')"><i class="fa fa-trash"></i></button>',
          "1"=>$reg->idhorario,
          "2"=>$reg->Nombres,
          "3"=>$reg->dia,
          "4"=>$reg->Atencion,
          "5"=>$reg->intervalo,
        );
      }
      $results= array(
          "sEcho"=>1, 
          "iTotalRecords"=>count($data),
          "iTotalDisplayRecord"=>count($data), 
          "aaData"=>$data);

          echo json_encode($results);

    break;

      
  case 'selectmed':
    $rspta=$horario->medico();
    echo '<option value='. $reg->idpersona .'>'. $reg->per_nombre .' '.$reg->per_apellido .'</option>';
    while($reg=$rspta->fetch_object()){
      
      echo '<option value='. $reg->idpersona .'>'. $reg->per_nombre .' '.$reg->per_apellido .'</option>';
    }
  
    break; 
  

      case 'selectdia':
        $medico_id=$_POST['medico_id'];
        $rspta=$horario->dia($medico_id);
        echo '<option value="" selected disabled>Seleccione Dia </option>';
        while($reg=$rspta->fetch_object()){
          echo '<option value='.$reg->cod_dia .'>'. $reg->dia . '</option>';
        }
        break; 
      
}
?>