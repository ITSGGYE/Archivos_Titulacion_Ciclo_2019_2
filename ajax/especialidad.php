<?php 
require_once "../modelos/Especialidad.php";

$esp=new Especialidad();

$esp_id=isset($_POST["esp_id"])? limpiarCadena($_POST["esp_id"]):"";
$esp_nombre=isset($_POST["esp_nombre"])? limpiarCadena($_POST["esp_nombre"]):"";
$esp_descripcion=isset($_POST["esp_descripcion"])? limpiarCadena($_POST["esp_descripcion"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($esp_id)){
			$rspta=$esp->insertar($esp_nombre,$esp_descripcion);
			echo $rspta ? "Especialidad registrada" : "";
		}
		else {
			$rspta=$esp->editar($esp_id,$esp_nombre,$esp_descripcion);
			echo $rspta ? "Especialidad actualizada" : "Especialidad no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$esp->desactivar($esp_id);
 		echo $rspta ? "Especialidad Desactivada" : "Especialidad no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$esp->activar($esp_id);
 		echo $rspta ? "Especialidad Activada" : "Especialidad no se puede activar";
 		break;
	break;
	
	case 'eliminar':
		$rspta=$esp->eliminar($esp_id);
 		echo $rspta ? "Especialidad Eliminada" : "Especialidad no se puede eliminar";
 		break;
	break;


	case 'mostrar':
		$rspta=$esp->mostrar($esp_id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$esp->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->esp_id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->esp_id.')"><i class="fa fa-ban"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->esp_id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->esp_id.')"><i class="fa fa-check"></i></button>'.
					' <button class="btn btn-danger" onclick="eliminar('.$reg->esp_id.')"><i class="fa fa-trash"></i></button>',
				"1"=>$reg->esp_nombre,
				"2"=>$reg->esp_descripcion,
 				"3"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>