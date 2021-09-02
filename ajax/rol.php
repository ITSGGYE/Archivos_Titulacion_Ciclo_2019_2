<?php 
require_once "../modelos/Rol.php";

$roles=new Rol();

$rol_id=isset($_POST["rol_id"])? limpiarCadena($_POST["rol_id"]):"";
$rol=isset($_POST["rol"])? limpiarCadena($_POST["rol"]):"";


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

	case 'desactivar':
		$rspta=$roles->desactivar($rol_id);
 		echo $rspta ? "ROl Desactivado" : "ROl no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$roles->activar($rol_id);
 		echo $rspta ? "ROl activado" : "ROl no se puede activar";
 		break;
	break;
	


	case 'mostrar':
		$rspta=$roles->mostrar($rol_id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$roles->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->rol_id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->rol_id.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->rol_id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->rol_id.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->rol,
				"2"=>$reg->agregado,
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

	case 'modulo':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Modulo.php";
		$mod = new Modulo();
		$rspta = $mod->listar();

		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];
		$marcados = $roles->listarmarcados($id);
		//Declaramos el array para almacenar todos los permisos marcados
		$valores=array();

		//Almacenar los permisos asignados al usuario en el array
		while ($mod = $marcados->fetch_object())
			{
				array_push($valores, $mod->modulo_id);
			}

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					$sw=in_array($reg->modulo_id,$valores)?'checked':'';
					echo '<li> <input type="checkbox" '.$sw.'  name="modulo[]" value="'.$reg->modulo_id.'">'.$reg->modulo.'</li>';
				}
	break;

}
?>