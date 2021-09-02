<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Dia
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($rol,$modulo)
	{
		$sql="INSERT INTO rol (rol,estado)
		VALUES ('$rol',1)";
		return ejecutarConsulta($sql);
	
		
	
	
	}



	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM dia";
		return ejecutarConsulta($sql);		
	}
	
	 //Implementar un método para listar los permisos marcados
	public function fecha_actual($fecha)
	{
		$sql="SET @fecha='$fecha'";
		return ejecutarConsulta($sql);
	}

    //Implementar un método para listar los registros y mostrar en el select
	public function select($fecha)
	{

        $sql="SET @fecha='$fecha'";
		ejecutarConsulta($sql);

		$sql="SELECT * from dia where dia=(select (dayname(@fecha)) as dia)";
		 ejecutarConsulta($sql);		
	}

}


?>