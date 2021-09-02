<?php 
require_once "../modelos/Consultas.php";

$consulta=new Consultas();


switch ($_GET["op"]){
	case 'historiasrecetas':
		$fecha_inicio=$_REQUEST["fecha_inicio"];
		$fecha_fin=$_REQUEST["fecha_fin"];

		$rspta=$consulta->historiasrecetas($fecha_inicio,$fecha_fin);
 		//Vamos a declarar un array
 		$data= Array();

		 $historia='../Reportes/historia.php?id=';
		 $receta='../Reportes/receta.php?id=';

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->fecha_cita.' '.$reg->hora_cita,
 				"1"=>$reg->Medic,
 				"2"=>$reg->esp_nombre,
 				"3"=>$reg->Nombres,
 				"4"=>'&nbsp <a target="_blank" href="'.$historia.$reg->agenda_id.'"  <button class="btn btn-primary"><i class="fa fa-file-pdf-o">
				 </i></button>',
 				"5"=>'&nbsp <a target="_blank" href="'.$receta.$reg->agenda_id.'"  <button class="btn btn-danger"><i class="fa fa-file-pdf-o">
				 </i></button>',
 				"6"=>$reg->estado_cita,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;


	case 'citasmedicas':
		$fecha_inicio=$_REQUEST["fecha_inicio"];
		$fecha_fin=$_REQUEST["fecha_fin"];
        $esp_id=$_REQUEST["esp_id"];

		$rspta=$consulta->citasmedicas($fecha_inicio,$fecha_fin,$esp_id);
 		//Vamos a declarar un array
 		$data= Array();

		 $historia='../Reportes/historia.php?id=';
		 $receta='../Reportes/receta.php?id=';

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->fecha_cita.' '.$reg->hora_cita,
 				"1"=>$reg->Medic,
 				"2"=>$reg->esp_nombre,
 				"3"=>$reg->Nombres,
				 "4"=>$reg->registrador,
				 "5"=>$reg->costo_cita,
				 "6"=>$reg->estado_cita,
				 "7"=>$reg->estado_pago,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;


	case 'pacientesconsultas':

        $paciente_cod=$_REQUEST["paciente_cod"];

		$rspta=$consulta->pacienteconsultas($paciente_cod);
 		//Vamos a declarar un array
 		$data= Array();

		 $historia='../Reportes/historia.php?id=';
		 $receta='../Reportes/receta.php?id=';

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->fecha_cita.' '.$reg->hora_cita,
 				"1"=>$reg->Medic,
 				"2"=>$reg->esp_nombre,
				 "3"=>$reg->costo_cita,
				 "4"=>$reg->estado_cita,
				 "5"=>$reg->estado_pago,
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