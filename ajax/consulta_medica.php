<?php

if(strlen(session_id()) < 1)
session_start();

require_once "../modelos/Consulta_Medica.php";

$consulta = new Consulta_medica();

$agenda_id=isset($_POST["agenda_id"])? LimpiarCadena($_POST["agenda_id"]):"";
$idpersona=$_SESSION["idpersona"];
$cedula=$_SESSION["per_cedula"];
$motivo_consulta=isset($_POST["motivo_consulta"])? LimpiarCadena($_POST["motivo_consulta"]):"";
$enfermedad_actual=isset($_POST["enfermedad_actual"])? LimpiarCadena($_POST["enfermedad_actual"]):"";
$anteced=isset($_POST["anteced"])? LimpiarCadena($_POST["anteced"]):"";
$cod_diagnostico=isset($_POST["cod_diagnostico"])? LimpiarCadena($_POST["cod_diagnostico"]):"";
$sintomas=isset($_POST["sintomas"])? LimpiarCadena($_POST["sintomas"]):"";
$tratamiento=isset($_POST["tratamiento"])? LimpiarCadena($_POST["tratamiento"]):"";





switch($_GET["op"]){
        

    case 'guardar':
      {
        
          $rspta=$consulta->insertar($agenda_id,$motivo_consulta,$enfermedad_actual,$anteced
          ,$sintomas,$cod_diagnostico,$tratamiento);
          echo $rspta ? "Paciente Atendido" : "No se pudo la atencion del cliente";
        

          foreach (array_keys($_POST['medicamento']) as $key) {
            $medicamento = $_POST['medicamento'][$key];
            $concentracion = $_POST['concentracion'][$key];
            $cantidad = $_POST['cantidad'][$key];
            $dosis = $_POST['dosis'][$key];
            $duracion = $_POST['duracion'][$key];
          
          
            $rspta=$consulta->registrar_receta($agenda_id,$medicamento,$concentracion,$cantidad,$dosis,$duracion);
          }



        
        
       
      }
    break;
  


   
    case 'mostrar':
      $rspta=$consulta->mostrar($agenda_id);
       //Codificar el resultado utilizando json
       echo json_encode($rspta);
       break;
    break;
  


    case 'listar':
      $rspta=$consulta->listar($idpersona,$cedula);
      $data= Array();
      while($reg=$rspta->fetch_object()){
        
        $receta='../Reportes/receta.php?id=';

        $data[]=array(       
          "0"=>($reg->estado_cita=='Consulta')?'&nbsp <button class="btn btn-primary" id="btnagregar" 
          onclick="mostrarform(true);mostrar('.$reg->agenda_id.');"><i class="fa fa-plus"></i></button>':
         '&nbsp <a target="_blank" href="'.$receta.$reg->agenda_id.'"  <button class="btn btn-default"><i class="fa fa-file-pdf-o">
         </i></button>',
          "1"=>$reg->fecha,
          "2"=>$reg->pac_cedula,
          "3"=>$reg->Nombres,
          "4"=>$reg->Medic,
          "5"=>$reg->esp_nombre,
          "6"=>$reg->registrador,
          "7"=>$reg->costo_cita,
          "8"=>$reg->estado_cita,
          
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
  

    case 'selectdiagnostico':
      $rspta=$consulta->diagnostico();
      echo '<option value="" selected disabled> Seleccione Diagnostico </option>';
      while($reg=$rspta->fetch_object()){
        
        echo '<option value='. $reg->cod_diagnostico .'>'. $reg->enfermedad.'</option>';
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
  


  case "selectenf":
    require_once "../modelos/Diagnostico.php";
    $diagnostico = new Diagnostico();
    $rspta = $diagnostico->listar_activos();
    echo '<option value="" selected disabled> Seleccione Diagnostico </option>';
    while ($reg = $rspta->fetch_object())
        {
          echo '<option value='. $reg->cod_diagnostico .'>'. $reg->enfermedad. '</option>';
        }
  break;


  


}
?>