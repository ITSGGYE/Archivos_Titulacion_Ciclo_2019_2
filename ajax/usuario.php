<?php

require_once "../modelos/Usuario.php";

$usuario=new Usuario();

$usuario_id=isset($_POST["usuario_id"])? limpiarCadena($_POST["usuario_id"]):"";
$usu_nom=isset($_POST["usu_nom"])? limpiarCadena($_POST["usu_nom"]):"";
$usu_correo=isset($_POST["usu_correo"])? limpiarCadena($_POST["usu_correo"]):"";
$rol_id=isset($_POST["rol_id"])? limpiarCadena($_POST["rol_id"]):"";
$usu_login=isset($_POST["usu_login"])? limpiarCadena($_POST["usu_login"]):"";
$usu_clave=isset($_POST["usu_clave"])? limpiarCadena($_POST["usu_clave"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':

        //Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$usu_clave);

		if (empty($usuario_id)){
			$rspta=$usuario->insertar($usu_nom,$usu_correo,$rol_id,$usu_login,$clavehash);
			echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
		}
		else {
			$rspta=$usuario->editar($usuario_id,$usu_nom,$usu_correo,$rol_id,$usu_login,$clavehash);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$usuario->desactivar($usuario_id);
 		echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
	break;

	case 'activar':
		$rspta=$usuario->activar($usuario_id);
 		echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
	break;

	case 'mostrar':
		$rspta=$usuario->mostrar($usuario_id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->usuario_id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->usuario_id.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->usuario_id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->usuario_id.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->usu_nom,
 				"2"=>$reg->usu_correo,
                "3"=>$reg->roles,
				"4"=>$reg->usu_login,
 				"5"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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

	case "selectrol":
		require_once "../modelos/Rol.php";
		$roles = new Rol();

		$rspta = $roles->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->rol_id . '>' . $reg->r_nombre . '</option>';
				}
	break;


	case 'verificar':
		$login=$_POST['login'];
	    $clave=$_POST['clave'];

	    //Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$clave);

		$rspta=$usuario->verificar($login, $clavehash);

		$fetch=$rspta->fetch_object();

	    echo json_encode($fetch);
	break;

}
?>
