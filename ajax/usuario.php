<?php
session_start();
//Para que se inicie la sesión 
require_once "../modelos/Usuario.php";

$usuario=new Usuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$numero_trabajador=isset($_POST["numero_trabajador"])? limpiarCadena($_POST["numero_trabajador"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idusuario)){
			$rspta=$usuario->insertar($numero_trabajador,$nombre,$cargo,$email,$login,$clave);
			echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
		}
		else {
			$rspta=$usuario->editar($idusuario,$numero_trabajador,$nombre,$cargo,$email,$login,$clave);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
	break;

	case 'mostrar':
		$rspta=$usuario->mostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'eliminar':
    $rspta=$usuario->eliminar($idusuario);
    echo $rspta ? "Usuario Eliminado" : "Usuario no se puede eliminar";

    break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->idusuario,
        		"1"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button> <button class="btn btn-danger" onclick="eliminarFila('.$reg->idusuario.')"><i class="fa fa-trash"></button>',
 				"2"=>$reg->numero_trabajador,
 				"3"=>$reg->nombre,
 				"4"=>$reg->cargo,
 				"5"=>$reg->email,
 				"6"=>$reg->login
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

 case 'verificar':
    $loginf=$_POST['loginf'];
    $clavef=$_POST['clavef'];
    $rspta=$usuario->verificar($loginf, $clavef);

    $fetch=$rspta->fetch_object();
    echo json_encode($fetch);

    if (isset($fetch))
    {
        //Declaramos las variables de sesión
        $_SESSION['nombre']=$fetch->nombre;

        $_SESSION['login']=$fetch->login;
    }
    break;

    case "salir": 
         //Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");
        break;
}

?>