<?php 
require_once "../modelos/Dia.php";

$days=new Dia();


$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($rol_id)){
			$rspta=$roles->insertar($rol,$_POST['modulo']);
			echo $rspta ? "ROl registrado" : "ROl no se pudo registrar";
		}
		else {
			$rspta=$roles->editar($rol_id,$rol,$_POST['modulo']);
			echo $rspta ? "ROl actualizado" : "ROl no se pudo actualizar";
		}
	break;



	case 'listar':
		$rspta=$days->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
				"0"=>$reg->cod_dia,
				"1"=>$reg->dia,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

    case "selectdia":
		require_once "../modelos/Dia.php";
		$days = new Dia();

		$rspta = $days->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->cod_dia . '>' . $reg->dia . '</option>';
				}
	break;


}
?>
