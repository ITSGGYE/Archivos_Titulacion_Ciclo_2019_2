<?php 
//Llamamos a la clase Paciente
require_once "../modelos/Paciente.php";

//Instanciamos la clase Paciente
//Tendra Acceso a los Metodos
$paciente=new Paciente();

$paciente_cod=isset($_POST["paciente_cod"])? limpiarCadena($_POST["paciente_cod"]):"";
$pac_cedula=isset($_POST["pac_cedula"])? limpiarCadena($_POST["pac_cedula"]):"";
$pac_nombre=isset($_POST["pac_nombre"])? limpiarCadena($_POST["pac_nombre"]):"";
$pac_apellido=isset($_POST["pac_apellido"])? limpiarCadena($_POST["pac_apellido"]):"";
$pac_fchnac=isset($_POST["pac_fchnac"])? limpiarCadena($_POST["pac_fchnac"]):"";
$pac_sangre=isset($_POST["pac_sangre"])? limpiarCadena($_POST["pac_sangre"]):"";
$pac_genero=isset($_POST["pac_genero"])? limpiarCadena($_POST["pac_genero"]):"";
$pac_email=isset($_POST["pac_email"])? limpiarCadena($_POST["pac_email"]):"";
$pac_direccion=isset($_POST["pac_direccion"])? limpiarCadena($_POST["pac_direccion"]):"";
$pac_telf=isset($_POST["pac_telf"])? limpiarCadena($_POST["pac_telf"]):"";
$pac_resp=isset($_POST["pac_resp"])? limpiarCadena($_POST["pac_resp"]):"";
$pac_emerg=isset($_POST["pac_emergencia"])? limpiarCadena($_POST["pac_emergencia"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($paciente_cod)){
			$rspta=$paciente->insertar($pac_cedula,$pac_nombre,$pac_apellido,$pac_fchnac,$pac_sangre,$pac_genero,$pac_email,$pac_direccion,$pac_telf,$pac_resp,$pac_emerg);
			echo $rspta ? "Paciente registrado" : "por lo tanto no se pudo registrar al Paciente ";
		}
		else {
			$rspta=$paciente->editar($paciente_cod,$pac_cedula,$pac_nombre,$pac_apellido,$pac_fchnac,$pac_sangre,$pac_genero,$pac_email,$pac_direccion,$pac_telf,$pac_resp,$pac_emerg);
			echo $rspta ? "Paciente actualizado" : "No se pudo actualizar Paciente";
		}
	break;
	
	
	case 'eliminar':
		$rspta=$paciente->eliminar($paciente_cod);
		echo $rspta ? "Paciente eliminado" : "No se puede eliminar al Paciente";
		break;
 		
	break;


	case 'mostrar':
		$rspta=$paciente->mostrar($paciente_cod);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar_paciente':
		$rspta=$paciente->listar_paciente($palabra);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;


	case 'listar':
		$rspta=$paciente->listar();
 		//Vamos a declarar un array
 		$data= Array();

         while ($reg=$rspta->fetch_object()){

			$url='../vistas/historial_paciente.php?id=';

            $data[]=array(
				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->paciente_cod.')"><i class="fa fa-pencil"></i></button> '. 
				'<button class="btn btn-danger" onclick="eliminar('.$reg->paciente_cod.')"><i class="fa fa-trash"></i></button>',
				"1"=>$reg->pac_cedula,
               "2"=>$reg->pac_nombre,
               "3"=>$reg->pac_apellido,
			   "4"=>$reg->Edad,
			   "5"=>$reg->pac_genero,
			   "6"=>$reg->pac_sangre,
			   "7"=>'&nbsp <a href="'.$url.$reg->paciente_cod.'"  <button class="btn btn-primary"><i class="fa fa-folder-open"></i></button> ');
			}


 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'historialpaciente':
		$rspta = $paciente->historial_paciente($_GET["id"]);
		$data= Array();
	
		$historia='../Reportes/historia.php?id=';
		$receta='../Reportes/receta.php?id=';

		while ($reg=$rspta->fetch_object()){
			$data[]=array(
				"0"=>$reg->fecha_cita.' '.$reg->hora_cita,
				"1"=>$reg->Medic,
				"2"=>$reg->esp_nombre,
				"3"=>'&nbsp <a target="_blank" href="'.$historia.$reg->agenda_id.'"  <button class="btn btn-primary"><i class="fa fa-file-pdf-o">
				</i></button>',
				"4"=>'&nbsp <a target="_blank" href="'.$receta.$reg->agenda_id.'"  <button class="btn btn-danger"><i class="fa fa-file-pdf-o">
				</i></button>',
				);
		}
		$results = array(
			"sEcho"=>1, //Información para el datatables
			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
		echo json_encode($results);

   break;

   case 'validar_cedula':
	$pac_cedula=$_POST['pac_cedula'];
	$rspta=$paciente->validar_cedula($pac_cedula);


	if($reg=$rspta->fetch_object()){
		echo 'Ya Existe un Paciente con esta Cedula. '.'Vuelva Ingresa otra Cedula.';
      }
      break;

}
?>