<?php 

class ControladorNotificaciones{


	static public function ctrMostrarNotificaciones (){

		$tabla="notificaciones";

		$respuesta = ModeloNotificaciones::mdlMostrarNotificaciones($tabla);

		return $respuesta;


	}
}

 ?>