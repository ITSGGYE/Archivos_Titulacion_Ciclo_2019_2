<?php 
require_once "../modelos/Diagnostico.php";

$diagnostico=new Diagnostico();

$cod_diagnostico=isset($_POST["cod_diagnostico"])? limpiarCadena($_POST["cod_diagnostico"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$enfermedad=isset($_POST["enfermedad"])? limpiarCadena($_POST["enfermedad"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($cod_diagnostico)){
			$rspta=$diagnostico->insertar($codigo,$enfermedad);
			echo $rspta ? "Diagnostico registrado" : "Diagnostico no se pudo registrar";
		}
		else {
			$rspta=$diagnostico->editar($cod_diagnostico,$codigo,$enfermedad);
			echo $rspta ? "Diagnostico actualizado" : "Diagnostico no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$diagnostico->desactivar($cod_diagnostico);
 		echo $rspta ? "Diagnostico Desactivado" : "Diagnostico no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$diagnostico->activar($cod_diagnostico);
 		echo $rspta ? "Diagnostico activado" : "Diagnostico no se puede activar";
 		break;
	break;
	


	case 'mostrar':
		$rspta=$diagnostico->mostrar($cod_diagnostico);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$diagnostico->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->cod_diagnostico.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->cod_diagnostico.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->cod_diagnostico.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->cod_diagnostico.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->codigo,
				"2"=>$reg->enfermedad,
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