<?php 





session_start();

require_once "../modelos/Persona.php";

$persona=new Persona();

$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$per_cedula=isset($_POST["per_cedula"])? limpiarCadena($_POST["per_cedula"]):"";
$per_nombre=isset($_POST["per_nombre"])? limpiarCadena($_POST["per_nombre"]):"";
$per_apellido=isset($_POST["per_apellido"])? limpiarCadena($_POST["per_apellido"]):"";
$per_fchnac=isset($_POST["per_fchnac"])? limpiarCadena($_POST["per_fchnac"]):"";
$per_genero=isset($_POST["per_genero"])? limpiarCadena($_POST["per_genero"]):"";
$per_email=isset($_POST["per_email"])? limpiarCadena($_POST["per_email"]):"";
$per_telf=isset($_POST["per_telf"])? limpiarCadena($_POST["per_telf"]):"";
$esp_id=isset($_POST["esp_id"])? limpiarCadena($_POST["esp_id"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$rol=isset($_POST["rol"])? limpiarCadena($_POST["rol"]):"";
$acceso=isset($_POST["acceso"])? limpiarCadena($_POST["acceso"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':

		//Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$clave);

		if (empty($idpersona)){
			$rspta=$persona->insertar($per_cedula,$per_nombre,$per_apellido,$per_fchnac,$per_genero,$per_email
			,$per_telf,$esp_id,$rol,$acceso,$clavehash,$_POST['modulo']);
			echo $rspta ? "Personal registrado Correctamente" : " ";
		}
		else {
			$rspta=$persona->editar($idpersona,$per_cedula,$per_nombre,$per_apellido,$per_fchnac,$per_genero
			,$per_email,$per_telf,$esp_id,$rol,$acceso,$clavehash,$_POST['modulo']);
			echo $rspta ? "Usuario actualizado" : "No se pudo actualizar Usuario";
		}
	break;
	
	case 'eliminar':
		$rspta=$persona->eliminar($idpersona);
		echo $rspta ? "Usuario eliminado" : "El Usuario no se puede Eliminar";
		break;
 		
	break;

	case 'desactivar':
		$rspta=$persona->desactivar($idpersona);
 		echo $rspta ? "Usuario Desactivado" : "El Usuario no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$persona->activar($idpersona);
 		echo $rspta ? "Usuario activado" : "El Usuario no se puede activar";
 		break;
	break;
	

	case 'mostrar':
		$rspta=$persona->mostrar($idpersona);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$persona->listar();
 		//Vamos a declarar un array
 		$data= Array();

         while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><i class="fa fa-pencil"></i></button> '.
 					'&nbsp <button class="btn btn-danger" onclick="desactivar('.$reg->idpersona.')"><i class="fa fa-ban"></i></button> ':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><i class="fa fa-pencil"></i></button>'.
 					'&nbsp <button class="btn btn-primary" onclick="activar('.$reg->idpersona.')"><i class="fa fa-check"></i></button>'.
					'&nbsp <button class="btn btn-danger" onclick="eliminar('.$reg->idpersona.')"><i class="fa fa-trash"></i></button>',
				"1"=>$reg->per_cedula,
               "2"=>$reg->Nombres,
			   "3"=>$reg->acceso,  
			   "4"=>$reg->per_genero,
               "5"=>$reg->per_email,
			   "6"=>$reg->rol,
			   "7"=>$reg->esp_nombre,			   	                
               "8"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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

    case "selectesp":
		require_once "../modelos/Especialidad.php";
		$especialidad = new Especialidad();

		$rspta = $especialidad->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->esp_id . '>' . $reg->esp_nombre . '</option>';
				}
	break;

	

	case 'modulo':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Modulo.php";
		$mod = new Modulo();
		$rspta = $mod->listar();

		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];
		$marcados = $persona->listarmarcados($id);
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

	case 'validar_cedula':
		$per_cedula=$_POST['per_cedula'];
		$rspta=$persona->validar_cedula($per_cedula);
	
	
		if($reg=$rspta->fetch_object()){
			echo '<option>'.'La Cedula Introducida ya Existe.'.'</option>';
			echo '<option>'.'Vuelva Ingresa otra Cedula.'.'</option>';
		  }
		  break;

	
		  case 'validar_usuario':
			$acceso=$_POST['acceso'];
			$rspta=$persona->validar_usuario($acceso);
		
		
			if($reg=$rspta->fetch_object()){
				echo '<option>'.'Este Usuario ya existe.'.'</option>';
			  }
			  break;	  

	case 'verificar':
		$acceso=$_POST['acceso'];
	    $clave=$_POST['clave'];

	    //Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$clave);

		$rspta=$persona->verificar($acceso,$clavehash);

		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['idpersona']=$fetch->idpersona;
	        $_SESSION['per_cedula']=$fetch->per_cedula;
			$_SESSION['per_nombre']=$fetch->per_nombre;
			$_SESSION['per_apellido']=$fetch->per_apellido;
	        $_SESSION['acceso']=$fetch->acceso;


			 //Obtenemos los permisos del usuario
			 $marcados = $persona->listarmarcados($fetch->idpersona);

			 //Declaramos el array para almacenar todos los permisos marcados
			 $valores=array();
 
			 //Almacenamos los permisos marcados en el array
			 while ($mod = $marcados->fetch_object())
			{
				array_push($valores, $mod->modulo_id);
			}
 
			 //Determinamos los accesos del usuario
			 in_array(1,$valores)?$_SESSION['Escritorio']=1:$_SESSION['Escritorio']=0;
			 in_array(2,$valores)?$_SESSION['Paciente']=1:$_SESSION['Paciente']=0;
			 in_array(3,$valores)?$_SESSION['Citas']=1:$_SESSION['Citas']=0;
			 in_array(4,$valores)?$_SESSION['Personal']=1:$_SESSION['Personal']=0;
			 in_array(5,$valores)?$_SESSION['Valoracion']=1:$_SESSION['Valoracion']=0;
			 in_array(6,$valores)?$_SESSION['Consulta Medica']=1:$_SESSION['Consulta Medica']=0;
			 in_array(7,$valores)?$_SESSION['Horarios']=1:$_SESSION['Horarios']=0;
			 in_array(8,$valores)?$_SESSION['Especialidad']=1:$_SESSION['Especialidad']=0;
			 in_array(9,$valores)?$_SESSION['Consultas']=1:$_SESSION['Consultas']=0;
             in_array(10,$valores)?$_SESSION['Configuracion']=1:$_SESSION['Configuracion']=0;

	    }
	    echo json_encode($fetch);
	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;
}
?>