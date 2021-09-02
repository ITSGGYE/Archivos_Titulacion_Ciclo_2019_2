<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Modulo
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM modulo";
		return ejecutarConsulta($sql);		
	}
}
?>