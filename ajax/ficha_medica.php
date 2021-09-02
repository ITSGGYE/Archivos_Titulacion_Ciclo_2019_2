<?php
require_once "../modelos/Ficha_Medica.php";

$ficha = new Ficha_medica();

$idficha_medica=isset($_POST["idficha_medica"])? LimpiarCadena($_POST["idficha_medica"]):"";
$agenda_id=isset($_POST["agenda_id"])? LimpiarCadena($_POST["agenda_id"]):"";
$peso=isset($_POST["peso"])? LimpiarCadena($_POST["peso"]):"";
$talla=isset($_POST["talla"])? LimpiarCadena($_POST["talla"]):"";
$presion_art=isset($_POST["presion_art"])? LimpiarCadena($_POST["presion_art"]):"";
$alergias=isset($_POST["alergias"])? LimpiarCadena($_POST["alergias"]):"";
$temperatura=isset($_POST["temperatura"])? LimpiarCadena($_POST["temperatura"]):"";
$habitos=isset($_POST["habitos"])? LimpiarCadena($_POST["habitos"]):"";


switch($_GET["op"]){
        

    case 'guardar':
      {
        $rspta=$ficha->insertar($agenda_id,$peso,$talla,$presion_art,$alergias,$temperatura,$habitos);
        echo $rspta ? "El Paciente esta en espera de su Consulta" : "No se pudo registrar la Ficha";
      }
    break;
  
  
   
    case 'mostrar':
      $rspta=$ficha->mostrar($agenda_id);
       //Codificar el resultado utilizando json
       echo json_encode($rspta);
       break;
    break;
  


    case 'listar':
      $rspta=$ficha->listar();
      $data= Array();
      while($reg=$rspta->fetch_object()){
        $data[]=array(
          "0"=>'&nbsp <button class="btn btn-primary" id="btnagregar" 
            onclick="mostrarform(true);mostrar('.$reg->agenda_id.');"><i class="fa fa-file"></i></button>',
          "1"=>$reg->fecha,
          "2"=>$reg->pac_cedula,
          "3"=>$reg->Nombres,
          "4"=>$reg->Medic,
          "5"=>$reg->esp_nombre,
          "6"=>$reg->registrador,
          "7"=>$reg->costo_cita,
          "8"=>($reg->estado_cita)?'<span class="label bg-primary">Registrada</span>':
          '<span class="label bg-red">Anulada</span>'

        );
      }
      $results= array(
          "sEcho"=>1, 
          "iTotalRecords"=>count($data),
          "iTotalDisplayRecord"=>count($data), 
          "aaData"=>$data);

          echo json_encode($results);

    break;


  case "selectpac":
    require_once "../modelos/Paciente.php";
    $paciente = new Paciente();
    $rspta = $paciente->paciente();

    while ($reg = $rspta->fetch_object())
        {
          echo '<option value='. $reg->paciente_cod .'>'. $reg->pac_nombre .' '.$reg->pac_apellido. '</option>';
        }
  break;


  
  case 'selectesp':
  $rspta=$ficha->especialidad();
  echo '<option value="" selected disabled> Seleccione Especialidad </option>';
  while($reg=$rspta->fetch_object()){
    
    echo '<option value='. $reg->esp_id .'>'. $reg->esp_nombre .' S/. '.' $ '.$reg->esp_costo .'</option>';
  }

  break; 



  case 'selectmed':
  $esp_id=$_POST['esp_id'];
  $rspta=$ficha->medico($esp_id);
  echo '<option value="" selected disabled>Seleccione Medico </option>';
  while($reg=$rspta->fetch_object()){
    echo '<option value='.$reg->medico_id.'>'.$reg->med_nomape.'</option>';
  }

  break; 





}
?>